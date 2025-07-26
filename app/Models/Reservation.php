<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TourDate;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_date_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'adults',
        'children',
        'foreigners',
        'price_per_person',
        'price_foreigner',
        'total_amount',
        'special_requests',
        'status',
        'payment_status'
    ];

    protected $casts = [
        'adults' => 'integer',
        'children' => 'integer',
        'foreigners' => 'integer',
        'price_per_person' => 'decimal:2',
        'price_foreigner' => 'decimal:2',
        'total_amount' => 'decimal:2',
        'payment_status' => 'string',
    ];
    
    protected $appends = ['total_people'];
    
    protected static function booted()
    {
        static::creating(function ($reservation) {
            $reservation->calculateTotalAmount();
        });
        
        static::updating(function ($reservation) {
            $reservation->calculateTotalAmount();
        });
    }
    
    public function calculateTotalAmount()
    {
        $residents = $this->adults + $this->children;
        $this->total_amount = 
            ($residents * $this->price_per_person) + 
            ($this->foreigners * $this->price_foreigner);
    }
    
    public function getTotalPeopleAttribute()
    {
        return $this->adults + $this->children + $this->foreigners;
    }
    
    public function getFormattedTotalAmountAttribute()
    {
        return '₡' . number_format($this->total_amount, 2);
    }

    public function tourDate()
    {
        return $this->belongsTo(TourDate::class);
    }

    public function attachments()
    {
        return $this->hasMany(ReservationAttachment::class);
    }
}
