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
        Schema::create('done_diaexamenes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('diaexamene_id');
            $table->unsignedBigInteger('user_id');
            $table->datetime('fechahora');
            $table->foreign('diaexamene_id')->on('dia_examenes')->references('id');
            $table->foreign('user_id')->on('users')->references('id');
            $table->unique('diaexamene_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('done_diaexamenes');
    }
};
