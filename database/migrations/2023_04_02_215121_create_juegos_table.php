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
        Schema::create('juegos', function (Blueprint $table) {
            $table->id();
            $table->biginteger('imagen1');
            $table->bigInteger('imagen2');
            $table->bigInteger('imagen3');
            $table->bigInteger('jugador1');
            $table->integer('puntaje1');
            $table->bigInteger('jugador2');
            $table->integer('puntaje2');
            $table->bigInteger('jugador3');
            $table->integer('puntaje3');
            $table->string('juego_terminado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('juegos');
    }
};
