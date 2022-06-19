<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersCredentialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_credential', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('system_user_id')->nullable()->default(null);
            $table->string('type')->nullable()->default(null);
            $table->string('credential')->nullable()->default(null);
            $table->datetime('verified_at')->nullable()->default(null);
            $table->boolean('is_primary')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_credential');
    }
}
