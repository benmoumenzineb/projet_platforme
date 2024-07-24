<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; // Ajoutez cette ligne

class Paiement extends Model
{
    use HasFactory;

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

    public function etudiant()
    {
        return $this->belongsTo(Etudians::class, 'apogee', 'apogee');
    }

    // j'ai ajouté cette méthode pour obtenir la description du mode de paiement
    public function getModePaiementDescription()
    {
        return DB::table('mode_paiement')
                ->where('id_modepaiement', $this->id_modepaiement)
                ->value('description');
    }
    // Méthode pour obtenir la description du type de paiement
    public function getTypePaiementDescription()
    {
        return DB::table('type_paiement')
                ->where('id_typepaiement', $this->id_typepaiement)
                ->value('description');
    }
}
