<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'location_id',
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
    }

    // Define relationships if necessary
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
