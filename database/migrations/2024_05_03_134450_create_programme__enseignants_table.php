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
        Schema::create('programme__enseignants', function (Blueprint $table) {
            $table->text('Num_Element');
            $table->text('CIN_Enseignant');
             $table->timestamps();
             $table->foreign('Num_Element')->references('Num_Element')->on('elements');
             $table->foreign('CIN_Enseignant')->references('CIN_Enseignant')->on('enseignants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programme__enseignants');
    }
};
