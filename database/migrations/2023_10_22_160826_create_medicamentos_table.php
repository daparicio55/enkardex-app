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
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('denominacion');
            $table->string('especificaciones')->nullable();
            $table->string('unidad');
            $table->string('restriccion')->nullable();
            $table->longText('indicaciones')->nullable();
            $table->unique(['denominacion','especificaciones']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicamentos');
    }
};
