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
        Schema::create('egvalores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('valor');
            $table->unsignedBigInteger('egrupo_id');
            $table->unique(['nombre','egrupo_id']);
            $table->foreign('egrupo_id')->on('egrupos')->references('id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('egvalores');
    }
};
