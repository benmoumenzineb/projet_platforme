<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme_Evaluation extends Model
{
    protected $table = 'programme_evaluation';
    protected $fillable = [
        'user_id',
        'num_element',
        'id_filiere',
        'heure_exam',
        'date_exam',
        'description',
    ];
   
    public function element()
    {
        return $this->belongsTo(Element::class, 'num_element');
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'id_filiere');
    }
    public $timestamps = false;
}
