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
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mention_id')->nullable()->constrained('mentions')->onDelete('set null');
            $table->foreignId('serie_id')->nullable()->constrained('series')->onDelete('set null');
            $table->string('nom');
            $table->string('num_bacc')->unique();
            $table->year('anne_bacc');
            $table->string('tel');
            $table->string('num_conc')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('preuve_bacc')->nullable();
            $table->enum('status', ['admis', 'recalé'])->nullable();
            $table->string('ref_mvola')->nullable();
            $table->string('commentaire')->nullable();
            $table->enum('mode_inscription', ['local', 'en_ligne']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidats');
    }
};
