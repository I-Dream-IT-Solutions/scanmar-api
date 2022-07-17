<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBarangayInCrewProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crew_profile', function (Blueprint $table) {
            $table->string('address_barangay_code')->nullable()->default(null)->after('address_city_muni_code');
            $table->string('prov_address')->nullable()->default(null)->after('address_barangay_code');
            $table->string('prov_address_region_code')->nullable()->default(null)->after('address_barangay_code');
            $table->string('prov_address_province_code')->nullable()->default(null)->after('address_barangay_code');
            $table->string('prov_address_city_muni_code')->nullable()->default(null)->after('address_barangay_code');
            $table->string('prov_address_barangay_code')->nullable()->default(null)->after('address_barangay_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crew_profile', function (Blueprint $table) {
            //
        });
    }
}
