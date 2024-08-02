<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    protected $table = 'personnel';
    protected $primaryKey = 'id_personnel';
    protected $fillable = [
        'id_personnel','nom', 'prenom', 'CIN', 'matricule_cnss', 'id_departement',
        'RIB', 'RIB_pdf', 'type_contrat', 'contrat_file', 'cin_file','est_prof','est_salarie','est_Doctorant','specialite','diplome','lieu_affectation'
    ];
    public $timestamps = false;
}
