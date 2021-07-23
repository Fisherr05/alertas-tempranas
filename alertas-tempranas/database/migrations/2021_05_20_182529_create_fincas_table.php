<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFincasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fincas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idZona');
            $table->string('nombreFinca');
            $table->string('propietarioFinca');
            $table->string('cedula');
            $table->string('telefono');
            $table->string('densidad');
            $table->string('coordenadaX');
            $table->string('coordenadaY');
            $table->foreign('idZona')
                ->references('id')->on('zonas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('fincas');
    }
}
