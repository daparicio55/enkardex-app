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
        Schema::create('eauxiliares', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion')->nullable();
            $table->unsignedBigInteger('examene_id');
            $table->unsignedBigInteger('doctore_id');
            /* $table->unsignedBigInteger('user_id'); */
            $table->unsignedBigInteger('kardex_id');
            $table->foreign('examene_id')->on('examenes')->references('id');
            /* $table->foreign('user_id')->on('users')->references('id'); */
            $table->foreign('kardex_id')->on('kardexes')->references('id');
            $table->foreign('doctore_id')->on('doctores')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eauxiliares');
    }
};
