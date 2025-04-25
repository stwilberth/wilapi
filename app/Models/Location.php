<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'country',
        'province',
        'parent_id',
    ];
    
    /**
     * Get the parent location
     */
    public function parent()
    {
        return $this->belongsTo(Location::class, 'parent_id');
    }
    
    /**
     * Get the child locations
     */
    public function children()
    {
        return $this->hasMany(Location::class, 'parent_id');
    }
}
