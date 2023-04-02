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
            $table->id('imagen1');
            $table->id('imagen2');
            $table->id('imagen3');
            $table->id('jugador1');
            $table->integer('puntaje1');
            $table->id('jugador2');
            $table->integer('puntaje2');
            $table->id('jugador3');
            $table->integer('puntaje3');
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
