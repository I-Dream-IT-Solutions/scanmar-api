<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewDependentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crew_dependent', function (Blueprint $table) {
            $table->id();
            $table->string('crew_no')->nullable()->default(null);
            $table->string('name')->nullable()->default(null);
            $table->string('relation')->nullable()->default(null);
            $table->date('birthdate')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->string('contact_no')->nullable()->default(null);
            $table->text('metadata')->nullable()->default(null);
            $table->string('status')->nullable()->default(null);
            $table->boolean('is_deleted')->nullable()->default(null);
            $table->unsignedInteger('deleted_by')->nullable()->default(null);
            $table->datetime('modified_date')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crew_dependent');
    }
}
