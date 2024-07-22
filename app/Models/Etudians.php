<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Etudians extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;

    protected $table = 'etudient';
    protected $primaryKey = 'apogee';
    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'apogee',
        'Nom',
        'Prenom',
        'CNE',
        'CNI',
        'Sexe',
        'Date_naissance',
        'Pays',
        'Diplome_acces',
        'Serie_bac',
        'Date_inscription',
        'Specialite_diplome',
        'Mention_bac',
        'Etablissement_bac',
        'Pourcentage_bourse',
        'id',
        'image',
        'telephone',
        'Email',
        'Adresse',
        'nom_tuteur',
        'proffesion_tuteur',
        'telephone_tuteur',

    ];

    public function getAuthPassword()
    {
        return $this->apogee; // Utilise 'apogee' comme mot de passe
    }
   
   

    public function notes_evaluation()
    {
        return $this->hasOne(Note::class, 'apogee');
    }
    
    protected $hidden = ['apogee', 'remember_token'];
    public function absence()
    {
        return $this->hasMany(Absence::class, 'apogee');
    }
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'apogee', 'apogee');
    }
    public function demande()
    {
        return $this->hasMany(Demande::class, 'apogee');
    }
    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class, 'code_postal', 'code_postal');
    }

    public function pays()
    {
        return $this->belongsTo(Pays::class, 'id_pays', 'id_pays');
    }

    public function diplome()
    {
        return $this->belongsTo(Diplome::class, 'code_diplome', 'code_diplome');
    }
    public function tuteur()
    {
        return $this->belongsToMany(Tuteur::class, 'tuteur_etudiant', 'apogee', 'id_tuteur');
    }








}