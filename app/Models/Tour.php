<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Traits\HasCompanyScope;

class Tour extends Model
{
    public function youtubeLinks()
    {
        return $this->morphMany(YouTubeLink::class, 'youtubable');
    }
    use HasFactory, HasCompanyScope;

    protected $fillable = [
        'company_id',
        'place_id',
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
        'cover_image',
    ];

    public $incrementing = true;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Asignar user_id del usuario autenticado
            if (!$model->isDirty('user_id') && Auth::check()) {
                $model->user_id = Auth::id();
            }

            // Generar slug a partir del nombre si no está definido
            if (!$model->isDirty('slug') && $model->name) {
                $model->slug = Str::slug($model->name);

                // Verificar unicidad del slug (si tienes una restricción unique)
                $count = static::where('slug', $model->slug)
                    ->where('company_id', $model->company_id)  // Si tienes una restricción de unicidad compuesta
                    ->count();

                if ($count > 0) {
                    $model->slug = $model->slug . '-' . ($count + 1);
                }
            }
        });

        static::updating(function ($tour) {
            // Obtener el valor anterior de cover_image
            $originalCoverImage = $tour->getOriginal('cover_image');
            $newCoverImage = $tour->cover_image;

            // Si el valor cambió y la imagen anterior existe, borrarla
            if ($originalCoverImage && $originalCoverImage !== $newCoverImage && Storage::disk('public')->exists($originalCoverImage)) {
                Storage::disk('public')->delete($originalCoverImage);
            }
        });

        static::deleting(function ($tour) {
            // Borra la imagen de portada si existe
            if ($tour->cover_image && Storage::disk('public')->exists($tour->cover_image)) {
                Storage::disk('public')->delete($tour->cover_image);
            }
            // Borra las imágenes adicionales si existen
            $tour->images()->each(function ($image) {
                if ($image->path && Storage::disk('public')->exists($image->path)) {
                    Storage::disk('public')->delete($image->path);
                }
            });
        });
    }

    // Define relationships if necessary
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function place(): BelongsTo
    {
        return $this->belongsTo(Place::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(TourImage::class);
    }
}
