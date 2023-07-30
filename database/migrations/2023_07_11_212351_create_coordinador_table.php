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
            $table->unsignedInteger('cod_coordinador')->autoIncrement()->startingValue(3100);
            $table->unsignedInteger('cod_user')->nullable(false);
            $table->string('nombres')->nullable(false);
            $table->string('apellidos')->nullable(false);
            $table->integer('identificacion')->nullable(false);
            $table->string('direccion')->nullable();
            $table->integer('telefono')->nullable();
            $table->string('genero')->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->string('foto')->nullable();
            $table->unsignedInteger('cod_programa_academico')->nullable(false);

            $table->integer('cod_docente')->nullable(false);
            $table->string('area_conocimiento')->nullable();
            $table->string('fecha_vinculacion')->nullable();
            $table->string('acuerdo_nombramiento')->nullable();
                    
            //$table->foreign('cod_programa_academico')->references('cod_programa_academico')->on('programa');
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
        Schema::dropIfExists('coordinador');
    }
};
