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
        Schema::create('memoranda', function (Blueprint $table) {
            $table->id('IdMemorandum');
            $table->unsignedBigInteger('Destinatario');
            $table->string('NoMemorandum',50);
            $table->string('Asunto',900);
            $table->string('Tipo',15);
            $table->date('FechaRespuesta')->nullable();
            $table->string('Documento',900);
            $table->unsignedBigInteger('Remitente');
            $table->timestamps();
        });

        Schema::table('memoranda', function(Blueprint $table) {
            $table->foreign('Destinatario')->references('id')->on('usuarios');
            $table->foreign('Remitente')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memoranda');
    }
};
