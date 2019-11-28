<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->index();// UNSIGNED BIGINT AUTOINC.
            $table->string('nick',75)->unique(); // VARCHAR
            $table->string('email', 75)->nullable(); // VARCHAR
            $table->string('password', 75)->nullable(); // VARCHAR
            $table->integer('type'); // INT
            // La siguiente línea crea campos created_at y updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
