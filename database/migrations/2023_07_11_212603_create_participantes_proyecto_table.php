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
        Schema::create('participantes_proyecto', function (Blueprint $table) {
            $table->unsignedInteger('cod_proyecto')->nullable(false);
            $table->unsignedInteger('cod_semillerista')->nullable(false);
            $table->integer('numero_participantes')->nullable(false);
        
            //$table->foreign('cod_proyecto')->references('cod_proyecto')->on('proyecto');
            //$table->foreign('cod_semillerista')->references('cod_semillerista')->on('semillerista');
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
        Schema::dropIfExists('participantes_proyecto');
    }
};
