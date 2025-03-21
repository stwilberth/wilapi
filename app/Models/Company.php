<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
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
        'about',
        'address',
        'email',
        'email2',
        'phone',
        'phone2',
        'whatsapp',
        'whatsapp2',
        'facebook',
        'instagram',
        'twitter',
        'tripadvisor',
        'youtube',
        'tiktok',
        'website',
        'url_logo',
        'status',
    ];
}
