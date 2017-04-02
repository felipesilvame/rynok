<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentaAccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta_acciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('empresa_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->string('comprador_rut');
            $table->string('comprador_nombre')->nullable();
            $table->string('comprador_apellido_p')->nullable();
            $table->string('comprador_apellido_m')->nullable();
            $table->string('comprador_email')->nullable();
            $table->integer('cantidad_acciones')->unsigned();
            $table->integer('valor_total')->unsigned();
            $table->integer('valor_mas_comision')->unsigned();
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
        Schema::dropIfExists('venta_acciones');
    }
}
