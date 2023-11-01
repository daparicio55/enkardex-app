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
        Schema::create('indicaciones', function (Blueprint $table) {
            $table->id();
            $table->string('dosis')->nullable();
            $table->string('frecuencia')->nullable();
            $table->unsignedBigInteger('medicamento_id');
            $table->unsignedBigInteger('via_id')->nullable();
            $table->unsignedBigInteger('kardex_id');
            $table->foreign('medicamento_id')->on('medicamentos')->references('id');
            $table->foreign('kardex_id')->on('kardexes')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indicaciones');
    }
};
