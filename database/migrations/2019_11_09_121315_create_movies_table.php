<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id')->index;
            $table->string('title', 500);
            $table->integer('year');
            $table->integer('duration');
            $table->float('rating', 8, 1);
            $table->string('cover', 500);
            $table->string('filepath', 500)->default("movies");
            $table->string('filename', 500);
            $table->string('external_url', 500);
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
        Schema::dropIfExists('movies');
    }
}
