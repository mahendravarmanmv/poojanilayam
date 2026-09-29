<?php

namespace App\Http\Controllers\Web\Customer;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerNotificationController extends Controller
{
    public function index(Request $request): View
    {
        $notifications = Notification::query()
            ->where('user_id', $request->user()->id)
            ->latest('created_at')
            ->paginate(15)
            ->withQueryString();

        $unreadCount = Notification::query()
            ->where('user_id', $request->user()->id)
            ->where('is_read', false)
            ->count();

        return view('frontend.dashboard.notifications.index', compact('notifications', 'unreadCount'));
    }

    public function show(Request $request, Notification $notification): View
    {
        $this->ensureOwner($request, $notification);

        if (!$notification->is_read) {
            $notification->forceFill([
                'is_read' => true,
                'read_at' => now(),
            ])->save();
        }

        return view('frontend.dashboard.notifications.show', compact('notification'));
    }

    public function markAsRead(Request $request, Notification $notification): RedirectResponse
    {
        $this->ensureOwner($request, $notification);

        if (!$notification->is_read) {
            $notification->forceFill([
                'is_read' => true,
                'read_at' => now(),
            ])->save();
        }

        return redirect()->route('dashboard.notifications')
            ->with('success', 'Notification marked as read.');
    }

    public function markAllAsRead(Request $request): RedirectResponse
    {
        Notification::query()
            ->where('user_id', $request->user()->id)
            ->where('is_read', false)
            ->update([
                'is_read' => true,
                'read_at' => now(),
            ]);

        return redirect()->route('dashboard.notifications')
            ->with('success', 'All notifications marked as read.');
    }

    private function ensureOwner(Request $request, Notification $notification): void
    {
        abort_unless($notification->user_id === $request->user()->id, 404);
    }
}
