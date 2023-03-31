<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('sexo');
            $table->integer('edad');
            $table->string('usuario');            
            $table->string('contrasena');
            $table->integer('puntajeAcum');
            $table->integer('admin');
            $table->integer('veces_con_mas_puntos');
            $table->integer('coincidenciasx2');
            $table->integer('coincidenciasx3');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
