<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{

    use HasFactory;
    protected $table = 'etablissement';
    protected $primaryKey = 'code_etab';
    public $incrementing = false;

    public $timestamps = false;

   
}
