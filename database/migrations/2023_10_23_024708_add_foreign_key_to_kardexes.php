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
            $table->unsignedBigInteger('ambiente_id');
            $table->foreign('ambiente_id')->on('ambientes')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kardexes', function (Blueprint $table) {
            $table->dropForeign(['ambiente_id']);
            $table->dropColumn('ambiente_id');
        });
    }
};
