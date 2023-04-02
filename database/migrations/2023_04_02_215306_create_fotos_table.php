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
        Schema::create('fotos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('palabra0');
            $table->string('palabra1');
            $table->string('palabra2');
            $table->string('palabra3');
            $table->string('palabra4');
            $table->string('palabra5');
            $table->string('palabra6');
            $table->string('palabra7');
            $table->string('palabra8');
            $table->string('palabra9');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fotos');
    }
};
