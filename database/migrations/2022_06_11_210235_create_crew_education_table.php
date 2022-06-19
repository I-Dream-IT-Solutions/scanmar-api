<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crew_education', function (Blueprint $table) {
            $table->id();
            $table->string('crew_no')->nullable()->default(null);
            $table->string('level')->nullable()->default(null);
            $table->string('school')->nullable()->default(null);
            $table->string('school_address')->nullable()->default(null);
            $table->string('course')->nullable()->default(null);
            $table->string('yearfrom')->nullable()->default(null);
            $table->string('yearto')->nullable()->default(null);
            $table->text('metadata')->nullable()->default(null);
            $table->string('status')->nullable()->default(null);
            $table->boolean('is_deleted')->nullable()->default(null);
            $table->unsignedInteger('deleted_by')->nullable()->default(null);
            $table->datetime('modified_date')->nullable()->default(null);
            $table->unsignedInteger('modified_by')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crew_education');
    }
}
