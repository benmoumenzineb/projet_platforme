<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    protected $fillable = [
        'Etablissement',
        'Code_Apogee',
        'Cne',
        'Cycle',
        'Date_inscription',
        'Nom',
        'Prenom',
       
        'Date_naissance',
        'Sexe',
        'Lieu_naissance', 
        'Cni',
        'Adresse',
        'Email',
        'Telephone',
        'Nom_pere',
        'Prenom_pere',
        'Prefession_pere',
        'Telephone_pere',
        'Nom_mere',
        'Prenom_mere',
        'Prefession_mere',
        'Telephone_mere',
        'Nom_tuteur',
        'Telephone_tuteur',
    ];
}
