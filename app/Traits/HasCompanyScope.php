<?php
namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasCompanyScope
{
    protected static function booted()
    {
        static::addGlobalScope('company', function (Builder $builder) {
            $user = auth()->user();
            if ($user && $user->company_id && !$user->is_admin) {
                $builder->where('company_id', $user->company_id);
            }
        });

        // Asegurar que los nuevos registros tengan el company_id del usuario
        static::creating(function ($model) {
            $user = auth()->user();
            if ($user && $user->company_id && !$model->company_id) {
                $model->company_id = $user->company_id;
            }
        });
    }
}