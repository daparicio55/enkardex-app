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
        Schema::table('kardexes', function (Blueprint $table) {
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->on('pacientes')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kardexes', function (Blueprint $table) {
            //
            $table->dropForeign(['paciente_id']);
            $table->dropColumn('paciente_id');
        });
    }
};
