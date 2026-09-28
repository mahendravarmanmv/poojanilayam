@if (session('success'))
    <div class="alert alert-success" role="alert">
        <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning" role="alert">
        <i class="bi bi-exclamation-circle me-2"></i>{{ session('warning') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <div class="fw-semibold mb-1">Please check the following:</div>
        <ul class="mb-0 ps-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
