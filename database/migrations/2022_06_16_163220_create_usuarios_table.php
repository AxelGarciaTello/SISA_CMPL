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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('GradoAcademico')->default('12');
            $table->string('Nombre',50);
            $table->string('ApPaterno',50);
            $table->string('ApMaterno',50);
            $table->string('Email',30);
            $table->string('Password');
            $table->integer('Extension');
            $table->string('Rol',50)->nullable();
            $table->unsignedBigInteger('Area_Id')->nullable();
            $table->unsignedBigInteger('Cargo_Id')->default('27');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('usuarios', function(Blueprint $table) {
            $table->foreign('GradoAcademico')->references('IdGrado')->on('grado_academicos');
            $table->foreign('Cargo_Id')->references('IdCargo')->on('cargos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
