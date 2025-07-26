<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Restaurant extends Model
{
    use HasSlug;
    
    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'phone',
        'email',
        'website',
        'cover_image',
        'is_active',
        'company_id',
        'place_id',
    ];
    
    protected $with = ['company', 'place'];
    
    protected $appends = ['image_url'];

    protected static function booted()
    {
        static::creating(function ($restaurant) {
            if (auth()->check()) {
                $restaurant->company_id = auth()->user()->company_id;
            }
        });
    }
    
    /**
     * Get the company that owns the restaurant.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    protected $casts = [
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the URL for the cover image.
     */
    public function getImageUrlAttribute()
    {
        if ($this->cover_image) {
            return asset('storage/' . $this->cover_image);
        }
        return asset('images/default-restaurant.jpg');
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Scope a query to only include active restaurants.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    
    /**
     * Get the place that owns the restaurant.
     */
    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    /**
     * Scope a query to only include restaurants with a specific cuisine type.
     */
    public function scopeWithCuisine($query, $cuisineType)
    {
        return $query->where('cuisine_type', $cuisineType);
    }
    

}
