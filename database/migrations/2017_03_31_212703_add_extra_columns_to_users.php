<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtraColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('empresa_id')->nullable()->after('id');
            $table->integer('perfil_id')->nullable()->after('empresa_id');
            $table->renameColumn('name', 'nombre');
            $table->string('apellido_paterno')->after('name');
            $table->string('apellido_materno')->nullable()->after('apellido_paterno');
            $table->tinyInteger('habilitado')->default(1);
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('empresa_id');
            $table->dropColumn('perfil_id');
            $table->renameColumn('nombre', 'name');
            $table->dropColumn('apellido_paterno');
            $table->dropColumn('apellido_materno');
            $table->dropColumn('habilitado');
            $table->dropColumn('deleted_at');
        });
    }
}
