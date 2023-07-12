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
        Schema::create('participantes_presentacion_proyecto', function (Blueprint $table) {
            $table->integer('cod_presentacion_proyecto')->nullable(false);
            $table->integer('cod_semillerista')->nullable(false);
        
            $table->foreign('cod_presentacion_proyecto')->references('cod_presentacion_proyecto')->on('presentacion_proyecto');
            $table->foreign('cod_semillerista')->references('cod_semillerista')->on('semillerista');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participantes_presentacion_proyecto');
    }
};
