<?php

namespace App\Http\Controllers\Web\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class CustomerSecurityController extends Controller
{
    public function changePassword(Request $request): View
    {
        return view('frontend.dashboard.change-password', [
            'user' => $request->user(),
        ]);
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'string'],
            'new_password' => [
                'required',
                'string',
                'confirmed',
                'different:current_password',
                Password::min(8)->mixedCase()->numbers()->symbols(),
            ],
        ], [
            'new_password.confirmed' => 'The new password confirmation does not match.',
            'new_password.different' => 'The new password must be different from your current password.',
        ]);

        $user = $request->user();

        if (! Hash::check($validated['current_password'], $user->password)) {
            return back()
                ->withErrors(['current_password' => 'The current password is incorrect.'])
                ->withInput();
        }

        // Hash explicitly so the stored password is never saved as plain text.
        $user->forceFill([
            'password' => Hash::make($validated['new_password']),
        ])->save();

        return redirect()
            ->route('dashboard.change-password')
            ->with('success', 'Password changed successfully.');
    }
}
