<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_document', function (Blueprint $table) {
            $table->id('document_id');
            $table->string('code')->nullable()->default(null);
            $table->string('document_name')->nullable()->default(null);
            $table->string('type')->nullable()->default(null);
            $table->boolean('is_required')->nullable()->default(null);
            $table->string('is_schedule')->nullable()->default(null);
            $table->boolean('is_deleted')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_document');
    }
}
