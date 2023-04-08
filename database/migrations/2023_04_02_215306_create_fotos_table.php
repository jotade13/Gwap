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
            $table->string('palabra0')->nullable();
            $table->string('palabra1')->nullable();
            $table->string('palabra2')->nullable();
            $table->string('palabra3')->nullable();
            $table->string('palabra4')->nullable();
            $table->string('palabra5')->nullable();
            $table->string('palabra6')->nullable();
            $table->string('palabra7')->nullable();
            $table->string('palabra8')->nullable();
            $table->string('palabra9')->nullable();
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
