<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssurerCour extends Model
{
    use HasFactory;
    protected $table = 'assurer_cours';
    protected $fillable = [
        'id_salle',
        'id_date',
        'id_heure_debut',
        'id_heure_fin',
        'id_cahier_texte',
        'id_prof',
        'N_groupe',
        'id_element',
        'id_module'
    ];

    // / Définir les relations si nécessaire (par exemple, une relation avec un autre modèle).
    public function salle()
    {
        return $this->belongsTo(Salle::class, 'id_salle');
    }

    public function date()
    {
        return $this->belongsTo(Date::class, 'id_date');
    }

    public function prof()
    {
        return $this->belongsTo(Prof::class, 'id_prof');
    }

    public function element()
    {
        return $this->belongsTo(Element::class, 'id_element');
    }
}
