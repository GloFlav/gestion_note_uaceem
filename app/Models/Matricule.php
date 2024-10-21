<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricule extends Model
{
    use HasFactory;

    protected $table = 'matricules';

    protected $fillable = [
        'etudiant_id',
        'candidat_id',
        'design'
    ];

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class, 'matricule', 'id');
    }
}
