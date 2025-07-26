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
        Schema::table('tour_dates', function (Blueprint $table) {
            // Hacer que price sea nullable
            $table->decimal('price', 8, 2)->nullable()->change();
            
            // Agregar el nuevo campo para precio de extranjeros
            $table->decimal('price_foreigners', 8, 2)->nullable()->after('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tour_dates', function (Blueprint $table) {
            // Revertir los cambios
            $table->decimal('price', 8, 2)->nullable(false)->change();
            $table->dropColumn(['price_foreigners', 'currency']);
        });
    }
};
