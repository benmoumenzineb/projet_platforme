<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'Nom',
        'Prenom',
        'Numero',
        'Email',
        'Type',
        'Description',
        'file_reclamation', // Supprimez l'espace ici
    ];
}
