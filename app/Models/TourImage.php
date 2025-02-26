<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class TourImage extends Model
{
    protected $fillable = ['tour_id', 'name', 'path'];

    public function tour(): BelongsTo
    {
        return $this->belongsTo(Tour::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($image) {
            // Borra el archivo del disco si existe
            if ($image->path && Storage::disk('public')->exists($image->path)) {
                Storage::disk('public')->delete($image->path);
            }
        });
    }
}
