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
        Schema::create('reclamations', function (Blueprint $table) {
            $table->id();
            $table->Text('Nom');
            $table->Text('Prenom');
            //$table->text ('Code_Apogee');
            $table->string('Numero');
            $table->string('Email');
            $table->Text('Type');
            $table->longtext('Description');
            $table->string('file_reclamation')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('reclamations');
    }
};