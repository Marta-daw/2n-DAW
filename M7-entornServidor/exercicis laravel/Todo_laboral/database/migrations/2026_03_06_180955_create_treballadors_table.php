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
        Schema::create('treballadors', function (Blueprint $table) {
            $table->string('dni')->primary();
            $table->string('nom');
            $table->string('cognoms1');
            $table->string('cognoms2');
            $table->string('correu')->unique();
            $table->string('telefon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treballadors');
    }
};
