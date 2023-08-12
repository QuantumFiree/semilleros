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
        Schema::create('evento', function (Blueprint $table) {
            $table->unsignedInteger('cod_evento')->autoIncrement()->startingValue(3100);
            $table->string('nombre')->nullable(false);
            $table->string('descripcion')->nullable();
            $table->string('fecha_inicio')->nullable();
            $table->string('fecha_fin')->nullable();
            $table->string('lugar')->nullable();
            $table->string('tipo')->nullable();
            $table->string('modalidad')->nullable();
            $table->string('clasificacion')->nullable();
            $table->string('observaciones')->nullable();
            $table->unsignedInteger('cod_semillero')->nullable(false);
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
        Schema::dropIfExists('evento');
    }
};
