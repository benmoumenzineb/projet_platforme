<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeureFin extends Model
{
    use HasFactory;
    protected $table = 'heure_fin';
    protected $primaryKey = 'id_heure_fin';
    protected $fillable = [
        'id_heure_fin',
        'heure_fin'
    ];
}
