<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    protected $table = 'element';

    public $incrementing = false;

    public $timestamps = false;
    protected $fillable = [
       
       
        'num_element',
        'intitule',
        'descriprion',
        'nbr_heure_cours',
        'num_module',
          
           
       ];
       public function seance()
    {
        return $this->hasMany(Seance::class, 'num_element',);
    }
}