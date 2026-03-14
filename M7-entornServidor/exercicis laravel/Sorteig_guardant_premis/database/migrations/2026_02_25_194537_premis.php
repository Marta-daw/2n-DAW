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
        Schema::table('persones', function (Blueprint $table) {
            //
            $table->string('premis')->nullable()->after('correu'); // Afegim el camp 'premi' després de 'correu'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('persones', function (Blueprint $table) {
            //
            $table->dropColumn('premis'); // Eliminem el camp 'premi' en cas de rollback
        });
    }
};
