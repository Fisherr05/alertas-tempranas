<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idFv');
           // $table->unsignedBigInteger('idVariedad');
            $table->string('codigo');
            $table->string('nombreEstudio');
            $table->string('fenologia');
            $table->string('densidad');
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->string('activo');
            $table->foreign('idFv')->references('id')->on('finca_variedad')->onDelete('cascade')->onUpdate('cascade');
           // $table->foreign('idVariedad')->references('id')->on('variedads')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('estudios');
    }
}
