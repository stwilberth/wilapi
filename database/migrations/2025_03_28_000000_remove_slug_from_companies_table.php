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
        Schema::table('companies', function (Blueprint $table) {
            // Eliminar el índice primero para evitar errores
            $table->dropIndex(['slug']);
            // Luego eliminar la columna
            $table->dropColumn('slug');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            // Recrear la columna
            $table->string('slug', 255)->unique()->after('name');
            // Recrear el índice
            $table->index('slug');
        });
    }
};