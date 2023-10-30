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
        Schema::create('dia_eauxiliares', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('eauxiliare_id');
            $table->unsignedBigInteger('dia_id');
            $table->time('hora');
            $table->string('estado')->default('solicitado');
            $table->unique(['hora','dia_id','eauxiliare_id']);
            $table->foreign('dia_id')->on('dias')->references('id')->onDelete('cascade');
            $table->foreign('eauxiliare_id')->on('eauxiliares')->references('id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dia_eauxiliares');
    }
};
