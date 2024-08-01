<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeureDebut extends Model
{
    use HasFactory;
    protected $table = 'heure_debut';
    protected $fillable = [
        'id_heure_debut',
        'heure_debut'
    ];
}
