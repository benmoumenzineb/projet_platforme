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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->text('Code_Etabli');
             // $table->text('Code_Apogee');
             $table->text('Num_Annee');
             $table->text('Code_Filiere');
            $table->text('Frais');
            $table->text('Niveau');
            $table->timestamps();
            $table->foreign('Code_Filiere')->references('Code_Filiere')->on('filieres');
            $table->foreign('Num_Annee')->references('Num_Annee')->on('annee_scolaires');
            $table->foreign('Code_Etabli')->references('Code_Etabli')->on('etablissements');
             // $table->foreign('Code_Apogee')->references('Code_Apogee')->on('etudiants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscriptions');
    }
};
