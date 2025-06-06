<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class YouTubeLink extends Model
{
    protected $table = 'youtube_links';

    protected $fillable = ['url', 'title'];

    public function youtubable(): MorphTo
    {
        return $this->morphTo();
    }
}