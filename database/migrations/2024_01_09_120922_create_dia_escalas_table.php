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
        Schema::create('dia_escalas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dia_id');
            $table->unsignedBigInteger('escala_id');
            $table->unsignedBigInteger('user_id');
            $table->time('hora');
            $table->foreign('dia_id')->on('dias')->references('id')->onDelete('cascade');
            $table->foreign('escala_id')->on('escalas')->references('id')->onDelete('cascade');
            $table->foreign('user_id')->on('users')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dia_escalas');
    }
};
