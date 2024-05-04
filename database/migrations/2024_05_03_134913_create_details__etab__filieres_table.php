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
        Schema::create('details__etab__filieres', function (Blueprint $table) {
            $table->text('Code_Filiere');
            $table->text('Code_Etabli');
            $table->timestamps();
            $table->foreign('Code_Filiere')->references('Code_Filiere')->on('filieres');
            $table->foreign('Code_Etabli')->references('Code_Etabli')->on('etablissements'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details__etab__filieres');
    }
};
