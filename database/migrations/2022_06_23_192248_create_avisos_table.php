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
        Schema::create('avisos', function (Blueprint $table) {
            $table->id('idAviso');
            $table->text('aviso');
            $table->string('titulo',50);
            $table->smallInteger('prioridad');
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();
        });

        Schema::table('avisos', function (Blueprint $table) {
            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avisos');
    }
};
