<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserSession;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    public function requestToken(Request $request): JsonResponse
    {
        $data = $request->validate(['email' => ['required', 'email', 'max:191']]);
        $user = User::where('email', $data['email'])->first();

        if ($user) {
            $token = Str::random(64);
            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $user->email],
                ['token' => Hash::make($token), 'created_at' => now()]
            );
            // Delivery will be wired through the Notification module. Do not return the token.
        }

        return response()->json(['message' => 'If the email exists, password reset instructions will be sent.']);
    }

    public function reset(Request $request): JsonResponse
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'max:191'],
            'token' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $record = DB::table('password_reset_tokens')->where('email', $data['email'])->first();
        if (!$record || !$record->created_at || now()->diffInMinutes($record->created_at) > 60 || !Hash::check($data['token'], $record->token)) {
            return response()->json(['message' => 'Invalid or expired reset token.'], 422);
        }

        $user = User::where('email', $data['email'])->first();
        if (!$user) {
            return response()->json(['message' => 'Invalid or expired reset token.'], 422);
        }

        DB::transaction(function () use ($user, $data) {
            $user->update(['password' => $data['password']]);
            UserSession::where('user_id', $user->id)->delete();
            DB::table('password_reset_tokens')->where('email', $user->email)->delete();
        });

        return response()->json(['message' => 'Password reset successful.']);
    }
}
