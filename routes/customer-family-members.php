<?php

use App\Http\Controllers\Web\Customer\FamilyMemberController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/family-members', [FamilyMemberController::class, 'index'])
            ->name('family-members');
        Route::get('/family-members/add', [FamilyMemberController::class, 'create'])
            ->name('family-members.add');
        Route::post('/family-members', [FamilyMemberController::class, 'store'])
            ->name('family-members.store');
        Route::get('/family-members/{familyMember}/edit', [FamilyMemberController::class, 'edit'])
            ->name('family-members.edit');
        Route::put('/family-members/{familyMember}', [FamilyMemberController::class, 'update'])
            ->name('family-members.update');
        Route::delete('/family-members/{familyMember}', [FamilyMemberController::class, 'destroy'])
            ->name('family-members.destroy');
    });
