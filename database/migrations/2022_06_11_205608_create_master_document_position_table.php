<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterDocumentPositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_document_position', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable()->default(null);
            $table->string('code')->nullable()->default(null);
            $table->unsignedInteger('poscode')->nullable()->default(null);
            $table->unsignedInteger('usercode')->nullable()->default(null);
            $table->string('dated')->nullable()->default(null);
            $table->string('sorts')->nullable()->default(null);
            $table->string('groups')->nullable()->default(null);
            $table->string('required')->nullable()->default(null);
            $table->string('new')->nullable()->default(null);
            $table->string('f202')->nullable()->default(null);
            $table->string('lexpiry')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_document_position');
    }
}
