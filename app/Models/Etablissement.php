<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{

    use HasFactory;
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

   
}