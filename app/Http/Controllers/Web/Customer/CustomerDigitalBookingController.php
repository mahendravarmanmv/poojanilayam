<?php

namespace App\Http\Controllers\Web\Customer;

use App\Http\Controllers\Controller;
use App\Models\DigitalPooja;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerDigitalBookingController extends Controller
{
    public function index(Request $request): View
    {
        $customerProfileId = $request->user()->customerProfile?->id;

        abort_unless($customerProfileId, 403, 'Customer profile not found.');

        $digitalBookings = DigitalPooja::query()
            ->with(['pooja', 'booking', 'certificate'])
            ->where('customer_profile_id', $customerProfileId)
            ->latest('id')
            ->paginate(10)
            ->withQueryString();

        $mapped = $digitalBookings->getCollection()->map(function (DigitalPooja $booking): array {
            $date = $booking->booking?->booking_date;
            $time = $booking->booking?->start_time;
            $status = $booking->status ?: 'scheduled';

            return [
                'id' => $booking->digital_pooja_id ?: $booking->id,
                'pooja' => $booking->pooja?->name ?? 'Digital Pooja',
                'date' => $date?->format('d F Y') ?? 'Date not scheduled',
                'time' => $time ? date('h:i A', strtotime($time)) : 'Time not scheduled',
                'status' => str($status)->replace('_', ' ')->title()->toString(),
                'status_class' => match ($status) {
                    'completed' => 'success',
                    'cancelled', 'failed' => 'danger',
                    default => 'primary',
                },
                'amount' => (float) ($booking->booking?->total_amount ?? 0),
                'priest' => 'Not assigned',
                'sankalp' => $booking->sankalpam ? 'Available' : 'Pending',
                'photo_video' => $booking->certificate ? 'Available' : 'Pending',
                'icon' => 'bi-camera-video',
            ];
        });

        $digitalBookings->setCollection($mapped);

        return view('frontend.dashboard.digital-bookings', [
            'digitalBookings' => $digitalBookings,
            'scheduledBookings' => $mapped->whereIn('status', ['Scheduled', 'Confirmed']),
            'completedBookings' => $mapped->where('status', 'Completed'),
            'mediaAvailable' => $mapped->where('photo_video', 'Available'),
        ]);
    }
}
