<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterDocumentTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_document_type', function (Blueprint $table) {
            $table->id('document_type_id');
            $table->string('document_type_name')->nullable()->default(null);
            $table->string('type')->nullable()->default(null);
            $table->string('group')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_document_type');
    }
}
