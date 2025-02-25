<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255); // O 500 si necesitas más longitud
            $table->string('slug', 255)->unique(); // O 500 si necesitas más longitud
            $table->text('about')->nullable(); // Hacerlo nullable si es opcional
            $table->text('address')->nullable(); // Hacerlo nullable si es opcional
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('tripadvisor')->nullable();
            $table->string('youtube')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('website')->nullable();
            $table->string('url_logo')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->index('name');
            $table->index('status');
            $table->index('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
