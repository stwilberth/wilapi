<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('accommodations', function (Blueprint $table) {
            $table->foreignId('place_id')->nullable()->constrained()->onDelete('set null');
            $table->dropForeign(['location_id']);
            $table->dropColumn('location_id');
        });
    }
    
    public function down()
    {
        Schema::table('accommodations', function (Blueprint $table) {
            $table->foreignId('location_id')->nullable()->constrained()->onDelete('set null');
            $table->dropForeign(['place_id']);
            $table->dropColumn('place_id');
        });
    }
};
