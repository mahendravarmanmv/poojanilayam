@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ $action }}" class="card border-0 shadow-sm">
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif

    <div class="card-body p-4">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="first_name" class="form-label">First Name <span class="text-danger">*</span></label>
                <input id="first_name" name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name', $familyMember?->first_name) }}" required>
                @error('first_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label for="last_name" class="form-label">Last Name</label>
                <input id="last_name" name="last_name" type="text" class="form-control" value="{{ old('last_name', $familyMember?->last_name) }}">
            </div>
            <div class="col-md-6">
                <label for="relation_id" class="form-label">Relation</label>
                <select id="relation_id" name="relation_id" class="form-select">
                    <option value="">Select relation</option>
                    @foreach($relations as $relation)
                        <option value="{{ $relation->id }}" @selected(old('relation_id', $familyMember?->relation_id) == $relation->id)>{{ $relation->name }}</option>
                    @endforeach
                </select>
                @if($relations->isEmpty())
                    <div class="form-text">No active family relations have been configured yet.</div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input id="date_of_birth" name="date_of_birth" type="date" class="form-control" value="{{ old('date_of_birth', $familyMember?->date_of_birth?->format('Y-m-d')) }}">
            </div>
            <div class="col-md-6">
                <label for="gender" class="form-label">Gender</label>
                <input id="gender" name="gender" type="text" class="form-control" value="{{ old('gender', $familyMember?->gender) }}">
            </div>
            <div class="col-md-6">
                <label for="gotram" class="form-label">Gotram</label>
                <input id="gotram" name="gotram" type="text" class="form-control" value="{{ old('gotram', $familyMember?->gotram) }}">
            </div>
            <div class="col-md-6">
                <label for="nakshatra" class="form-label">Nakshatra</label>
                <input id="nakshatra" name="nakshatra" type="text" class="form-control" value="{{ old('nakshatra', $familyMember?->nakshatra) }}">
            </div>
            <div class="col-md-6">
                <label for="rashi" class="form-label">Rashi</label>
                <input id="rashi" name="rashi" type="text" class="form-control" value="{{ old('rashi', $familyMember?->rashi) }}">
            </div>
            <div class="col-12">
                <label for="notes" class="form-label">Notes</label>
                <textarea id="notes" name="notes" rows="4" class="form-control">{{ old('notes', $familyMember?->notes) }}</textarea>
            </div>
        </div>
    </div>
    <div class="card-footer bg-white border-0 p-4 d-flex justify-content-end gap-2">
        <a href="{{ route('dashboard.family-members') }}" class="btn btn-outline-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary">{{ $familyMember ? 'Update Family Member' : 'Save Family Member' }}</button>
    </div>
</form>
@endsection
