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
        Schema::create('absences', function (Blueprint $table) {
            $table->id();// $table->text('Code_Apogee');
            $table->text('Num_Element');
            $table->date('Date_Abs');
            $table->time('Heure_Abs');
            $table->timestamps();
            $table->foreign('Num_Element')->references('Num_Element')->on('elements');
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
        Schema::dropIfExists('absences');
    }
};
