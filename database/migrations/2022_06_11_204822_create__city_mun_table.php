<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityMunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_citymun', function (Blueprint $table) {
            $table->id();
            $table->string('psgcCode')->nullable()->default(null);
            $table->text('citymunDesc')->nullable()->default(null);
            $table->string('regDesc')->nullable()->default(null);
            $table->string('provCode')->nullable()->default(null);
            $table->string('citymunCode')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_city_mun');
    }
}
