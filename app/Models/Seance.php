<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seance extends Model
{
    protected $table = 'seance';
    public $timestamps = false;
    protected $fillable = [
       
       
     'num_seance',
     'date_seance',
     'heure_depart',
     'objectif',
     'heure_fin',
        'num_element',
        'id_groupe',
        
    ];

}