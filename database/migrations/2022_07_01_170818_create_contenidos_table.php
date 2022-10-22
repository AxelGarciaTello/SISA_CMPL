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
        Schema::create('contenidos', function (Blueprint $table) {
            $table->id('IdContenido');
            $table->string('NombreODescripcion',900);
            $table->string('Archivo',900)->nullable();
            $table->unsignedBigInteger('Seccion_Id');
            $table->unsignedBigInteger('CreadoPor');
            $table->unsignedBigInteger('EditadoPor');
            $table->timestamps();
        });

        Schema::table('contenidos', function (Blueprint $table) {
            $table->foreign('Seccion_Id')->references('IdSeccion')->on('seccions');
            $table->foreign('CreadoPor')->references('id')->on('usuarios');
            $table->foreign('EditadoPor')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contenidos');
    }
};
