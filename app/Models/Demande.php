<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    protected $table = 'demandes';
    protected $fillable = [
        'apogee', 'Nom', 'Prenom', 'filiere', 'semestre', 'Numero', 'Email', 'Type', 'status', 'message'
    ];
    public function etudient()
    {
        return $this->belongsTo(Etudians::class, 'apogee', 'apogee');
    }
}
