<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinador', function (Blueprint $table) {
            $table->unsignedInteger('cod_coordinador')->autoIncrement()->startingValue(500);
            $table->unsignedBigInteger('cod_user')->nullable();
            $table->string('nombres')->nullable(false);
            $table->string('apellidos')->nullable(false);
            $table->integer('identificacion')->nullable(false);
            $table->string('direccion')->nullable();
            $table->integer('telefono')->nullable();
            $table->string('genero')->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->string('foto')->nullable();
            $table->integer('cod_docente')->nullable(false);
            $table->integer('cod_programa_academico')->nullable(false);
            $table->string('area_conocimiento')->nullable();
            $table->string('fecha_vinculacion')->nullable();
            $table->string('acuerdo_nombramiento')->nullable();        
            $table->foreign('cod_programa_academico')->references('cod_programa_academico')->on('programa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coordinador');
    }
};
