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
        Schema::create('seances', function (Blueprint $table) {
            $table->text('Num_Seance')->primary();
            $table->text('Num_Element');
            $table->text('Id_Groupe');
            $table->date('Date');
            $table->time('Heure_Debut');
            $table->text('Objectif');
            $table->time('Heure_Fin');
            $table->text('Activites');
            $table->timestamps();
            $table->foreign('Num_Element')->references('Num_Element')->on('elements');
            $table->foreign('Id_Groupe')->references('Id_Groupe')->on('groupes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seances');
    }
};
