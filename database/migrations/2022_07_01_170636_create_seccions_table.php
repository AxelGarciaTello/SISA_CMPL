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
        Schema::create('seccions', function (Blueprint $table) {
            $table->id('IdSeccion');
            $table->string('NombreSeccion',200);
            $table->string('TipoContenido',25);
            $table->integer('Precedencia')->nullable();
            $table->unsignedBigInteger('Area_Id');
            $table->unsignedBigInteger('CreadoPor');
            $table->unsignedBigInteger('EditadoPor');
            $table->timestamps();
        });

        Schema::table('seccions', function (Blueprint $table) {
            $table->foreign('Area_Id')->references('IdArea')->on('areas');
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
        Schema::dropIfExists('seccions');
    }
};
