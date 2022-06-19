<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewPayrollTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crew_payroll', function (Blueprint $table) {
            $table->id();
            $table->string('crew_no')->nullable()->default(null);
            $table->string('type')->nullable()->default(null);
            $table->unsignedInteger('vessel_id')->nullable()->default(null);
            $table->string('year')->nullable()->default(null);
            $table->string('month')->nullable()->default(null);
            $table->string('orig_file_name')->nullable()->default(null);
            $table->string('new_file_name')->nullable()->default(null);
            $table->datetime('uploaded_date')->nullable()->default(null);
            $table->unsignedInteger('mod_by')->nullable()->default(null);
            $table->datetime('mod_date')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crew_payroll');
    }
}
