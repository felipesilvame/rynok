<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmpresaCompradorAccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprador_acciones_empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comprador_id')->unsigned();
            $table->string('empresa_id')->unsigned();
            $table->integer('acciones_compradas')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('comprador_acciones_empresas', function (Blueprint $table){
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('comprador_id')->references('id')->on('compradores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comprador_acciones_empresas');
    }
}
