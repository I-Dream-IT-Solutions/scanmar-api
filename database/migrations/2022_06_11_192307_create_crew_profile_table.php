<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crew_profile', function (Blueprint $table) {
            $table->id();
            $table->string('crew_no')->nullable()->default(null);
            $table->string('first_name')->nullable()->default(null);
            $table->string('last_name')->nullable()->default(null);
            $table->string('middle_name')->nullable()->default(null);
            $table->string('gender')->nullable()->default(null);
            $table->string('civil_status')->nullable()->default(null);
            $table->string('date_of_birth')->nullable()->default(null);
            $table->string('place_of_birth')->nullable()->default(null);
            $table->string('nationality')->nullable()->default(null);
            $table->string('religion')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->string('mobile_no')->nullable()->default(null);
            $table->string('tel_no')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('address_region_code')->nullable()->default(null);
            $table->string('address_province_code')->nullable()->default(null);
            $table->string('address_city_muni_code')->nullable()->default(null);
            $table->unsignedInteger('employment_status_id')->nullable()->default(null);
            $table->unsignedInteger('position_id')->nullable()->default(null);
            $table->unsignedInteger('vessel_id')->nullable()->default(null);
            $table->string('groupx')->nullable()->default(null);
            $table->boolean('is_email_verified')->nullable()->default(null);
            $table->boolean('is_deleted')->nullable()->default(null);
            $table->datetime('deleted_date')->nullable()->default(null);
            $table->datetime('created_date')->nullable()->default(null);
            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->datetime('modified_date')->nullable()->default(null);
            $table->unsignedInteger('modified_by')->nullable()->default(null);
            $table->text('photo')->nullable()->default(null);
            $table->string('emerlname')->nullable()->default(null);
            $table->string('emerfname')->nullable()->default(null);
            $table->string('emermname')->nullable()->default(null);
            $table->string('emeradd')->nullable()->default(null);
            $table->string('emerrelat')->nullable()->default(null);
            $table->string('emertel')->nullable()->default(null);
            $table->string('kinemail')->nullable()->default(null);
            $table->string('height')->nullable()->default(null);
            $table->string('weight')->nullable()->default(null);
            $table->string('footsize')->nullable()->default(null);
            $table->string('eyes_color')->nullable()->default(null);
            $table->string('waistline')->nullable()->default(null);
            $table->string('parka')->nullable()->default(null);
            $table->string('coverall')->nullable()->default(null);
            $table->text('metadata')->nullable()->default(null);
            $table->text('tmp_photo')->nullable()->default(null);
            $table->string('altmobile')->nullable()->default(null);
            $table->string('haircolor')->nullable()->default(null);
            $table->string('bloodtype')->nullable()->default(null);
            $table->string('dismark')->nullable()->default(null);
            $table->string('sss')->nullable()->default(null);
            $table->string('tin')->nullable()->default(null);
            $table->string('pagibig')->nullable()->default(null);
            $table->string('phealth')->nullable()->default(null);
            $table->string('foreignid')->nullable()->default(null);
            $table->string('recommend')->nullable()->default(null);
            $table->string('relation')->nullable()->default(null);
            $table->string('status')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crew_profile');
    }
}
