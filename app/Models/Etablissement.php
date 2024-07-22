<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{

 
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'code_etab', 'code_etab');
    }

    protected $table = 'etablissement';
    protected $fillable = [
        'ville',
        ];
    protected $primaryKey = 'code_etab';
    public $incrementing = false;

    public $timestamps = false;
    public function students()
    {
        return $this->hasManyThrough(Etudians::class, Inscription::class, 'code_etab', 'apogee', 'code_etab', 'apogee');
    }
    public function etudiants()
    {
        return $this->hasMany(Etudians::class, 'code_postal', 'code_postal');
    }

}