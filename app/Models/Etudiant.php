<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Etudiant extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'etudiants';

    protected $fillable = [
        'photo', 'matricule', 'sexe', 'date_nais',
        'lieu_nais', 'situation_matri', 'num_cin', 'date_cin', 'lieu_cin',
        'adresse', 'quartier', 'facebook', 'etablissement_origine', 'email_parent',
        'nom_parent', 'adresse_parent', 'profession_parent', 'tel_parent',
        'num_mvola', 'province_parent', 'nom_parent_2', 'profession_parent_2',
        'tel_parent_2', 'centre_interet','username','password','nom','tel','email','mention_id','sous_groupes_id','groupes_id'
    ];


    protected $casts = [
        'date_nais' => 'date',
        'date_cin' => 'date',
    ];

    protected $attributes = [
        'situation_matri' => 'celibataire',
    ];

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }

    public function mention()
    {
        return $this->belongsTo(Mention::class);
    }

    public function payement()
    {
        return $this->hasMany(Payement::class);
    }

    public function matriculeInfo()
    {
        return $this->hasOne(Matricule::class, 'matricule', 'id');
    }

    public function utilisateur()
    {
        return $this->hasMany(Utilisateur::class);
    }
}
