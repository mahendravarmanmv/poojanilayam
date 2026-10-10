<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NewsletterController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => [
                'required',
                'string',
                'email:rfc',
                'max:191',
                Rule::unique('newsletter_subscribers', 'email'),
            ],
        ], [
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already subscribed.',
        ]);

        NewsletterSubscriber::create([
            'email' => mb_strtolower(trim($validated['email'])),
        ]);

        return back()->with(
            'newsletter_success',
            'Thank you for subscribing to Pooja Nilayam!'
        );
    }
}
