<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('direccion');
            $table->string('genero');
            $table->date('fecha_nacimiento');
            $table->string("telefono");
            $table->text('como_nos_conociste');
            $table->string('nombre_del_tutor');
            $table->string('num_emergencia');
            $table->string('facebook');
            $table->string('certificado_secundaria');
            $table->string('acta_de_nacimiento_path');
            $table->string('curp');
            $table->string('comprobande_de_domicilio');
            $table->string('certificado_parcial')->nullable();
            $table->string('estado')->default('alta');
            $table->integer('grupo_id')->unsigned();
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
        Schema::drop('alumnos');
    }
}
