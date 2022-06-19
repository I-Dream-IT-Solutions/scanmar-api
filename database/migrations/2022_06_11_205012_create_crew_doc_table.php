<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewDocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crew_doc', function (Blueprint $table) {
            $table->id();
            $table->string('internal_code')->nullable()->default(null);
            $table->string('crew_no')->nullable()->default(null);
            $table->unsignedInteger('type')->nullable()->default(null);
            $table->unsignedInteger('code')->nullable()->default(null);
            $table->string('docno')->nullable()->default(null);
            $table->date('date_issue')->nullable()->default(null);
            $table->date('date_exp')->nullable()->default(null);
            $table->string('period')->nullable()->default(null);
            $table->string('location')->nullable()->default(null);
            $table->string('school')->nullable()->default(null);
            $table->string('remarks')->nullable()->default(null);
            $table->text('filex')->nullable()->default(null);
            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->string('created_from')->nullable()->default(null);
            $table->boolean('is_deleted')->nullable()->default(null);
            $table->unsignedInteger('deleted_by')->nullable()->default(null);
            $table->text('metadata')->nullable()->default(null);
            $table->text('tmp_filex')->nullable()->default(null);
            $table->datetime('last_update')->nullable()->default(null);
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
        Schema::dropIfExists('crew_doc');
    }
}
