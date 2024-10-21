<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcours extends Model
{
    use HasFactory;
    // Define the table associated with the model
    protected $table = 'parcours';

    // Define the fillable attributes
    protected $fillable = [
        'design',
        'description',
        'mention_id',
    ];

    // Define the relationship with the Mention model
    public function mention()
    {
        return $this->belongsTo(Mention::class);
    }
    public function niveaux()
    {
        return $this->hasMany(Niveau::class, "parcours_id");
    }
}
