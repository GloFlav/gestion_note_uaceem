<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    protected $table = 'groupes';

    protected $fillable = ['design','description','niveaux_id'];

    public function niveaux()
    {
        return $this->belongsTo(Niveau::class);
    }

    public function sousgroupes()
    {
        return $this->hasMany(SousGroupe::class, 'groupes_id');
    }
}
