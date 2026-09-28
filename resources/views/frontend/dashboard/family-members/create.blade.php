@extends('layouts.app')

@section('title', 'Add Family Member | Pooja Nilayam')

@section('content')
<div class="container py-4">
    <div class="mb-4">
        <h1 class="h3 mb-1">Add Family Member</h1>
        <p class="text-muted mb-0">Add family information for Sankalpam and future bookings.</p>
    </div>

    @include('frontend.dashboard.family-members.form', [
        'action' => route('dashboard.family-members.store'),
        'method' => 'POST',
        'familyMember' => null,
    ])
</div>
@endsection
