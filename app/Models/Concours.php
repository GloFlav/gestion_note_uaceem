<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Concours extends Model
{
    use HasFactory;

    protected $table = 'concours';

    protected $fillable = [
        'type'
    ];

    public function vague()
    {
        return $this->HasMany(Vague::class);
    }
}
