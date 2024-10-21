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
        Schema::table('etudiants', function (Blueprint $table) {
            $table->foreignId('groupes_id')->nullable()->constrained('groupes')->onDelete('set null');
            $table->foreignId('mention_id')->nullable()->constrained('mentions')->onDelete('set null');
            $table->foreignId('sous_groupes_id')->nullable()->constrained('sous_groupes')->onDelete('set null');
            $table->string('nom');
            $table->string('tel');
            $table->string('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('etudiants', function (Blueprint $table) {
            $table->dropColumn('groupes_id','mention_id','sous_groupes_id','nom','tel','email');
        });
    }
};
