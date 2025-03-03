<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'status'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
        });
    }
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    public function subcategories(): HasMany
        {
            return $this->hasMany(Subcategory::class);
        }
}