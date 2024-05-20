<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudians extends Model
{
    protected $table = 'etudians';

    public $incrementing = false;

    public $timestamps = false;
    protected $fillable = [
        'id',
        'Nom',
        'Prenom',
        'CNE',
        'CNI',
        'Sexe',
        'Date_naissance',
        'Pays',
        'Diplome_acces',
        'Serie_bac',
        'Date_inscription',
        'Specialite_diplome',
        'Mention_bac',
        'Etablissement_bac',
        'Pourcentage_bourse',
      
    ];
    
}
