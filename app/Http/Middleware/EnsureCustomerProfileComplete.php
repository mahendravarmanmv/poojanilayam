<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureCustomerProfileComplete
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->route('auth.login');
        }

        $user->loadMissing('customerProfile');
        $customerProfile = $user->customerProfile;

        $complete = $customerProfile
            && $customerProfile->is_booking_eligible
            && $customerProfile->profile_status === 'complete';

        if (! $complete) {
            return redirect()
                ->route('dashboard.profile-completion')
                ->with('warning', 'Please complete your profile before making a booking.');
        }

        return $next($request);
    }
}
