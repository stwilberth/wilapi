<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
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
        'status', //Select::make('status')->options(['draft' => 'Draft','published' => 'Published','archived' => 'Archived'])->default('draft'),
        'company_id',
        'cover_image',
    ];
    
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