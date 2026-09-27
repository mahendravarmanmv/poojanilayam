<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupportTicket extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'ticket_id',
        'reference_id',
        'customer_profile_id',
        'support_category_id',
        'support_priority_id',
        'supportable_type',
        'supportable_id',
        'subject',
        'description',
        'status',
        'source',
        'last_message_at',
        'first_response_at',
        'resolved_at',
        'closed_at',
        'closed_by_user_id',
        'resolution_summary',
        'metadata',
    ];

    protected function casts(): array
    {
        return [
            'last_message_at' => 'datetime',
            'first_response_at' => 'datetime',
            'resolved_at' => 'datetime',
            'closed_at' => 'datetime',
            'metadata' => 'array',
        ];
    }

    public function customerProfile(): BelongsTo
    {
        return $this->belongsTo(CustomerProfile::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(SupportCategory::class, 'support_category_id');
    }

    public function priority(): BelongsTo
    {
        return $this->belongsTo(SupportPriority::class, 'support_priority_id');
    }

    public function supportable(): MorphTo
    {
        return $this->morphTo();
    }

    public function closedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'closed_by_user_id');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(SupportTicketMessage::class);
    }

    public function statusHistories(): HasMany
    {
        return $this->hasMany(SupportTicketStatusHistory::class);
    }

    public function assignments(): HasMany
    {
        return $this->hasMany(SupportTicketAssignment::class);
    }

    public function attachments(): HasMany
    {
        return $this->hasMany(SupportAttachment::class);
    }
}
