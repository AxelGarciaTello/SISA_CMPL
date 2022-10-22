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
        Schema::create('oficios', function (Blueprint $table) {
            $table->id('IdOficio');
            $table->unsignedBigInteger('Destinatario');
            $table->string('NoOficio',50);
            $table->string('Asunto',900);
            $table->string('Tipo',15);
            $table->smallInteger('Prioridad');
            $table->date('FechaRespuesta')->nullable();
            $table->string('Documento',900);
            $table->unsignedBigInteger('Remitente');
            $table->timestamps();
        });

        Schema::table('oficios', function(Blueprint $table) {
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
        Schema::dropIfExists('oficios');
    }
};
