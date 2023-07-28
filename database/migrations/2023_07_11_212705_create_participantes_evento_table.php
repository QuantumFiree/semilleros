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
        Schema::create('participantes_evento', function (Blueprint $table) {
            $table->integer('cod_evento')->nullable(false);
            $table->integer('identificacion')->nullable(false);
            $table->string('correo')->nullable(false);
        
            //$table->foreign('cod_evento')->references('cod_evento')->on('evento');
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
        Schema::dropIfExists('participantes_evento');
    }
};
