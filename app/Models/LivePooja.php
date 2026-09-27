<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LivePooja extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'booking_id',
        'live_pooja_id',
        'platform',
        'status',
        'scheduled_start_at',
        'scheduled_end_at',
        'started_at',
        'completed_at',
        'cancelled_at',
        'recording_enabled',
        'recording_available',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'scheduled_start_at' => 'datetime',
            'scheduled_end_at' => 'datetime',
            'started_at' => 'datetime',
            'completed_at' => 'datetime',
            'cancelled_at' => 'datetime',
            'recording_enabled' => 'boolean',
            'recording_available' => 'boolean',
        ];
    }

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(LivePoojaSession::class);
    }
}
