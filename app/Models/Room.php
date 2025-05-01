<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Traits\HasCompanyScope;
use Illuminate\Support\Str;

class Room extends Model
{
    public function youtubeLinks()
    {
        return $this->morphMany(YouTubeLink::class, 'youtubable');
    }
    use HasCompanyScope;

    protected $fillable = [
        'name', 'slug', 'number', 'type', 'price_per_night', 
        'capacity', 'beds', 'description', 'short_description',
        'amenities', 'cover_image', 'status', 
        'company_id', 'user_id'
    ];

    //add current user id to room
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($room) {
            if (!$room->user_id && auth()->check()) {
                $room->user_id = auth()->id();
            }
            
            // Generar slug a partir del nombre si no está definido
            if (!$room->slug && $room->name) {
                $baseSlug = Str::slug($room->name);
                $slug = $baseSlug;
                $counter = 1;
                
                // Verificar unicidad del slug para la misma compañía
                while (static::where('company_id', $room->company_id)
                    ->where('slug', $slug)
                    ->exists()) {
                    $slug = $baseSlug . '-' . $counter++;
                }
                
                $room->slug = $slug;
            }
        });
        
        static::updating(function ($room) {
            // Actualizar slug si el nombre ha cambiado
            if ($room->isDirty('name') && $room->name) {
                $baseSlug = Str::slug($room->name);
                $slug = $baseSlug;
                $counter = 1;
                
                // Verificar unicidad del slug para la misma compañía (excluyendo la habitación actual)
                while (static::where('company_id', $room->company_id)
                    ->where('slug', $slug)
                    ->where('id', '!=', $room->id)
                    ->exists()) {
                    $slug = $baseSlug . '-' . $counter++;
                }
                
                $room->slug = $slug;
            }
        });
    }

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

    //images
    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }
}