<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVendedorIdAVentaAcciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('venta_acciones', function(Blueprint $table){
            $table->integer('vendedor_id')->nullable()->unsigned()->after('empresa_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('venta_acciones', function(Blueprint $table){
            $table->dropColumn('vendedor_id');
        });
    }
}
