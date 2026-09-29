@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">Profile Completion</h1>
            <p class="text-muted mb-0">Complete the required details before making a booking.</p>
        </div>
        <a href="{{ route('dashboard.profile.edit') }}" class="btn btn-primary">Edit Profile</a>
    </div>

    @include('frontend.auth._messages')

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="list-group list-group-flush">
                @foreach ($checks as $field => $complete)
                    <div class="list-group-item px-0 d-flex justify-content-between align-items-center">
                        <span>{{ str($field)->replace('_', ' ')->title() }}</span>
                        @if ($complete)
                            <span class="badge bg-success">Complete</span>
                        @else
                            <span class="badge bg-warning text-dark">Required</span>
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                @if ($isComplete)
                    <div class="alert alert-success mb-0">
                        Your customer profile is complete and booking eligible.
                    </div>
                @else
                    <div class="alert alert-warning mb-0">
                        Please complete all required fields and then refresh your profile status.
                    </div>
                @endif
            </div>

            <form method="POST" action="{{ route('dashboard.profile-completion.refresh') }}" class="mt-3">
                @csrf
                <button type="submit" class="btn btn-outline-primary">Refresh Profile Status</button>
            </form>
        </div>
    </div>
</div>
@endsection
