<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewWorkExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crew_work_experience', function (Blueprint $table) {
            $table->id();
            $table->string('internal_code')->nullable()->default(null);
            $table->string('crew_no')->nullable()->default(null);
            $table->unsignedInteger('nextpos')->nullable()->default(null);
            $table->unsignedInteger('pos_code')->nullable()->default(null);
            $table->string('pos_name')->nullable()->default(null);
            $table->date('datefrom')->nullable()->default(null);
            $table->date('dateto')->nullable()->default(null);
            $table->decimal('nomonth',18,2)->nullable()->default(null);
            $table->decimal('noyear',18,2)->nullable()->default(null);
            $table->decimal('nodays',18,2)->nullable()->default(null);
            $table->string('cause')->nullable()->default(null);
            $table->string('vesname')->nullable()->default(null);
            $table->string('aname')->nullable()->default(null);
            $table->string('pname')->nullable()->default(null);
            $table->string('groupx')->nullable()->default(null);
            $table->datetime('last_update')->nullable()->default(null);
            $table->string('status')->nullable()->default(null);
            $table->text('metadata')->nullable()->default(null);
            $table->boolean('is_deleted')->nullable()->default(null);
            $table->unsignedInteger('deleted_by')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crew_work_experience');
    }
}
