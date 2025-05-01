<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('youtube_links', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('title');
            $table->morphs('youtubable');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('youtube_links');
    }
};