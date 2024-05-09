<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudians extends Model
{
    protected $table = 'etudians';
    protected $primaryKey = 'apogee';

    // Indiquer que la clé primaire n'est pas un entier auto-incrémenté
    public $incrementing = false;

    // Indiquer que la clé primaire n'a pas de timestamps
    public $timestamps = false;
    
    
}
