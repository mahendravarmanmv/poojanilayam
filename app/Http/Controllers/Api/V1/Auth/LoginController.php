<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserSession;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'identifier' => ['required', 'string', 'max:191'],
            'password' => ['required', 'string'],
            'device_name' => ['nullable', 'string', 'max:150'],
            'device_type' => ['nullable', 'string', 'max:30'],
        ]);

        $user = User::query()
            ->where(function ($query) use ($data) {
                $query->where('email', $data['identifier'])
                    ->orWhere('mobile', $data['identifier']);
            })
            ->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json(['message' => 'Invalid credentials.'], 401);
        }

        if ($user->status !== 'active') {
            return response()->json(['message' => 'Your account is not active.'], 403);
        }

        if ($user->email && $data['identifier'] === $user->email && !$user->email_verified_at) {
            return response()->json(['message' => 'Email verification is required.'], 403);
        }

        if ($user->mobile && $data['identifier'] === $user->mobile && !$user->mobile_verified_at) {
            return response()->json(['message' => 'Mobile verification is required.'], 403);
        }

        $plainToken = Str::random(80);
        UserSession::create([
            'user_id' => $user->id,
            'session_token' => hash('sha256', $plainToken),
            'device_name' => $data['device_name'] ?? null,
            'device_type' => $data['device_type'] ?? null,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'last_activity_at' => now(),
            'expires_at' => now()->addDays(30),
        ]);

        return response()->json([
            'message' => 'Login successful.',
            'token' => $plainToken,
            'token_type' => 'Bearer',
            'expires_at' => now()->addDays(30)->toISOString(),
            'user' => $user->load(['profile', 'customerProfile']),
        ]);
    }
}
