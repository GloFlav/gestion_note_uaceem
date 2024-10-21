<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mention extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mentions';

    protected $fillable = [
        'design', 'code', 'description'
    ];

    public function candidats()
    {
        return $this->hasMany(Candidat::class);
    }
    public function parcours()
    {
        return $this->hasMany(Parcours::class);
    }
    public function series()
    {
        return $this->belongsToMany(Serie::class);
    }
}
