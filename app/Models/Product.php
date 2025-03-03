<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'price', 'description', 'short_description', 
        'status', 'cover_image', 'company_id', 'user_id',
        'category_id', 'brand_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $baseSlug = Str::slug($product->name);
            $slug = $baseSlug;
            $counter = 1;

            // Check if slug exists for the same company
            while (static::where('company_id', $product->company_id)
                ->where('slug', $slug)
                ->exists()) {
                $slug = $baseSlug . '-' . $counter++;
            }

            $product->slug = $slug;
        });

        static::updating(function ($product) {
            if ($product->isDirty('name')) {
                $baseSlug = Str::slug($product->name);
                $slug = $baseSlug;
                $counter = 1;

                // Check if slug exists for the same company (excluding current product)
                while (static::where('company_id', $product->company_id)
                    ->where('slug', $slug)
                    ->where('id', '!=', $product->id)
                    ->exists()) {
                    $slug = $baseSlug . '-' . $counter++;
                }

                $product->slug = $slug;
            }
        });
    }
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }
}