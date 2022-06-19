<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_user', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable()->default(null);
            $table->string('last_name')->nullable()->default(null);
            $table->string('middle_name')->nullable()->default(null);
            $table->string('gender')->nullable()->default(null);
            $table->date('birthdate')->nullable()->default(null);
            $table->string('mobile_number')->nullable()->default(null);
            $table->string('telephone_number')->nullable()->default(null);
            $table->string('username')->nullable()->default(null);
            $table->string('password')->nullable()->default(null);
            $table->unsignedInteger('is_active')->nullable()->default(null);
            $table->unsignedInteger('is_verified')->nullable()->default(null);
            $table->date('created_date')->nullable()->default(null);
            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->date('modified_date')->nullable()->default(null);
            $table->unsignedInteger('modified_by')->nullable()->default(null);
            $table->string('photo')->nullable()->default(null);
            $table->boolean('is_crew')->nullable()->default(null);
            $table->unsignedInteger('crew_profile_id')->nullable()->default(null);
            $table->string('crew_no')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_user');
    }
}
