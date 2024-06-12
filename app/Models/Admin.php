<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $guard = 'admin';
   
    protected $table = 'admin';
    protected $fillable = [
        'mot_pass',
        'nom',
        'prenom',
        'nom_utilisateur',];
}
