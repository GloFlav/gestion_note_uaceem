<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    protected $table = 'series';

    protected $fillable = [
        'design',
    ];

    public function candidats()
    {
        return $this->hasMany(Etudiant::class);
    }
    public function mentions()
    {
        return $this->belongsToMany(Mention::class);
    }
}
