<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_barangay', function (Blueprint $table) {
            $table->id();
            $table->string('brgyCode')->nullable()->default(null);
            $table->text('brgyDesc')->nullable()->default(null);
            $table->string('regCode')->nullable()->default(null);
            $table->string('provCode')->nullable()->default(null);
            $table->string('citymunCode')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_barangay');
    }
}
