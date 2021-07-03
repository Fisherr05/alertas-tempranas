<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idMonitoreo');
            $table->string('incidencia');
            $table->string('severidad');
            $table->unsignedBigInteger('idPlanta');
            $table->unsignedBigInteger('fruto');
            $table->foreign('idMonitoreo')->references('id')->on('monitoreos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idPlanta')->references('id')->on('plantas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('datos');
    }
}
