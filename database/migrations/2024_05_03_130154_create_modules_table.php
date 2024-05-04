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
        Schema::create('modules', function (Blueprint $table) {
            $table->text('Num_Module')->primary();
            $table->text('Intitule');
            $table->integer('Nbr_Hr_Total');
            $table->boolen('Avoir-Elements');
            $table->text('CIN_Responsable');
            $table->foreign('CIN_Responsable')->references('CIN_Enseignant')->on('personnels');
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
        Schema::dropIfExists('modules');
    }
};
