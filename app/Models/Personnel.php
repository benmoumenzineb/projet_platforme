<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    protected $table = 'personnel';
    protected $fillable = [
        'cin_salarie',
        
        'nom',
        'prenom',
        'etablissement',
       
        
    ];
}
