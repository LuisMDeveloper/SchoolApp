<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLunesTimeToCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->time('lunes_de');
            $table->time('lunes_a');
            $table->time('martes_de');
            $table->time('martes_a');
            $table->time('miercoles_de');
            $table->time('miercoles_a');
            $table->time('jueves_de');
            $table->time('jueves_a');
            $table->time('viernes_de');
            $table->time('viernes_a');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->dropColumn('lunes_de');
            $table->dropColumn('lunes_a');
            $table->dropColumn('martes_de');
            $table->dropColumn('martes_a');
            $table->dropColumn('miercoles_de');
            $table->dropColumn('miercoles_a');
            $table->dropColumn('jueves_de');
            $table->dropColumn('jueves_a');
            $table->dropColumn('viernes_de');
            $table->dropColumn('viernes_a');
        });
    }
}
