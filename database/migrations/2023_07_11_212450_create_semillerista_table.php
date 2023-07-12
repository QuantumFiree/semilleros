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
        Schema::create('semillerista', function (Blueprint $table) {
            $table->unsignedInteger('cod_semillerista')->autoIncrement()->startingValue(1100);
            $table->unsignedBigInteger('cod_user')->nullable();
            $table->string('nombres')->nullable(false);
            $table->string('apellidos')->nullable(false);
            $table->integer('identificacion')->nullable(false);
            $table->string('direccion')->nullable();
            $table->integer('telefono')->nullable();
            $table->string('genero')->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->string('foto')->nullable();
            $table->integer('cod_estudiantil')->nullable(false);
            $table->integer('semestre')->nullable();
            $table->string('reporte_matricula')->nullable();
            $table->integer('cod_programa_academico')->nullable(false);
            $table->string('fecha_vinculacion')->nullable();
            $table->boolean('estado')->nullable(false);
            $table->integer('cod_semillero')->nullable(false);
        
            $table->foreign('cod_programa_academico')->references('cod_programa_academico')->on('programa');
            $table->foreign('cod_semillero')->references('cod_semillero')->on('semillero');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semillerista');
    }
};
