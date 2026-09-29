@extends('layouts.app')

@section('title', 'Notifications | Pooja Nilayam')

@section('content')
<div class="container py-4 py-lg-5">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h1 class="h3 mb-1">Notifications</h1>
            <p class="text-muted mb-0">Your latest Pooja Nilayam notifications.</p>
        </div>

        @if($unreadCount > 0)
            <form method="POST" action="{{ route('dashboard.notifications.read-all') }}">
                @csrf
                <button type="submit" class="btn btn-outline-primary">
                    Mark all as read
                </button>
            </form>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($notifications->count())
        <div class="list-group">
            @foreach($notifications as $notification)
                <a href="{{ route('dashboard.notifications.show', $notification) }}"
                   class="list-group-item list-group-item-action py-3 {{ !$notification->is_read ? 'fw-semibold' : '' }}">
                    <div class="d-flex justify-content-between gap-3">
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span>{{ $notification->title }}</span>
                                @if(!$notification->is_read)
                                    <span class="badge text-bg-primary">New</span>
                                @endif
                            </div>

                            @if($notification->body)
                                <div class="text-muted small">{{ \Illuminate\Support\Str::limit($notification->body, 180) }}</div>
                            @endif
                        </div>

                        <small class="text-muted text-nowrap">
                            {{ optional($notification->created_at)->format('d M Y, h:i A') }}
                        </small>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $notifications->links() }}
        </div>
    @else
        <div class="card border-0 shadow-sm">
            <div class="card-body text-center py-5">
                <div class="display-6 mb-3">🔔</div>
                <h2 class="h5">No notifications</h2>
                <p class="text-muted mb-0">You don't have any notifications yet.</p>
            </div>
        </div>
    @endif
</div>
@endsection
