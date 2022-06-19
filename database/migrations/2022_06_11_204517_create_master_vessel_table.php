<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterVesselTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_vessel', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('vessel_id')->nullable()->default(null);
            $table->string('pvescode')->nullable()->default(null);
            $table->string('vessel_name')->nullable()->default(null);
            $table->unsignedInteger('principal_id')->nullable()->default(null);
            $table->string('groupx')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_vessel');
    }
}
