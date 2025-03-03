<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Room extends Model
{
    protected $fillable = [
        'name', 'type', 'price_per_night', 
        'capacity', 'beds', 'description', 'short_description',
        'amenities', 'cover_image', 'status', 
        'company_id', 'user_id'
    ];

    protected $casts = [
        'amenities' => 'array'
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}