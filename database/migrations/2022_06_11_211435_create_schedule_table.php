<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->id('schedule_id');
            $table->string('schedule_key')->nullable()->default(null);
            $table->string('schedule_type')->nullable()->default(null);
            $table->string('crew_id')->nullable()->default(null);
            $table->string('client_id')->nullable()->default(null);
            $table->string('document_type')->nullable()->default(null);
            $table->date('schedule_date')->nullable()->default(null);
            $table->time('schedule_time')->nullable()->default(null);
            $table->text('remarks')->nullable()->default(null);
            $table->text('document')->nullable()->default(null);
            $table->string('status')->nullable()->default(null);
            $table->string('is_deleted')->nullable()->default(null);
            $table->string('is_crew')->nullable()->default(null);
            $table->datetime('modified_date')->nullable()->default(null);
            $table->unsignedInteger('modified_by')->nullable()->default(null);
            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->text('deleted_logs')->nullable()->default(null);
            $table->text('date_created')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule');
    }
}
