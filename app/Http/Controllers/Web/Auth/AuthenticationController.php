<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\CustomerProfile;
use App\Models\OtpVerification;
use App\Models\Role;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AuthenticationController extends Controller
{
    public function showLogin(): View
    {
        return view('frontend.auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'identifier' => ['required', 'string', 'max:191'],
            'password' => ['required', 'string'],
            'remember' => ['nullable', 'boolean'],
        ]);

        $user = User::query()
            ->where(function ($query) use ($data) {
                $query->where('email', $data['identifier'])
                    ->orWhere('mobile', $data['identifier']);
            })
            ->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return back()->withInput($request->except('password'))->withErrors([
                'identifier' => 'Invalid email/mobile or password.',
            ]);
        }

        if ($user->status !== 'active') {
            return back()->withInput($request->except('password'))->withErrors([
                'identifier' => 'Your account is not active.',
            ]);
        }

        if ($user->email && $data['identifier'] === $user->email && !$user->email_verified_at) {
            return redirect()->route('auth.otp-verification', [
                'destination' => $user->email,
                'purpose' => 'registration',
            ])->with('warning', 'Please verify your email with the OTP before logging in.');
        }

        if ($user->mobile && $data['identifier'] === $user->mobile && !$user->mobile_verified_at) {
            return redirect()->route('auth.otp-verification', [
                'destination' => $user->mobile,
                'purpose' => 'registration',
            ])->with('warning', 'Please verify your mobile number with the OTP before logging in.');
        }

        Auth::login($user, (bool) ($data['remember'] ?? false));
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard.index'));
    }

    public function showRegister(): View
    {
        return view('frontend.auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'email' => ['nullable', 'email', 'max:191', 'unique:users,email'],
            'mobile' => ['nullable', 'regex:/^[6-9][0-9]{9}$/', 'unique:users,mobile'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (empty($data['email']) && empty($data['mobile'])) {
            return back()->withInput($request->except('password', 'password_confirmation'))->withErrors([
                'email' => 'Email or mobile number is required.',
            ]);
        }

        [$user, $destination, $channel, $otp] = DB::transaction(function () use ($data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'] ?? null,
                'mobile' => $data['mobile'] ?? null,
                'password' => $data['password'],
                'status' => 'active',
            ]);

            UserProfile::create([
                'user_id' => $user->id,
                'display_name' => $user->name,
            ]);

            CustomerProfile::create([
                'user_id' => $user->id,
                'customer_number' => $this->customerNumber(),
                'profile_status' => 'incomplete',
                'is_booking_eligible' => false,
            ]);

            $customerRole = Role::where('slug', 'customer')->where('is_active', true)->first();

            if (!$customerRole) {
                throw new \RuntimeException('Customer role is not seeded. Run: php artisan db:seed --class=RoleSeeder');
            }

            $user->roles()->syncWithoutDetaching([$customerRole->id]);

            $channel = !empty($user->mobile) ? 'mobile' : 'email';
            $destination = !empty($user->mobile) ? $user->mobile : $user->email;
            $otp = (string) random_int(100000, 999999);

            OtpVerification::create([
                'user_id' => $user->id,
                'channel' => $channel,
                'destination' => $destination,
                'purpose' => 'registration',
                'otp_hash' => Hash::make($otp),
                'expires_at' => now()->addMinutes(10),
            ]);

            return [$user, $destination, $channel, $otp];
        });

        $request->session()->put([
            'auth_pending_user_id' => $user->id,
            'auth_pending_destination' => $destination,
            'auth_pending_purpose' => 'registration',
            'auth_pending_channel' => $channel,
        ]);

        $redirect = redirect()->route('auth.otp-verification')
            ->with('success', 'Registration successful. Please verify the OTP sent to your registered contact.');

        // Development-only OTP visibility. Never expose OTPs outside local development.
        if (app()->environment('local')) {
            $redirect->with('dev_otp', $otp);
        }

        return $redirect;
    }

    public function showOtpVerification(Request $request): View
    {
        $destination = $request->query('destination', session('auth_pending_destination'));
        $purpose = $request->query('purpose', session('auth_pending_purpose', 'registration'));

        return view('frontend.auth.otp-verification', compact('destination', 'purpose'));
    }

    public function verifyOtp(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'destination' => ['required', 'string', 'max:191'],
            'purpose' => ['required', 'string', 'max:50'],
            'otp' => ['required', 'digits:6'],
        ]);

        $verification = OtpVerification::query()
            ->where('destination', $data['destination'])
            ->where('purpose', $data['purpose'])
            ->whereNull('verified_at')
            ->latest('id')
            ->first();

        if (!$verification || !$verification->expires_at || $verification->expires_at->isPast()) {
            return back()->withInput()->withErrors(['otp' => 'OTP is invalid or expired.']);
        }

        if (!Hash::check($data['otp'], $verification->otp_hash)) {
            $verification->increment('attempts');
            return back()->withInput()->withErrors(['otp' => 'Invalid OTP.']);
        }

        $verification->update(['verified_at' => now()]);

        $user = $verification->user_id ? User::find($verification->user_id) : null;
        if ($user) {
            if ($verification->channel === 'mobile') {
                $user->forceFill(['mobile_verified_at' => now()])->save();
            } elseif ($verification->channel === 'email') {
                $user->forceFill(['email_verified_at' => now()])->save();
            }

            Auth::login($user);
            $request->session()->regenerate();
            $request->session()->forget([
                'auth_pending_user_id',
                'auth_pending_destination',
                'auth_pending_purpose',
                'auth_pending_channel',
            ]);

            return redirect()->intended(route('dashboard.index'))
                ->with('success', 'OTP verified successfully.');
        }

        return redirect()->route('auth.login')->with('success', 'OTP verified successfully. Please login.');
    }

    public function showForgotPassword(): View
    {
        return view('frontend.auth.forgot-password');
    }

    public function forgotPassword(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'max:191'],
        ]);

        $user = User::where('email', $data['email'])->first();

        if ($user) {
            $token = Str::random(64);
            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $user->email],
                ['token' => Hash::make($token), 'created_at' => now()]
            );
        }

        return redirect()->route('auth.reset-password', ['email' => $data['email']])
            ->with('success', 'If the email exists, password reset instructions will be sent.');
    }

    public function showResetPassword(Request $request): View
    {
        return view('frontend.auth.reset-password', [
            'email' => $request->query('email', ''),
        ]);
    }

    public function resetPassword(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'max:191'],
            'token' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $record = DB::table('password_reset_tokens')->where('email', $data['email'])->first();

        if (!$record || !$record->created_at || now()->diffInMinutes($record->created_at) > 60 || !Hash::check($data['token'], $record->token)) {
            return back()->withInput($request->except('password', 'password_confirmation'))->withErrors([
                'token' => 'Invalid or expired reset token.',
            ]);
        }

        $user = User::where('email', $data['email'])->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Invalid or expired reset token.']);
        }

        DB::transaction(function () use ($user, $data) {
            $user->update(['password' => $data['password']]);
            $user->sessions()->delete();
            DB::table('password_reset_tokens')->where('email', $user->email)->delete();
        });

        return redirect()->route('auth.login')->with('success', 'Password reset successful. You can now login.');
    }

    public function showVerifyEmail(): View
    {
        return view('frontend.auth.verify-email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'You have been logged out successfully.');
    }

    private function customerNumber(): string
    {
        do {
            $number = 'CUS-' . now()->format('Ymd') . '-' . Str::upper(Str::random(6));
        } while (CustomerProfile::where('customer_number', $number)->exists());

        return $number;
    }
}
