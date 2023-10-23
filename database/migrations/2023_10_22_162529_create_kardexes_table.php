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
        Schema::create('kardexes', function (Blueprint $table) {
            $table->id();
            $table->date('fingreso');
            $table->time('hingreso');
            $table->bigInteger('numero');
            $table->longText('diagnostico');
            $table->unsignedBigInteger('doctore_id');
            $table->unsignedBigInteger('enfermero_id');
            $table->unsignedBigInteger('servicio_id');
            $table->foreign('doctore_id')->on('doctores')->references('id');
            $table->foreign('enfermero_id')->on('users')->references('id');
            $table->foreign('servicio_id')->on('servicios')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kardexes');
    }
};
