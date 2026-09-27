<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AstrologerProfile extends Model
{ use HasFactory, SoftDeletes; protected $table='astrologer_profiles'; protected $fillable=['user_id','astrologer_number','display_name','headline','bio','profile_photo','experience_years','qualifications','specializations','consultation_modes','status','verification_status','approved_at','deactivated_at']; protected $casts=['experience_years'=>'integer','consultation_modes'=>'array','approved_at'=>'datetime','deactivated_at'=>'datetime']; public function user(): BelongsTo { return $this->belongsTo(User::class); } public function verifications(): HasMany { return $this->hasMany(AstrologerVerification::class); } public function documents(): HasMany { return $this->hasMany(AstrologerDocument::class); } public function languages(): HasMany { return $this->hasMany(AstrologerLanguage::class); } public function experiences(): HasMany { return $this->hasMany(AstrologerExperience::class); } public function availabilities(): HasMany { return $this->hasMany(AstrologerAvailability::class); } public function services(): HasMany { return $this->hasMany(AstrologerService::class); } public function bankAccounts(): HasMany { return $this->hasMany(AstrologerBankAccount::class); } public function bookings(): HasMany { return $this->hasMany(AstrologyBooking::class); } }
