<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterPositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_position', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->default(null);
            $table->string('short_name')->nullable()->default(null);
            $table->string('officer')->nullable()->default(null);
            $table->unsignedInteger('department_id')->nullable()->default(null);
            $table->unsignedInteger('arrangement')->nullable()->default(null);
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
        Schema::dropIfExists('master_position');
    }
}
