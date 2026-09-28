@extends('layouts.app')

@section('title', 'Edit Family Member | Pooja Nilayam')

@section('content')
<div class="container py-4">
    <div class="mb-4">
        <h1 class="h3 mb-1">Edit Family Member</h1>
        <p class="text-muted mb-0">Update the family member details.</p>
    </div>

    @include('frontend.dashboard.family-members.form', [
        'action' => route('dashboard.family-members.update', $familyMember),
        'method' => 'PUT',
        'familyMember' => $familyMember,
    ])
</div>
@endsection
