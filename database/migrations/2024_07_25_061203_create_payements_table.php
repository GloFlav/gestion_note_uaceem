<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayementsTable extends Migration
{
    public function up()
    {
        Schema::create('payements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utilisateur_id')->nullable()->constrained('utilisateurs')->onDelete('set null');
            $table->foreignId('etudiant_id')->nullable()->constrained('etudiants')->onDelete('set null');
            $table->date('date');
            $table->string('type');
            $table->decimal('montant', 10, 2);
            $table->enum('mode', ['espece', 'mvola']);
            $table->string('reference')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payements');
    }
}
