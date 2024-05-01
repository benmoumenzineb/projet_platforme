<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'nom',
        'prenom',
        'filiere',
        'cni',
        'n_telephone',
        'montant',
        'choix',
        'mode_paiement',
        'mois_concerne',
       'image',
        
    ];
}
