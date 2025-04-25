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
        Schema::table('locations', function (Blueprint $table) {
            $table->string('country')->nullable()->after('description');
            $table->string('province')->nullable()->after('country');
            $table->foreignId('parent_id')->nullable()->after('province')
                  ->constrained('locations')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropColumn(['country', 'province', 'parent_id']);
        });
    }
};