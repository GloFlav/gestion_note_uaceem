<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidat_id')->nullable()->constrained('candidats')->onDelete('set null');
            $table->string('photo')->nullable();
            $table->string('matricule')->unique();
            $table->enum('sexe', ['M', 'F']);
            $table->date('date_nais');
            $table->string('lieu_nais');
            $table->enum('situation_matri', ['celibataire', 'marier', 'autre'])->default('celibataire');
            $table->string('num_cin')->unique();
            $table->date('date_cin');
            $table->string('lieu_cin');
            $table->string('adresse');
            $table->string('quartier')->nullable();
            $table->string('facebook')->nullable();
            $table->string('etablissement_origine');
            $table->string('email_parent')->nullable();
            $table->string('nom_parent');
            $table->string('adresse_parent');
            $table->string('profession_parent');
            $table->string('tel_parent');
            $table->string('num_mvola')->nullable();
            $table->string('province_parent')->nullable();
            $table->string('nom_parent_2')->nullable();
            $table->string('profession_parent_2')->nullable();
            $table->string('tel_parent_2')->nullable();
            $table->string('centre_interet')->nullable();
            $table->string('password');
            $table->string('username')->unique();
            $table->boolean('password_changed')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('etudiants', function (Blueprint $table) {
            $table->string('matricule');
        });
    }
}
