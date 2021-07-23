<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zonas', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('idCanton');
            $table->unsignedBigInteger('idParroquia');
            $table->string('nombreZona');
            $table->string('localidad');
            $table->string('x');
            $table->string('y');
           /* $table->foreign('idCanton')
                ->references('id')->on('cantons')
                ->onDelete('cascade')
                ->onUpdate('cascade');*/
            $table->foreign('idParroquia')
                ->references('id')->on('parroquias')
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
        Schema::dropIfExists('zonas');
    }
}
