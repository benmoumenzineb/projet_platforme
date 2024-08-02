<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    protected $table = 'element';

    public $timestamps = false;
    protected $primaryKey = 'id_element';
    protected $fillable = [
       
       
        'id_element',
        'intitule',
        'descriprion',
        'nbr_heure_cours',
        'num_module',
          
           
       ];
       public function seance()
    {
        return $this->hasMany(Seance::class, 'id_element',);
    }
    public function notes_evaluation()
    {
        return $this->hasMany(Note::class, 'id_element',);
    }
    public function module()
    {
        return $this->hasMany(Module::class, 'id_element',);
    }
    public function programmeEvaluations()
    {
        return $this->hasMany(Programme_Evaluation::class, 'id_element');
    }
    public function Absence_accueil()
    {
        return $this->hasMany(Absence_Accueil::class, 'id_element');
    }
}