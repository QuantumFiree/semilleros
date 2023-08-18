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
        Schema::create('proyecto', function (Blueprint $table) {
            $table->unsignedInteger('cod_proyecto')->autoIncrement()->startingValue(2100);
            $table->string('titulo')->nullable(false);
            $table->unsignedInteger('cod_semillero')->nullable(false);
            $table->string('tipo_proyecto')->nullable();
            $table->string('estado')->nullable(false);
            $table->string('fecha_inicio')->nullable();
            $table->string('fecha_finalizacion')->nullable();
            $table->string('propuesta')->nullable();
            $table->string('proyecto_final')->nullable();
            $table->foreign('cod_semillero')->references('cod_semillero')->on('semillero');
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
        Schema::dropIfExists('proyecto');
    }
};
