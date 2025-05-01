<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    public function youtubeLinks()
    {
        return $this->morphMany(YouTubeLink::class, 'youtubable');
    }
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'type',
        'description',
        'short_description',
        'phone',
        'email',
        'website',
        'status',
        'company_id',
        'place_id', // Cambiado de location_id a place_id
        'cover_image',
    ];
    
    public function place()
    {
        return $this->belongsTo(Place::class);
    }
    
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($accommodation) {
            if (!$accommodation->company_id && auth()->check()) {
                $accommodation->company_id = auth()->user()->company_id;
            }
        });
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function images()
    {
        return $this->hasMany(AccommodationImage::class);
    }
}