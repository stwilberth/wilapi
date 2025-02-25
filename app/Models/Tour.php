<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'location_id',
        'user_id',
        'name',
        'status',
        'slug',
        'duration',
        'price',
        'description',
        'short_description',
        'overview',
        'difficulty',
        'things_to_bring',
        'itinerary',
        'before_booking',
        'location', // New field
    ];

    // Define relationships if necessary
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
