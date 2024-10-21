<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payement extends Model
{
    use HasFactory;

    protected $table = 'payements';

    protected $fillable = [
        'utilisateur_id',
        'etudiant_id',
        'candidat_id',
        'date',
        'type',
        'montant',
        'mode',
        'reference',
        'commentaire'
    ];

    protected $casts = [
        'montant' => 'decimal:2',
    ];

    protected $dates = ['date'];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
    public function candidat()
    {
        return $this->belongsTo(Candidat::class, 'candidat_id');
    }

    public function scopeOfMode($query, $mode)
    {
        return $query->where('mode', $mode);
    }
}
