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
        Schema::create('persones', function (Blueprint $table) {
            $table->string('dni')->primary(); 

            $table->string('nom'); 

            $table->string('cognom1'); 

            $table->string('cognom2')->nullable(); 

            $table->string('telefon')->nullable(); 

            $table->string('correu')->unique(); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persones');
    }
};
