<?php

namespace App\Http\Controllers\Web\Customer;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerBookingController extends Controller
{
    public function index(Request $request): View
    {
        $customerProfileId = $request->user()->customerProfile?->id;

        abort_unless($customerProfileId, 403, 'Customer profile not found.');

        $bookings = Booking::query()
            ->with([
                'templePooja.pooja',
                'templePooja.temple',
                'bookingSlot',
                'currency',
                'assignments.pujariProfile',
            ])
            ->where('customer_profile_id', $customerProfileId)
            ->latest('id')
            ->paginate(10)
            ->withQueryString();

        return view('frontend.dashboard.bookings', compact('bookings'));
    }
}
