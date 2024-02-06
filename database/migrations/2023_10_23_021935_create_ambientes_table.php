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
        Schema::create('ambientes', function (Blueprint $table) {
            $table->id();
            $table->string('ambiente');
            $table->string('cama');
            $table->unsignedBigInteger('servicio_id');
            $table->string('observacion')->nullable();
            $table->unique(['ambiente','cama','servicio_id']);
            $table->foreign('servicio_id')->on('servicios')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ambientes');
    }
};
