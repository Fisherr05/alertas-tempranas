<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFincaVariedadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finca_variedad', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idFinca');
            $table->unsignedBigInteger('idVariedad');
            $table->string('codigo');
            $table->foreign('idFinca')->references('id')->on('fincas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idVariedad')->references('id')->on('variedads')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('finca_variedad');
    }
}
