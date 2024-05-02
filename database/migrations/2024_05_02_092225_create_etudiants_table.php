<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
             $table->string('Etablissement');
             /*
             etudiant
             */
            $table->Text('Code_Apogee');
            $table->text('Cne');
            $table->Text('Cycle');
            $table->date('Date_inscription');
            $table->Text('Nom');
            $table->Text('Prenom');
            $table->date('Date_naissance');
            $table->text('Sexe');
            $table->date('Lieu_naissance');
            $table->text('Cni');
            $table->text('Adresse');
            $table->text('Email');
            $table->text('Telephone');
            /*
             parent
             */
            $table->text('Nom_pere');
            $table->text('Prenom_pere');
            $table->text('Profesion_pere');
            $table->text('Telephone_pere');
            $table->text('Nom_mere');
            $table->text('Prenom_mere');
            $table->text('Profesion_mere');
            $table->text('Telephone_mere');
            $table->text('Nom_tuteur');
            $table->text('Telephone_tuteur');
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
};
