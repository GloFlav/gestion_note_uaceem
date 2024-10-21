<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;
    protected $table = 'niveaux';

    protected $fillable = ['design', 'description', 'parcours_id'];

    // Define the relationship with the Parcours model
    public function parcours()
    {
        return $this->belongsTo(Parcours::class);
    }

    public function groupes()
    {
        return $this->hasMany(Groupe::class);
    }
}
