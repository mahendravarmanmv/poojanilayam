<?php

namespace App\Http\Controllers\Web\Customer;

use App\Http\Controllers\Controller;
use App\Models\CustomerProfile;
use App\Models\FamilyMember;
use App\Models\FamilyMemberRelation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FamilyMemberController extends Controller
{
    public function index(Request $request): View
    {
        $customerProfile = $this->customerProfile($request);

        return view('frontend.dashboard.family-members.index', [
            'user' => $request->user(),
            'customerProfile' => $customerProfile,
            'familyMembers' => $customerProfile->familyMembers()
                ->with('relation')
                ->where('is_active', true)
                ->latest('id')
                ->get(),
        ]);
    }

    public function create(Request $request): View
    {
        return view('frontend.dashboard.family-members.create', [
            'user' => $request->user(),
            'relations' => FamilyMemberRelation::where('is_active', true)
                ->orderBy('name')
                ->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->rules());
        $customerProfile = $this->customerProfile($request);

        $duplicate = $customerProfile->familyMembers()
            ->where('first_name', $validated['first_name'])
            ->where('last_name', $validated['last_name'] ?? null)
            ->when(
                array_key_exists('date_of_birth', $validated) && $validated['date_of_birth'],
                fn ($query) => $query->whereDate('date_of_birth', $validated['date_of_birth'])
            )
            ->exists();

        if ($duplicate) {
            return back()
                ->withErrors(['first_name' => 'This family member already exists in your profile.'])
                ->withInput();
        }

        $customerProfile->familyMembers()->create($validated);

        return redirect()
            ->route('dashboard.family-members')
            ->with('success', 'Family member added successfully.');
    }

    public function edit(Request $request, FamilyMember $familyMember): View
    {
        $this->authorizeFamilyMember($request, $familyMember);

        return view('frontend.dashboard.family-members.edit', [
            'user' => $request->user(),
            'familyMember' => $familyMember,
            'relations' => FamilyMemberRelation::where('is_active', true)
                ->orderBy('name')
                ->get(),
        ]);
    }

    public function update(Request $request, FamilyMember $familyMember): RedirectResponse
    {
        $this->authorizeFamilyMember($request, $familyMember);
        $validated = $request->validate($this->rules());

        $duplicate = $familyMember->customerProfile->familyMembers()
            ->where('id', '!=', $familyMember->id)
            ->where('first_name', $validated['first_name'])
            ->where('last_name', $validated['last_name'] ?? null)
            ->when(
                array_key_exists('date_of_birth', $validated) && $validated['date_of_birth'],
                fn ($query) => $query->whereDate('date_of_birth', $validated['date_of_birth'])
            )
            ->exists();

        if ($duplicate) {
            return back()
                ->withErrors(['first_name' => 'This family member already exists in your profile.'])
                ->withInput();
        }

        $familyMember->update($validated);

        return redirect()
            ->route('dashboard.family-members')
            ->with('success', 'Family member updated successfully.');
    }

    public function destroy(Request $request, FamilyMember $familyMember): RedirectResponse
    {
        $this->authorizeFamilyMember($request, $familyMember);

        $familyMember->delete();

        return redirect()
            ->route('dashboard.family-members')
            ->with('success', 'Family member removed successfully.');
    }

    private function customerProfile(Request $request): CustomerProfile
    {
        $customerProfile = $request->user()->customerProfile;

        abort_unless($customerProfile instanceof CustomerProfile, 404);

        return $customerProfile;
    }

    private function authorizeFamilyMember(Request $request, FamilyMember $familyMember): void
    {
        abort_unless(
            $familyMember->customer_profile_id === $request->user()->customerProfile?->id,
            404
        );
    }

    private function rules(): array
    {
        return [
            'relation_id' => ['nullable', 'integer', 'exists:family_member_relations,id'],
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['nullable', 'string', 'max:100'],
            'date_of_birth' => ['nullable', 'date', 'before:today'],
            'gender' => ['nullable', 'string', 'max:30'],
            'gotram' => ['nullable', 'string', 'max:150'],
            'nakshatra' => ['nullable', 'string', 'max:100'],
            'rashi' => ['nullable', 'string', 'max:100'],
            'notes' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }
}
