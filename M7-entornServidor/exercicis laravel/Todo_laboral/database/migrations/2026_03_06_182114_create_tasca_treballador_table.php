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
        Schema::create('tasca_treballador', function (Blueprint $table) {
            $table->unsignedBigInteger('tasca_id');
            $table->string('treballador_dni');

            $table->foreign('tasca_id')
                ->references('id')->on('tasques')
                ->onDelete('cascade');

            $table->foreign('treballador_dni')
                ->references('dni')->on('treballadors')
                ->onDelete('cascade');

            $table->primary(['tasca_id', 'treballador_dni']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasca_treballador');
    }
};
