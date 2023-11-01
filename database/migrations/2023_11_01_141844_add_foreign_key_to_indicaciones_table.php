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
        Schema::table('indicaciones', function (Blueprint $table) {
            $table->foreign('via_id')->on('vias')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('indicaciones', function (Blueprint $table) {
            //
            $table->dropForeign('via_id');
        });
    }
};
