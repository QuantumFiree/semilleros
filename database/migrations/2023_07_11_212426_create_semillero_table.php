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
        Schema::create('semillero', function (Blueprint $table) {
            $table->unsignedInteger('cod_semillero')->autoIncrement()->startingValue(1000);
            $table->string('nombre')->nullable(false);
            $table->string('correo')->nullable(false);
            $table->string('descripcion')->nullable();
            $table->string('mision')->nullable();
            $table->string('vision')->nullable();
            $table->string('valores')->nullable();
            $table->string('objetivo')->nullable();
            $table->string('lineas_investigacion')->nullable();
            $table->string('presentacion')->nullable();
            $table->string('fecha_creacion')->nullable();
            $table->integer('numero_resolucion')->nullable();
            $table->string('logo')->nullable();
            $table->unsignedInteger('cod_coordinador')->nullable(false);
        
            $table->foreign('cod_coordinador')->references('cod_coordinador')->on('coordinador');
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
        Schema::dropIfExists('semillero');
    }
};
