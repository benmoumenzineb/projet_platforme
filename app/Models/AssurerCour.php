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
        'id_module',
    ];

    public function salle()
    {
        return $this->belongsTo(Salle::class, 'id_salle', 'id_salle');
    }

    public function date()
    {
        return $this->belongsTo(Date::class, 'id_date', 'id_date');
    }

    public function prof()
    {
        return $this->belongsTo(Personnel::class, 'id_personnel','id_personnel');
    }

    public function element()
    {
        return $this->belongsTo(Element::class, 'id_element','id_element');
    }

    public function module()
    {
        return $this->belongsTo(Module::class, 'id_module');
    }

    public function heureDebut()
    {
        return $this->belongsTo(HeureDebut::class, 'id_heure_debut');
    }

    public function heureFin()
    {
        return $this->belongsTo(HeureFin::class, 'id_heure_fin');
    }
}
