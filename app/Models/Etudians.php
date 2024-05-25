<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Etudians extends Model
{
    protected $table = 'etudient';

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
        'password',
        'apogee',
      
    ];
   
    protected $hidden = ['password', 'remember_token'];

    public function getAuthIdentifierName()
    {
        return 'apogee';
    }
    
}
