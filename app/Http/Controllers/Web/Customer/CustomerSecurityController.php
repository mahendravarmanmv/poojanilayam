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
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = $request->user();

        if (! Hash::check($validated['current_password'], $user->password)) {
            return back()
                ->withErrors(['current_password' => 'The current password is incorrect.'])
                ->withInput();
        }

        $user->update([
            'password' => $validated['password'],
        ]);

        // Revoke application-level sessions while keeping the current web session active.
        $user->sessions()->delete();

        return redirect()
            ->route('dashboard.change-password')
            ->with('success', 'Password changed successfully.');
    }
}
