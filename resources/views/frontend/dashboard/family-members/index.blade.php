@extends('layouts.app')

@section('title', 'Family Members | Pooja Nilayam')

@section('content')
<div class="container py-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
        <div>
            <h1 class="h3 mb-1">Family Members</h1>
            <p class="text-muted mb-0">Manage family members used for Sankalpam and related spiritual services.</p>
        </div>
        <a href="{{ route('dashboard.family-members.add') }}" class="btn btn-primary">
            <i class="bi bi-person-plus me-1"></i>Add Family Member
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            @if($familyMembers->isEmpty())
                <div class="p-4 text-center text-muted">No family members have been added yet.</div>
            @else
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="px-4">Name</th>
                                <th>Relation</th>
                                <th>Date of Birth</th>
                                <th>Gender</th>
                                <th class="text-end px-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($familyMembers as $member)
                            <tr>
                                <td class="px-4">{{ trim($member->first_name . ' ' . ($member->last_name ?? '')) }}</td>
                                <td>{{ $member->relation?->name ?? '—' }}</td>
                                <td>{{ $member->date_of_birth?->format('d M Y') ?? '—' }}</td>
                                <td>{{ $member->gender ?: '—' }}</td>
                                <td class="text-end px-4">
                                    <a href="{{ route('dashboard.family-members.edit', $member) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                    <form method="POST" action="{{ route('dashboard.family-members.destroy', $member) }}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Remove this family member?')">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
