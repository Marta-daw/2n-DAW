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
        Schema::create('tasques', function (Blueprint $table) {
            $table->id(); $table->string('titol');

            $table->text('descripcio')->nullable();

            $table->enum('prioritat', ['baixa', 'mitjana', 'alta'])->default('mitjana');

            $table->enum('stat', ['pendent', 'en_curs', 'completada'])->default('pendent');

            // Relació N → 1 amb categories

            $table->foreignId('category_id')->constrained()->onDelete('cascade');

            $table->timestamps(); // Per control de creació i actualització
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasques');
    }
};
