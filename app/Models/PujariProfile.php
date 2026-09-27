<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PujariProfile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'pujari_number',
        'display_name',
        'date_of_birth',
        'gender',
        'bio',
        'experience_years',
        'experience_details',
        'profile_status',
        'verification_status',
        'is_active',
        'approved_at',
        'approved_by',
    ];

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'experience_years' => 'integer',
            'is_active' => 'boolean',
            'approved_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function verifications(): HasMany
    {
        return $this->hasMany(PujariVerification::class);
    }

    public function documents(): HasMany
    {
        return $this->hasMany(PujariDocument::class);
    }

    public function languages(): HasMany
    {
        return $this->hasMany(PujariLanguage::class);
    }

    public function experiences(): HasMany
    {
        return $this->hasMany(PujariExperience::class);
    }

    public function templeAssignments(): HasMany
    {
        return $this->hasMany(PujariTempleAssignment::class);
    }

    public function availabilities(): HasMany
    {
        return $this->hasMany(PujariAvailability::class);
    }

    public function bankAccounts(): HasMany
    {
        return $this->hasMany(PujariBankAccount::class);
    }
}
