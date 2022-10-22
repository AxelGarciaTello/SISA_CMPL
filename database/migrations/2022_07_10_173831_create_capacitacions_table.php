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
        Schema::create('capacitacions', function (Blueprint $table) {
            $table->id('IdCapacitacion');
            $table->string('Titulo',200);
            $table->string('Descripcion',900)->nullable();
            $table->string('Archivo',900)->nullable();
            $table->string('Link',500)->nullable();
            $table->unsignedBigInteger('CreadoPor');
            $table->unsignedBigInteger('EditadoPor');
            $table->timestamps();
        });

        Schema::table('capacitacions', function (Blueprint $table) {
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
        Schema::dropIfExists('capacitacions');
    }
};
