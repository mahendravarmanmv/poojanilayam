<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\CustomerProfile;
use App\Models\OtpVerification;
use App\Models\Role;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'email' => ['nullable', 'email', 'max:191', 'unique:users,email'],
            'mobile' => ['nullable', 'regex:/^[6-9][0-9]{9}$/', 'unique:users,mobile'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (empty($data['email']) && empty($data['mobile'])) {
            return response()->json(['message' => 'Email or mobile is required.'], 422);
        }

        $result = DB::transaction(function () use ($data) {
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

            return [$user, $channel, $otp];
        });

        $response = [
            'message' => 'Registration successful. OTP verification is required.',
            'user_id' => $result[0]->id,
            'verification_channel' => $result[1],
        ];

        // Development-only OTP visibility. Never expose OTPs outside local development.
        if (app()->environment('local')) {
            $response['development_otp'] = $result[2];
        }

        return response()->json($response, 201);
    }

    private function customerNumber(): string
    {
        do {
            $number = 'CUS-' . now()->format('Ymd') . '-' . Str::upper(Str::random(6));
        } while (CustomerProfile::where('customer_number', $number)->exists());

        return $number;
    }
}
