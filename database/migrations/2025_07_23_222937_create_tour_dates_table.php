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
        Schema::create('tour_dates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->constrained()->onDelete('cascade');
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->unsignedInteger('available_slots');
            $table->decimal('price', 8, 2);
            $table->enum('status', ['available', 'sold_out', 'cancelled'])->default('available');
            $table->text('notes')->nullable();
            $table->timestamps();
            
            // Índices adicionales para mejorar el rendimiento
            $table->index(['date', 'status']);
            $table->index(['tour_id', 'date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_dates');
    }
};
