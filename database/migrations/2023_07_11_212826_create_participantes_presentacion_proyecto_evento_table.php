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
            $table->unsignedInteger('cod_presentacion_proyecto')->nullable(false);
            $table->unsignedInteger('cod_semillerista')->nullable(false);

            $table->foreign('cod_presentacion_proyecto', 'fk_cod_presentacion_proyecto')->references('cod_presentacion_proyecto')->on('presentacion_proyecto');
            $table->foreign('cod_semillerista', 'fk_cod_semillerista')->references('cod_semillerista')->on('semillerista');
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
        Schema::dropIfExists('participantes_presentacion_proyecto');
    }
};
