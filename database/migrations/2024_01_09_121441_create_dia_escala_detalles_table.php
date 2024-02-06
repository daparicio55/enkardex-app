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
        Schema::create('dia_escala_detalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('diaescala_id');
            $table->unsignedBigInteger('egvalores_id');
            $table->foreign('diaescala_id')->on('dia_escalas')->references('id');
            $table->foreign('egvalores_id')->on('egvalores')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */ 
    public function down(): void
    {
        Schema::dropIfExists('dia_escala_detalles');
    }
};