<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultipleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('art', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('text')->nullable();
            $table->string('contributor')->nullable();
            $table->timestamps();
        });

        Schema::create('accident', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('text')->nullable();
            $table->string('contributor')->nullable();
            $table->timestamps();
        });

        Schema::create('environment', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('text')->nullable();
            $table->string('contributor')->nullable();
            $table->timestamps();
        });

        Schema::create('economics', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('text')->nullable();
            $table->string('contributor')->nullable();
            $table->timestamps();
        });

        Schema::create('education', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('text')->nullable();
            $table->string('contributor')->nullable();
            $table->timestamps();
        });

        Schema::create('entertainment', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('text')->nullable();
            $table->string('contributor')->nullable();
            $table->timestamps();
        });

        Schema::create('politics', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('text')->nullable();
            $table->string('contributor')->nullable();
            $table->timestamps();
        });

        Schema::create('science_tech', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('text')->nullable();
            $table->string('contributor')->nullable();
            $table->timestamps();
        });

        Schema::create('sports', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('text')->nullable();
            $table->string('contributor')->nullable();
            $table->timestamps();
        });

        Schema::create('crime', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('text')->nullable();
            $table->string('contributor')->nullable();
            $table->timestamps();
        });

        Schema::create('opinion', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('text')->nullable();
            $table->string('contributor')->nullable();
            $table->timestamps();
        });

        Schema::create('international', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('text')->nullable();
            $table->string('contributor')->nullable();
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
        // Schema::drop('raw_datas');
        // Schema::drop('accident');
        // Schema::drop('raw_datas');
        // Schema::drop('raw_datas');
    }
}
