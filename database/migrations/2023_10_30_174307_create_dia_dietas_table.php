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
        Schema::create('dia_dietas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dia_id');
            $table->unsignedBigInteger('dieta_id');
            $table->unique(['dia_id','dieta_id']);
            $table->foreign('dia_id')->on('dias')->references('id');
            $table->foreign('dieta_id')->on('dietas')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dia_dietas');
    }
};
