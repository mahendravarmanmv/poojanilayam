<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DonationRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'donation_campaign_id', 'campaign_title', 'donation_reference', 'donor_name',
        'donor_email', 'donor_mobile', 'donor_address', 'amount',
        'currency_code', 'donor_message', 'is_anonymous', 'status', 'payment_status',
        'payment_method', 'receipt_number', 'paid_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'is_anonymous' => 'boolean',
        'paid_at' => 'datetime',
    ];

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(DonationCampaign::class, 'donation_campaign_id');
    }
}
