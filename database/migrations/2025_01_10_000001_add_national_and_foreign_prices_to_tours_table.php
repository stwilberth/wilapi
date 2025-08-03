<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->decimal('price_national', 10, 2)->nullable()->after('price');
            $table->decimal('price_foreign', 10, 2)->nullable()->after('price_national');
        });
    }

    public function down()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn(['price_national', 'price_foreign']);
        });
    }
};