<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->text('booking_url')->nullable();
            $table->text('tripadvisor_url')->nullable();
            $table->text('airbnb_url')->nullable();
            $table->text('expedia_url')->nullable();
            // Add more fields as necessary
        });
    }

    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('booking_url');
            $table->dropColumn('tripadvisor_url');
            $table->dropColumn('airbnb_url');
            $table->dropColumn('expedia_url');
            // Drop more fields if added
        });
    }
};