<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitoreosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitoreos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idEstudio');
            $table->unsignedBigInteger('idTecnico');
            $table->string('codigo');
            $table->date('fechaPlanificada');
            $table->date('fechaEjecucion');
            $table->string('observaciones')->nullable();
            $table->string('estado');
            $table->foreign('idEstudio')->references('id')->on('estudios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idTecnico')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('monitoreos');
    }
}
