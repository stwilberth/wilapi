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
        Schema::table('rooms', function (Blueprint $table) {
            $table->string('slug', 255)->nullable()->after('name');
            // Crear un índice para el slug
            $table->index('slug');
            // Crear un índice compuesto para company_id y slug
            $table->unique(['company_id', 'slug']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            // Eliminar los índices primero
            $table->dropUnique(['company_id', 'slug']);
            $table->dropIndex(['slug']);
            // Luego eliminar la columna
            $table->dropColumn('slug');
        });
    }
};