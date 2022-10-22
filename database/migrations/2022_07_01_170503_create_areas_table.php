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
        Schema::create('areas', function (Blueprint $table) {
            $table->id('IdArea');
            $table->string('NombreArea',100);
            $table->string('Objetivo',900)->nullable();
            $table->string('OrganigramaURL',900)->nullable();
        });

        Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign('Area_Id')->references('IdArea')->on('areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areas');
    }
};
