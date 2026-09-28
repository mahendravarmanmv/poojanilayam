<?php

namespace App\Http\Middleware;

use App\Models\UserSession;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiTokenMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $header = $request->header('Authorization', '');
        if (!preg_match('/^Bearer\s+(.+)$/i', $header, $matches)) {
            return response()->json(['message' => 'Authentication token is required.'], 401);
        }

        $session = UserSession::query()
            ->where('session_token', hash('sha256', $matches[1]))
            ->where(function ($query) {
                $query->whereNull('expires_at')->orWhere('expires_at', '>', now());
            })
            ->with('user')
            ->first();

        if (!$session || !$session->user || $session->user->status !== 'active') {
            return response()->json(['message' => 'Invalid or expired authentication token.'], 401);
        }

        $session->forceFill(['last_activity_at' => now()])->save();
        $request->setUserResolver(fn () => $session->user);
        $request->attributes->set('api_session', $session);

        return $next($request);
    }
}
