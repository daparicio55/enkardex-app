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
        Schema::create('dia_indicaciones', function (Blueprint $table) {
            $table->id();
            $table->time('hora');
            $table->unsignedBigInteger('dia_id');
            $table->unsignedBigInteger('indicacione_id');
            $table->unsignedBigInteger('user_id');
            $table->string('tipo');
            $table->dateTime('registro');
            $table->unique(['hora','dia_id','indicacione_id']);
            $table->foreign('dia_id')->on('dias')->references('id')->onDelete('cascade');
            $table->foreign('indicacione_id')->on('indicaciones')->references('id')->onDelete('cascade');
            $table->foreign('user_id')->on('users')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dia_indicaciones');
    }
};
