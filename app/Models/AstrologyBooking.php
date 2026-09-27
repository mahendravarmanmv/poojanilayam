<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AstrologyBooking extends Model
{ use HasFactory, SoftDeletes; protected $table='astrology_bookings'; protected $fillable=['customer_profile_id','astrologer_profile_id','astrology_service_id','currency_id','booking_id','reference_id','consultation_mode','status','booking_date','start_time','end_time','timezone','service_amount','discount_amount','tax_amount','total_amount','customer_notes','payment_confirmed_at','accepted_at','started_at','completed_at','cancelled_at']; protected $casts=['booking_date'=>'date','service_amount'=>'decimal:2','discount_amount'=>'decimal:2','tax_amount'=>'decimal:2','total_amount'=>'decimal:2','payment_confirmed_at'=>'datetime','accepted_at'=>'datetime','started_at'=>'datetime','completed_at'=>'datetime','cancelled_at'=>'datetime']; public function customerProfile(): BelongsTo { return $this->belongsTo(CustomerProfile::class); } public function astrologerProfile(): BelongsTo { return $this->belongsTo(AstrologerProfile::class); } public function astrologyService(): BelongsTo { return $this->belongsTo(AstrologyService::class,'astrology_service_id'); } public function currency(): BelongsTo { return $this->belongsTo(Currency::class); } public function statusHistories(): HasMany { return $this->hasMany(AstrologyBookingStatusHistory::class,'astrology_booking_id'); } public function consultation(): HasOne { return $this->hasOne(AstrologyConsultation::class,'astrology_booking_id'); } public function reports(): HasMany { return $this->hasMany(AstrologyReport::class,'astrology_booking_id'); } }
