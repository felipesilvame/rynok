<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFkTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('perfil_id')->references('id')->on('perfiles');
        });
        Schema::table('producto_empresas', function (Blueprint $table) {
            $table->foreign('empresa_id')->references('id')->on('empresas');
        });
        Schema::table('venta_acciones', function (Blueprint $table) {
            //olvide colocar el id del comprador
            $table->integer('comprador_id')->after('producto_id');
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('producto_id')->references('id')->on('producto_empresas');
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['empresa_id']);
            $table->dropForeign(['perfil_id']);
        });
        Schema::table('producto_empresas', function (Blueprint $table) {
            $table->dropForeign(['empresa_id']);
        });
        Schema::table('venta_acciones', function (Blueprint $table) {
        
            $table->dropForeign(['comprador_id']);
            $table->dropColumn('comprador_id');
            $table->dropForeign(['empresa_id']);
            $table->dropForeign(['producto_id']);
            
        });
    }
}
