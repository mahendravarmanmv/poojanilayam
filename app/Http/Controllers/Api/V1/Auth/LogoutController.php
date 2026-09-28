<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserSession;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $session = $request->attributes->get('api_session');
        if ($session instanceof UserSession) {
            $session->delete();
        }

        return response()->json(['message' => 'Logout successful.']);
    }
}
