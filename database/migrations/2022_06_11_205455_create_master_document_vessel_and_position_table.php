<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterDocumentVesselAndPositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_document_vessel_and_position', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('type')->nullable()->default(null);
            $table->unsignedInteger('code')->nullable()->default(null);
            $table->unsignedInteger('vescode')->nullable()->default(null);
            $table->unsignedInteger('poscode')->nullable()->default(null);
            $table->unsignedInteger('usercode')->nullable()->default(null);
            $table->string('dated')->nullable()->default(null);
            $table->string('sorts')->nullable()->default(null);
            $table->string('groups')->nullable()->default(null);
            $table->boolean('required')->nullable()->default(null);
            $table->boolean('f201')->nullable()->default(null);
            $table->boolean('lexpiry')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_document_vessel_and_position');
    }
}
