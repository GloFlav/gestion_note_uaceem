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
        Schema::create('matricules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidat_id')->nullable()->constrained('candidats')->onDelete('set null');
            $table->foreignId('etudiant_id')->nullable()->constrained('etudiants')->onDelete('set null');
            $table->string('design')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matricules');
    }
};
