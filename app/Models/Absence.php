<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $table = 'absence';

    public $incrementing = false;

    public $timestamps = false;
    public function etudient()
    {
        return $this->hasMany(Etudains::class, 'apogee',);
    }
    public function element()
    {
        return $this->hasMany(Element::class, 'num_element',);
    }
    protected $fillable = [
       
       
        'apogee',
        'num_element',
        'date_abs',
        'heure_abs',
        'etat',
        'remarque',

          
           
       ];
}