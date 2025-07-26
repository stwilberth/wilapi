<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TourDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id',
        'company_id',
        'date',
        'available_slots',
        'price',
        'price_foreigners',
        'currency',
        'status',
        'notes',
    ];
    
    protected $casts = [
        'price' => 'decimal:2',
        'price_foreigners' => 'decimal:2',
        'date' => 'datetime',
    ];
    
    protected static function booted()
    {
        static::creating(function ($tourDate) {
            if (auth()->check()) {
                $tourDate->company_id = auth()->user()->company_id;
            }
        });
    }
    
    public function getFormattedPriceAttribute()
    {
        return $this->price ? ($this->currency === 'USD' ? '$' : '₡') . number_format($this->price, 2) : '-';
    }
    
    public function getFormattedForeignerPriceAttribute()
    {
        return $this->price_foreigners ? ($this->currency === 'USD' ? '$' : '₡') . number_format($this->price_foreigners, 2) : '-';
    }

    public function tour(): BelongsTo
    {
        return $this->belongsTo(Tour::class);
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
    
    public function getReservedSlotsAttribute()
    {
        return $this->reservations()
            ->where('status', '!=', 'cancelled')
            ->selectRaw('SUM(adults + children + foreigners) as total_people')
            ->value('total_people') ?? 0;
    }
    
    public function getAvailableSlotsAttribute()
    {
        return $this->attributes['available_slots'] - $this->reserved_slots;
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}

