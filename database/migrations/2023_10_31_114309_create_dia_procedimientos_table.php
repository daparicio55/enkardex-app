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
        Schema::create('dia_procedimientos', function (Blueprint $table) {
            $table->id();
            $table->time('hora');
            $table->unsignedBigInteger('procedimiento_id');
            $table->unsignedBigInteger('dia_id');
            $table->unique(['procedimiento_id','dia_id']);
            $table->foreign('procedimiento_id')->on('procedimientos')->references('id');
            $table->foreign('dia_id')->on('dias')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dia_procedimientos');
    }
};
