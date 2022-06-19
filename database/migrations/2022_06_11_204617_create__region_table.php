<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_region', function (Blueprint $table) {
            $table->id();
            $table->string('psgcCode')->nullable()->default(null);
            $table->text('regDesc')->nullable()->default(null);
            $table->string('regCode')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_region');
    }
}
