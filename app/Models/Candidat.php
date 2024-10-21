<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidat extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'candidats';

    protected $fillable = [
        'mention_id',
        'serie_id',
        'nom',
        'num_bacc',
        'anne_bacc',
        'tel',
        'email',
        'vagues_id',
        'preuve_bacc',
        'status',
        'ref_mvola',
        'mode_inscription',
        'num_conc',
        'commentaire'
    ];


    protected $casts = [
        'anne_bacc' => 'integer',
    ];

    protected $attributes = [
        'status' => null,
    ];

    public function scopeOfStatus($query, $mode)
    {
        return $query->where('statut', $mode);
    }
    public function scopeOfModeInscription($query, $mode)
    {
        return $query->where('mode_inscription', $mode);
    }

    public function mention()
    {
        return $this->belongsTo(Mention::class);
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function payement()
    {
        return $this->hasOne(Payement::class);
    }

    public function etudiant()
    {
        return $this->hasOne(Etudiant::class);
    }

    public function matricule()
    {
        return $this->hasOne(Matricule::class);
    }
    public function vague()
    {
        return $this->belongsTo(Vague::class, "vagues_id");
    }
}
