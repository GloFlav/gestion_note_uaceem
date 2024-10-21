<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousGroupe extends Model
{
    use HasFactory;

    protected $table = 'sous_groupes';

    protected $fillable = ['design','description','groupes_id'];

    public function groupe()
    {
        return $this->belongsTo(Groupe::class, 'groupes_id');
    }
}
