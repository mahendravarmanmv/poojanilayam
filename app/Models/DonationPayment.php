<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DonationPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'donation_id',
        'gateway',
        'gateway_order_id',
        'gateway_payment_id',
        'payment_session_id',
        'amount',
        'currency',
        'payment_status',
        'gateway_response',
        'paid_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'gateway_response' => 'array',
        'paid_at' => 'datetime',
    ];

    public function donation(): BelongsTo
    {
        return $this->belongsTo(Donation::class);
    }
}
