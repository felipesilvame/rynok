<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddressComprador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('compradores', function (Blueprint $table) {
            $table->string('region')->nullable()->after('telefono');
            $table->integer('provincia')->nullable()->after('telefono');
            $table->integer('comuna')->nullable()->after('telefono');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('compradores', function (Blueprint $table) {
            $table->dropColumn('region');
            $table->dropColumn('provincia');
            $table->dropColumn('comuna');
        });
    }
}
