<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vague extends Model
{
    use HasFactory;

    protected $table = 'vagues';

    protected $fillable = [
        'designation','deb_insc','fin_insc','deb_conc','fin_conc','concours_id','commentaire'
    ];

    public function concours()
    {
        return $this->belongsTo(Concours::class);
    }

    public function candidat()
    {
        return $this->hasMany(Candidat::class);
    }
}
