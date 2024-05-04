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
        Schema::create('filieres', function (Blueprint $table) {
            $table->text('Code_Filiere')->primary();
            $table->text('Intitule');
            $table->text('Description');
            $table->text('Nombre_Annee');
            $table->text('Cycle');
            $table->text('CIN_Coordonnateur');
            $table->foreign('CIN_Coordonnateur')->references('CIN_Enseignant')->on('enseignants');
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
        Schema::dropIfExists('filieres');
    }
};
