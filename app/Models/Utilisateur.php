<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Utilisateur extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'utilisateurs';

    protected $fillable = [
        'nom',
        'username',
        'password',
        'role',
        'password_changed',
        'etudiant_id',
        'password'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password_changed' => 'boolean',
    ];

    protected $attributes = [
        'password_changed' => false,
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}
