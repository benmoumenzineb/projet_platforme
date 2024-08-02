<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;
    protected $table = 'date';
    protected $primaryKey = 'id_date';
    protected $fillable = [
        'id_date',
        'date'
    ];
}
