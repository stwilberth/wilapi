<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Place extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'province_id']; // Añade otros campos si los definiste

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
}
