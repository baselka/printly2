<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desc');

            $table->timestamps();
        });

        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo');
            $table->string('link');

            $table->timestamps();
        });

        Schema::create('informations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desc');
            $table->timestamps();
        });
        Schema::create('blog', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->String('desc');
            $table->String('image');
            $table->integer('accepted')->default(0);

            $table->timestamps();
        });

        Schema::create('city', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->timestamps();


        });      Schema::create('area', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id');
            $table->string('name');
            $table->integer('price');

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
        Schema::dropIfExists('settings');
    }
}
