<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $table = 'inscriptions';
    //protected $primaryKey = 'apogee';
   
    public $incrementing = false;

   

    public $timestamps = false;

    public function etudiant()
    {
        return $this->belongsTo(Etudians::class, 'apogee');
    }
    public function etablissement()
    {
       
        return $this->belongsTo(Etablissement::class, 'code_etab', 'code_etab');
    }
    public function filiere()
    {
        
        return $this->belongsTo(Filiere::class, 'id_filiere', 'id_filiere');
    }
    protected $fillable = [
        'apogee',
        'code-etab',
        'num_annee',
        'id_filiere',
        'frais',
        'niveau',
       
    ];
    }

    


