<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRegionesProvinciasComunas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regiones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('region_nombre');
            $table->string('region_ordinal');
            $table->string('region_cardinal');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('provincias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('provincia_nombre');
            $table->integer('region_id');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('comunas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comuna_nombre');
            $table->integer('provincia_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regiones');
        Schema::dropIfExists('provincias');
        Schema::dropIfExists('comunas');
    }
}
