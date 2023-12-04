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
        Schema::create('done_dia_procedimientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('diaprocedimiento_id')->unique();
            $table->unsignedBigInteger('user_id');
            $table->dateTime('fechahora');
            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('diaprocedimiento_id')->on('dia_procedimientos')->references('id');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('done_dia_procedimientos');
    }
};
