<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Temple extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'temple_code',
        'name',
        'slug',
        'description',
        'status',
        'verification_status',
        'created_by',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function profile(): HasOne
    {
        return $this->hasOne(TempleProfile::class);
    }

    public function verifications(): HasMany
    {
        return $this->hasMany(TempleVerification::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'temple_users',
            'temple_id',
            'user_id'
        )->withPivot([
            'role',
            'status',
            'assigned_at',
            'ended_at',
        ])->withTimestamps();
    }

    public function timings(): HasMany
    {
        return $this->hasMany(TempleTiming::class);
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(TempleGallery::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(TempleEvent::class);
    }

    public function pujariAssignments(): HasMany
    {
        return $this->hasMany(PujariTempleAssignment::class);
    }
}
