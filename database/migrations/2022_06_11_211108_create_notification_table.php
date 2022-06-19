<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification', function (Blueprint $table) {
            $table->id('notification_id');
            $table->unsignedInteger('target_id')->nullable()->default(null);
            $table->string('see_by')->nullable()->default(null);
            $table->string('source')->nullable()->default(null);
            $table->text('notification_type')->nullable()->default(null);
            $table->text('notification_content')->nullable()->default(null);
            $table->string('is_process')->nullable()->default(null);
            $table->string('is_read')->nullable()->default(null);
            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->datetime('created_date')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notification');
    }
}
