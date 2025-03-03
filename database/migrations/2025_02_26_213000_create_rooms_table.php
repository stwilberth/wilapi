<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->string('name')->nullable();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['cabin', 'room', 'suite'])->default('room');
            $table->decimal('price_per_night', 10, 2)->nullable();
            $table->integer('capacity')->default(1);
            $table->integer('beds')->default(1);
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->text('amenities')->nullable();
            $table->string('cover_image')->nullable();
            $table->enum('status', ['available', 'occupied', 'maintenance', 'inactive'])->default('available');
            $table->timestamps();

            // Indexes
            $table->index('name');
            $table->index('status');
            $table->index('type');
            $table->index('price_per_night');
            $table->index(['company_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};