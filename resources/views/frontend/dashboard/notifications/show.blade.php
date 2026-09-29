@extends('layouts.app')

@section('title', $notification->title . ' | Pooja Nilayam')

@section('content')
<div class="container py-4 py-lg-5">
    <div class="mb-3">
        <a href="{{ route('dashboard.notifications') }}" class="text-decoration-none">&larr; Back to notifications</a>
    </div>

    <article class="card border-0 shadow-sm">
        <div class="card-body p-4 p-lg-5">
            <div class="d-flex flex-column flex-md-row justify-content-between gap-2 mb-3">
                <h1 class="h4 mb-0">{{ $notification->title }}</h1>
                <small class="text-muted">
                    {{ optional($notification->created_at)->format('d M Y, h:i A') }}
                </small>
            </div>

            @if($notification->event_type)
                <div class="mb-3">
                    <span class="badge text-bg-light border">{{ $notification->event_type }}</span>
                </div>
            @endif

            @if($notification->body)
                <div class="mb-4">{!! nl2br(e($notification->body)) !!}</div>
            @endif

            @if(is_array($notification->data) && count($notification->data))
                <div class="border rounded p-3 bg-light">
                    <h2 class="h6">Additional details</h2>
                    <dl class="row mb-0">
                        @foreach($notification->data as $key => $value)
                            <dt class="col-sm-4 text-break">{{ str($key)->replace('_', ' ')->title() }}</dt>
                            <dd class="col-sm-8 text-break">
                                {{ is_scalar($value) || $value === null ? $value : json_encode($value, JSON_UNESCAPED_UNICODE) }}
                            </dd>
                        @endforeach
                    </dl>
                </div>
            @endif
        </div>
    </article>
</div>
@endsection
