@extends('layouts.app')

@section('title', 'My Bookings | Pooja Nilayam')

@section('meta_description', 'View and manage your Pooja Nilayam bookings, upcoming poojas and booking history.')

@php
    $liveBookings = collect($bookings ?? [])->map(function ($booking) {
        $status = strtolower((string) $booking->status);

        $statusLabel = match ($status) {
            'confirmed' => 'Confirmed',
            'completed' => 'Completed',
            'cancelled', 'canceled' => 'Cancelled',
            'pending', 'pending_confirmation' => 'Pending Confirmation',
            default => ucwords(str_replace(['_', '-'], ' ', $status ?: 'Pending Confirmation')),
        };

        $serviceMode = strtolower((string) ($booking->service_mode ?? ''));
        $isOnline = in_array($serviceMode, ['online', 'digital', 'video', 'virtual'], true);

        $bookingDate = $booking->booking_date;
        $startTime = $booking->start_time;

        $isUpcoming = $bookingDate
            ? $bookingDate->isToday() || $bookingDate->isFuture()
            : false;

        $priest = optional($booking->assignments->first()?->pujariProfile)->display_name;

        return [
            'id' => $booking->booking_id ?: ($booking->reference_id ?: $booking->id),
            'type' => $isOnline ? 'Online Pooja' : 'Temple Pooja',
            'name' => $booking->templePooja?->pooja?->name ?: 'Pooja Booking',
            'date' => $bookingDate?->format('d F Y') ?: 'Date not available',
            'time' => $startTime ? \Illuminate\Support\Carbon::parse($startTime)->format('g:i A') : 'Time not available',
            'duration' => $booking->templePooja?->pooja?->duration_minutes
                ? $booking->templePooja->pooja->duration_minutes . ' Mins'
                : '—',
            'status' => $statusLabel,
            'status_class' => match ($status) {
                'cancelled', 'canceled' => 'danger',
                'pending', 'pending_confirmation' => 'warning',
                default => 'success',
            },
            'icon' => $isOnline ? 'bi-flower1' : 'bi-building',
            'priest' => $priest ?: 'To be assigned',
            'location' => $isOnline ? 'Online' : ($booking->templePooja?->temple?->name ?: 'Temple'),
            'amount' => (float) ($booking->total_amount ?? 0),
            'is_upcoming' => $isUpcoming && !in_array($status, ['cancelled', 'canceled', 'completed'], true),
        ];
    })->values()->all();

    $bookings = $liveBookings;
@endphp

@include('frontend.dashboard.my-bookings')
