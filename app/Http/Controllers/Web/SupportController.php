<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\CmsFaq;
use App\Models\ContactEnquiry;
use App\Models\Review;
use App\Models\SupportCategory;
use App\Models\SupportPriority;
use App\Models\SupportTicket;
use App\Models\SupportTicketMessage;
use App\Models\SystemSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SupportController extends Controller
{
    public function index(): View
    {
        return $this->helpCenter();
    }

    public function helpCenter(): View
    {
        $faqs = CmsFaq::query()
            ->where('active', true)
            ->where('status', 'published')
            ->orderBy('sort_order')
            ->orderBy('question')
            ->get();

        $categoryMeta = [
            'Pooja & Bookings' => ['icon' => 'bi-flower1', 'description' => 'Questions about pooja services, booking dates, priests and booking confirmations.'],
            'Digital Pooja' => ['icon' => 'bi-camera-video', 'description' => 'Learn about digital pooja scheduling, live sessions, recordings and completion updates.'],
            'Temples' => ['icon' => 'bi-building', 'description' => 'Information about temples, temple services, events and timings.'],
            'Astrology' => ['icon' => 'bi-stars', 'description' => 'Help with horoscope, kundli, consultations and astrology bookings.'],
            'Orders & Store' => ['icon' => 'bi-bag', 'description' => 'Questions about products, cart, checkout, shipping and orders.'],
            'Payments & Donations' => ['icon' => 'bi-credit-card', 'description' => 'Payment, donation, receipts, refunds and transaction-related questions.'],
            'Account' => ['icon' => 'bi-person-circle', 'description' => 'Manage your profile, password, addresses and account information.'],
            'General' => ['icon' => 'bi-question-circle', 'description' => 'General information about Pooja Nilayam and using the website.'],
        ];

        $categories = $faqs
            ->groupBy(fn (CmsFaq $faq) => $faq->category ?: 'General')
            ->map(function ($items, $name) use ($categoryMeta) {
                $meta = $categoryMeta[$name] ?? [
                    'icon' => 'bi-question-circle',
                    'description' => 'Frequently asked questions about Pooja Nilayam.',
                ];

                return [
                    'name' => $name,
                    'icon' => $meta['icon'],
                    'description' => $meta['description'],
                    'count' => $items->count(),
                ];
            })
            ->values();

        return view('frontend.support.help-center', [
            'categories' => $categories,
            'faqs' => $faqs->map(fn (CmsFaq $faq) => [
                'id' => $faq->id,
                'category' => $faq->category ?: 'General',
                'question' => $faq->question,
                'answer' => $faq->answer,
                'featured' => (bool) $faq->featured,
            ]),
        ]);
    }

    public function contact(): View
    {
        return view('frontend.support.contact', [
            'contactInfo' => $this->contactInfo(),
            'contactReasons' => $this->contactReasons(),
        ]);
    }

    public function submitContact(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:191'],
            'mobile' => ['required', 'string', 'max:30'],
            'reason' => ['required', 'string', 'max:100'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:1000'],
            'consent' => ['accepted'],
        ]);

        $reason = ucwords(str_replace('_', ' ', $validated['reason']));

        ContactEnquiry::create([
            'name' => trim($validated['first_name'] . ' ' . $validated['last_name']),
            'email' => $validated['email'],
            'mobile' => $validated['mobile'],
            'subject' => $validated['subject'],
            'message' => "Enquiry Type: {$reason}\n\n" . $validated['message'],
            'status' => 'new',
        ]);

        return redirect()
            ->route('support.contact')
            ->with('success', 'Thank you. Your enquiry has been submitted successfully.');
    }

    public function raiseTicket(): View
    {
        $this->requireAuthentication();

        return view('frontend.support.raise-ticket', [
            'issueTypes' => SupportCategory::query()
                ->where('active', true)
                ->orderBy('sort_order')
                ->orderBy('name')
                ->get(['id', 'name', 'category_code']),
            'priorities' => SupportPriority::query()
                ->where('active', true)
                ->orderBy('sort_order')
                ->orderBy('name')
                ->get(['id', 'name', 'priority_code']),
        ]);
    }

    public function storeTicket(Request $request): RedirectResponse
    {
        $this->requireAuthentication();

        $validated = $request->validate([
            'reference_id' => ['nullable', 'string', 'max:191'],
            'issue_type' => ['required', 'integer', 'exists:support_categories,id'],
            'subject' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:10', 'max:2000'],
            'priority' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:191'],
            'mobile' => ['required', 'string', 'max:30'],
            'consent' => ['accepted'],
            'attachment' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:5120'],
        ]);

        $user = Auth::user();
        $customerProfile = $user->customerProfile;
        abort_unless($customerProfile, 422, 'Customer profile is required to raise a support ticket.');

        $priority = SupportPriority::query()
            ->where('active', true)
            ->where(function ($query) use ($validated) {
                $query->where('priority_code', $validated['priority'])
                    ->orWhereKey($validated['priority']);
            })
            ->first();

        abort_unless($priority, 422, 'Invalid support priority.');

        $ticket = SupportTicket::create([
            'ticket_id' => $this->generateTicketId(),
            'reference_id' => $validated['reference_id'] ?: null,
            'customer_profile_id' => $customerProfile->id,
            'support_category_id' => $validated['issue_type'],
            'support_priority_id' => $priority->id,
            'subject' => $validated['subject'],
            'description' => $validated['description'],
            'status' => 'open',
            'source' => 'customer_portal',
            'last_message_at' => now(),
            'metadata' => [
                'contact_email' => $validated['email'],
                'contact_mobile' => $validated['mobile'],
            ],
        ]);

        $ticket->messages()->create([
            'user_id' => $user->id,
            'sender_type' => 'customer',
            'message' => $validated['description'],
            'is_internal' => false,
            'sent_at' => now(),
        ]);

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $path = $file->store('support-attachments');

            $ticket->attachments()->create([
                'uploaded_by_user_id' => $user->id,
                'file_name' => $file->getClientOriginalName(),
                'file_path' => $path,
                'mime_type' => $file->getClientMimeType(),
                'file_size' => $file->getSize(),
                'description' => 'Customer support ticket attachment',
            ]);
        }

        $ticket->statusHistories()->create([
            'from_status' => null,
            'to_status' => 'open',
            'changed_by_user_id' => $user->id,
            'source' => 'customer_portal',
            'remarks' => 'Support ticket created by customer.',
            'changed_at' => now(),
        ]);

        return redirect()
            ->route('support.tickets')
            ->with('success', "Support ticket {$ticket->ticket_id} has been created successfully.");
    }

    public function tickets(): View
    {
        $customerProfile = $this->customerProfile();

        $tickets = $customerProfile
            ? SupportTicket::query()
                ->where('customer_profile_id', $customerProfile->id)
                ->with(['category', 'priority'])
                ->withCount('messages')
                ->latest('created_at')
                ->get()
            : collect();

        return view('frontend.support.tickets', [
            'tickets' => $tickets->map(fn (SupportTicket $ticket) => $this->mapTicket($ticket)),
        ]);
    }

    public function showTicket(string $ticket): View
    {
        $customerProfile = $this->customerProfile();
        abort_unless($customerProfile, 404);

        $ticketModel = SupportTicket::query()
            ->where('customer_profile_id', $customerProfile->id)
            ->where('ticket_id', $ticket)
            ->with([
                'category',
                'priority',
                'messages' => fn ($query) => $query->where('is_internal', false)->with('user')->orderBy('sent_at'),
                'statusHistories' => fn ($query) => $query->orderBy('changed_at'),
            ])
            ->firstOrFail();

        $statusSteps = [
            ['title' => 'Ticket Raised', 'description' => 'Your support request was submitted.', 'completed' => true],
            ['title' => 'Support Review', 'description' => 'Support team is reviewing your request.', 'completed' => in_array($ticketModel->status, ['in_progress', 'resolved', 'closed'], true)],
            ['title' => 'Investigation', 'description' => 'The issue is being investigated.', 'completed' => in_array($ticketModel->status, ['resolved', 'closed'], true)],
            ['title' => 'Resolved', 'description' => 'The support request has been resolved.', 'completed' => in_array($ticketModel->status, ['resolved', 'closed'], true)],
        ];

        return view('frontend.support.ticket-details', [
            'ticket' => $this->mapTicket($ticketModel),
            'messages' => $ticketModel->messages->map(fn ($message) => [
                'sender' => $message->sender_type === 'customer' ? 'You' : ($message->user?->name ?: 'Support Team'),
                'type' => $message->sender_type === 'customer' ? 'customer' : 'support',
                'date' => optional($message->sent_at)->format('d F Y, h:i A'),
                'message' => $message->message,
            ]),
            'statusSteps' => $statusSteps,
        ]);
    }

    public function replyToTicket(Request $request, string $ticket): RedirectResponse
    {
        $customerProfile = $this->customerProfile();
        abort_unless($customerProfile, 404);

        $validated = $request->validate([
            'message' => ['required', 'string', 'min:1', 'max:1000'],
        ]);

        $ticketModel = SupportTicket::query()
            ->where('customer_profile_id', $customerProfile->id)
            ->where('ticket_id', $ticket)
            ->firstOrFail();

        abort_if(in_array($ticketModel->status, ['resolved', 'closed'], true), 422, 'This support ticket is closed for replies.');

        $ticketModel->messages()->create([
            'user_id' => Auth::id(),
            'sender_type' => 'customer',
            'message' => $validated['message'],
            'is_internal' => false,
            'sent_at' => now(),
        ]);

        $ticketModel->update(['last_message_at' => now()]);

        return redirect()->route('support.ticket', $ticketModel->ticket_id)
            ->with('success', 'Your reply has been added to the support ticket.');
    }

    public function closeTicket(string $ticket): RedirectResponse
    {
        $customerProfile = $this->customerProfile();
        abort_unless($customerProfile, 404);

        $ticketModel = SupportTicket::query()
            ->where('customer_profile_id', $customerProfile->id)
            ->where('ticket_id', $ticket)
            ->firstOrFail();

        abort_if(in_array($ticketModel->status, ['resolved', 'closed'], true), 422, 'This support ticket is already closed.');

        $fromStatus = $ticketModel->status;
        $ticketModel->update([
            'status' => 'closed',
            'closed_at' => now(),
            'closed_by_user_id' => Auth::id(),
            'last_message_at' => now(),
        ]);

        $ticketModel->statusHistories()->create([
            'from_status' => $fromStatus,
            'to_status' => 'closed',
            'changed_by_user_id' => Auth::id(),
            'source' => 'customer_portal',
            'remarks' => 'Ticket closed by customer.',
            'changed_at' => now(),
        ]);

        return redirect()->route('support.ticket', $ticketModel->ticket_id)
            ->with('success', 'Your support ticket has been closed.');
    }

    public function feedback(): View
    {
        $customerProfile = $this->customerProfile();
        abort_unless($customerProfile, 404);

        $booking = Booking::query()
            ->where('customer_profile_id', $customerProfile->id)
            ->where('status', 'completed')
            ->with(['templePooja.pooja'])
            ->latest('completed_at')
            ->first();

        $service = [
            'booking_id' => $booking?->booking_id ?: '',
            'reference_id' => $booking?->reference_id ?: '',
            'service_name' => $booking?->templePooja?->pooja?->name ?: 'No completed service available',
            'service_type' => $booking?->service_mode ? ucwords(str_replace('_', ' ', $booking->service_mode)) : 'Pooja Service',
            'date' => $booking ? optional($booking->completed_at ?: $booking->booking_date)->format('d F Y') : '',
            'priest' => null,
            'status' => $booking ? ucfirst($booking->status) : 'No completed booking',
        ];

        return view('frontend.support.feedback', [
            'service' => $service,
            'ratingLabels' => [1 => 'Very Poor', 2 => 'Poor', 3 => 'Average', 4 => 'Good', 5 => 'Excellent'],
            'feedbackTopics' => ['Pooja Experience', 'Priest Experience', 'Booking Experience', 'Communication', 'Overall Service'],
        ]);
    }

    public function submitFeedback(Request $request): RedirectResponse
    {
        $customerProfile = $this->customerProfile();
        abort_unless($customerProfile, 404);

        $validated = $request->validate([
            'booking_id' => ['required', 'string'],
            'rating' => ['required', 'integer', 'between:1,5'],
            'topics' => ['nullable', 'array'],
            'topics.*' => ['string', 'max:100'],
            'comment' => ['nullable', 'string', 'max:2000'],
            'recommend' => ['required', 'in:yes,maybe,no'],
            'consent' => ['accepted'],
        ]);

        $booking = Booking::query()
            ->where('customer_profile_id', $customerProfile->id)
            ->where('booking_id', $validated['booking_id'])
            ->where('status', 'completed')
            ->firstOrFail();

        $existing = Review::query()
            ->where('customer_profile_id', $customerProfile->id)
            ->where('booking_id', $booking->id)
            ->whereNull('deleted_at')
            ->first();

        $review = $existing ?: new Review();
        $review->fill([
            'review_id' => $existing?->review_id ?: 'REV-' . strtoupper(Str::random(12)),
            'customer_profile_id' => $customerProfile->id,
            'reviewable_type' => Booking::class,
            'reviewable_id' => $booking->id,
            'booking_id' => $booking->id,
            'rating' => $validated['rating'],
            'title' => $validated['topics'] ? implode(', ', $validated['topics']) : 'Service Feedback',
            'review_text' => $validated['comment'],
            'status' => 'pending',
            'is_verified' => false,
            'is_featured' => false,
            'customer_visible' => false,
            'submitted_at' => now(),
            'metadata' => ['topics' => $validated['topics'] ?? [], 'recommend' => $validated['recommend']],
        ]);
        $review->save();

        return redirect()->route('support.feedback')->with('success', 'Thank you. Your feedback has been submitted successfully.');
    }

    private function contactInfo(): array
    {
        $settings = SystemSetting::query()
            ->where('group', 'contact')
            ->where('is_public', true)
            ->where('is_active', true)
            ->pluck('value', 'key');

        return [
            'phone' => $settings['phone'] ?? 'Contact number not configured',
            'email' => $settings['email'] ?? 'Support email not configured',
            'hours' => $settings['hours'] ?? 'Support hours not configured',
            'address' => $settings['address'] ?? 'Address not configured',
        ];
    }

    private function contactReasons(): array
    {
        return [
            'Pooja Booking',
            'Digital Pooja',
            'Temple Services',
            'Priest Services',
            'Astrology Services',
            'Online Store',
            'Donation',
            'General Enquiry',
        ];
    }

    private function customerProfile()
    {
        return Auth::user()?->customerProfile;
    }

    private function requireAuthentication(): void
    {
        abort_unless(Auth::check(), 403, 'Please log in to access customer support features.');
    }

    private function generateTicketId(): string
    {
        do {
            $id = 'PN-TKT-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));
        } while (SupportTicket::query()->where('ticket_id', $id)->exists());

        return $id;
    }

    private function mapTicket(SupportTicket $ticket): array
    {
        $status = strtolower($ticket->status ?: 'open');

        return [
            'id' => $ticket->ticket_id,
            'status' => ucwords(str_replace('_', ' ', $status)),
            'status_class' => match ($status) {
                'resolved', 'closed' => 'success',
                'in_progress' => 'warning',
                'pending' => 'secondary',
                default => 'primary',
            },
            'priority' => $ticket->priority?->name ?: 'Normal',
            'category' => $ticket->category?->name ?: 'General Support',
            'subject' => $ticket->subject,
            'reference_id' => $ticket->reference_id,
            'created_at' => optional($ticket->created_at)->format('d F Y, h:i A'),
            'updated_at' => optional($ticket->updated_at)->format('d F Y, h:i A'),
            'description' => $ticket->description,
            'assigned_to' => 'Pooja Nilayam Support Team',
            'message_count' => $ticket->messages_count ?? 0,
        ];
    }
}
