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
        Schema::create('personnel__etablissements', function (Blueprint $table) {
            $table->text('Code_Etabli');
            $table->text('CIN_salarie');
            $table->text('Service');
            $table->text('Type_Contrat');
            $table->date('Date_Debut');
            $table->date('Date_Fin');
            $table->timestamps();
            $table->foreign('Code_Etabli')->references('Code_Etabli')->on('etablissements');
            $table->foreign('CIN_salarie')->references('CIN_salarie')->on('personnels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnel__etablissements');
    }
};
