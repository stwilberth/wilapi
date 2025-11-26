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
        'price_colones',
        'price_national',
        'price_national_colones',
        'price_foreign',
        'price_foreign_colones',
        'description',
        'short_description',
        'overview',
        'difficulty',
        'things_to_bring',
        'itinerary',
        'before_booking',
        'has_daily_departures',
        'only_book_by_schedules',
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

    public function tourDates(): HasMany
    {
        return $this->hasMany(TourDate::class);
    }

    /**
     * Check if the tour can be booked.
     * If only_book_by_schedules is true, tour can only be booked on specific dates
     * If has_daily_departures is true, tour can be booked any day
     * Otherwise, check if there are available tour dates
     */
    public function canBook(): bool
    {
        // If the tour only allows booking by schedules, check if there are tour dates available
        if ($this->only_book_by_schedules) {
            return $this->tourDates()
                ->where('status', 'active')
                ->where('date', '>=', now())
                ->where('available_slots', '>', 0)
                ->exists();
        }
        
        // If tour has daily departures, it can always be booked
        if ($this->has_daily_departures) {
            return true;
        }
        
        // If neither condition is set, check if there are available tour dates
        return $this->tourDates()
            ->where('status', 'active')
            ->where('date', '>=', now())
            ->where('available_slots', '>', 0)
            ->exists();
    }

    /**
     * Get available booking dates for the tour
     * If only_book_by_schedules is true, return only specific dates
     * If has_daily_departures is true, return a message about daily availability
     * Otherwise, return available tour dates
     */
    public function getAvailableBookingDates(): array
    {
        if ($this->has_daily_departures) {
            return [
                'type' => 'daily',
                'message' => 'Este tour tiene salidas todos los días del año'
            ];
        }
        
        if ($this->only_book_by_schedules) {
            $availableDates = $this->tourDates()
                ->where('status', 'active')
                ->where('date', '>=', now())
                ->where('available_slots', '>', 0)
                ->orderBy('date')
                ->get();
                
            return [
                'type' => 'scheduled',
                'dates' => $availableDates->map(function ($date) {
                    return [
                        'id' => $date->id,
                        'date' => $date->date->format('Y-m-d'),
                        'formatted_date' => $date->date->format('d/m/Y'),
                        'available_slots' => $date->available_slots,
                        'price' => $date->formatted_price,
                        'foreigner_price' => $date->formatted_foreigner_price
                    ];
                })->toArray()
            ];
        }
        
        // Default behavior - return available tour dates
        $availableDates = $this->tourDates()
            ->where('status', 'active')
            ->where('date', '>=', now())
            ->where('available_slots', '>', 0)
            ->orderBy('date')
            ->get();
            
        return [
            'type' => 'scheduled',
            'dates' => $availableDates->map(function ($date) {
                return [
                    'id' => $date->id,
                    'date' => $date->date->format('Y-m-d'),
                    'formatted_date' => $date->date->format('d/m/Y'),
                    'available_slots' => $date->available_slots,
                    'price' => $date->formatted_price,
                    'foreigner_price' => $date->formatted_foreigner_price
                ];
            })->toArray()
        ];
    }

    /**
     * Scope to get tours that can be booked
     */
    public function scopeBookable($query)
    {
        return $query->where(function ($query) {
            $query->where('has_daily_departures', true)
                ->orWhere('only_book_by_schedules', true)
                ->orWhereHas('tourDates', function ($subQuery) {
                    $subQuery->where('status', 'active')
                        ->where('date', '>=', now())
                        ->where('available_slots', '>', 0);
                });
        });
    }
}
