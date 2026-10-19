<?php

namespace App\Http\Controllers\Web\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerProfileCompletionController extends Controller
{
    public function status(Request $request): View
    {
        $user = $request->user()->loadMissing([
            'profile',
            'customerProfile',
        ]);

        $customerProfile = $user->customerProfile;

        $checks = [
            'name' => filled(trim((string) $user->name)),
            'mobile' => filled($user->mobile),
            'email' => filled($user->email),
            'preferred_language' => filled(
                optional($customerProfile)->preferred_language_id
            ),
        ];

        $isComplete = $customerProfile !== null
            && ! in_array(false, $checks, true);

        // Keep the stored eligibility flags synchronized with the
        // same checks displayed on the Profile Completion page.
        if ($customerProfile !== null) {
            $customerProfile->update([
                'profile_status' => $isComplete ? 'complete' : 'incomplete',
                'is_booking_eligible' => $isComplete,
            ]);
        }

        return view('frontend.dashboard.profile-completion', [
            'user' => $user,
            'customerProfile' => $customerProfile,
            'checks' => $checks,
            'isComplete' => $isComplete,
        ]);
    }

    public function refresh(Request $request): RedirectResponse
    {
        $user = $request->user()->loadMissing('customerProfile');
        $customerProfile = $user->customerProfile;

        if (! $customerProfile) {
            return redirect()
                ->route('dashboard.profile')
                ->with('error', 'Customer profile is not available.');
        }

        $isComplete = filled(trim((string) $user->name))
            && filled($user->mobile)
            && filled($user->email)
            && filled($customerProfile->preferred_language_id);

        $customerProfile->update([
            'profile_status' => $isComplete ? 'complete' : 'incomplete',
            'is_booking_eligible' => $isComplete,
        ]);

        return redirect()
            ->route('dashboard.profile-completion')
            ->with(
                'success',
                $isComplete
                    ? 'Your profile is complete and eligible for booking.'
                    : 'Your profile is still incomplete. Please complete the required details.'
            );
    }
}
