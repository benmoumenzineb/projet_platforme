<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $table = 'inscriptions';
    protected $primaryKey = 'apogee';
    public $incrementing = false;

    public $timestamps = false;
    public function etudient()
    {
        return $this->belongsTo(Etudians::class, 'apogee', 'apogee');
    }

   
    protected $fillable = [
        'apogee',
        'code_etab',
        'num_annee',
        'id_filiere',
        'frais',
        'niveau',
       
    ];
    }