<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\OtpVerification;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OtpVerificationController extends Controller
{
    public function store(Request $request): JsonResponse
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

        if (!$verification || $verification->expires_at->isPast()) {
            return response()->json(['message' => 'OTP is invalid or expired.'], 422);
        }

        if (!Hash::check($data['otp'], $verification->otp_hash)) {
            $verification->increment('attempts');
            return response()->json(['message' => 'Invalid OTP.'], 422);
        }

        $verification->update(['verified_at' => now()]);

        if ($verification->user_id) {
            $user = User::find($verification->user_id);
            if ($user) {
                if (in_array($verification->channel, ['mobile', 'sms'], true)) {
                    $user->forceFill(['mobile_verified_at' => now()])->save();
                } elseif ($verification->channel === 'email') {
                    $user->forceFill(['email_verified_at' => now()])->save();
                }
            }
        }

        return response()->json(['message' => 'OTP verified successfully.']);
    }
}
