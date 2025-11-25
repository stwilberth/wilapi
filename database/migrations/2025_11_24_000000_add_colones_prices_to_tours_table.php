<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->decimal('price_colones', 10, 2)->nullable()->after('price');
            $table->decimal('price_national_colones', 10, 2)->nullable()->after('price_national');
            $table->decimal('price_foreign_colones', 10, 2)->nullable()->after('price_foreign');
        });
    }

    public function down()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn(['price_colones', 'price_national_colones', 'price_foreign_colones']);
        });
    }
};
