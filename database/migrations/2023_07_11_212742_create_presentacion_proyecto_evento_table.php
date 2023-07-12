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
        Schema::create('presentacion_proyecto', function (Blueprint $table) {
            $table->unsignedInteger('cod_presentacion_proyecto')->autoIncrement()->startingValue(4100);
            $table->string('participacion')->nullable();
            $table->string('calificacion')->nullable();
            $table->string('certificacion')->nullable();
            $table->string('evidencias')->nullable();
            $table->integer('cod_evento')->nullable()->nullable(false);
            $table->integer('cod_proyecto')->nullable()->nullable(false);
        
            $table->foreign('cod_evento')->references('cod_evento')->on('evento');
            $table->foreign('cod_proyecto')->references('cod_proyecto')->on('proyecto');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presentacion_proyecto');
    }
};
