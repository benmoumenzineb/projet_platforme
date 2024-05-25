<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $table = 'paiement';
    protected $fillable = [
        
        'nom',
        'prenom',
        'filiere',
        'cni',
        'n_telephone',
        'montant',
        'choix',
        'date_paiement',
        'mode_paiement',
        'mois_concerne',
       'image',
       'Email',
        
    ];
}
