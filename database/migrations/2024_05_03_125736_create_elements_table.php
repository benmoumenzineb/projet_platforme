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
        Schema::create('elements', function (Blueprint $table) {
            $table->text('Num_Element')->primary();
            $table->text('Intitule');
            $table->text('Description');
            $table->integer('Nbr_Hr_cours');
            $table->integer('Nbr_Hr_Td');
            $table->integer('Nbr_Hr_Tp');
            $table->integer('Nbr_Hr_Ap');
            $table->text('Num_Module');
            $table->foreign('Num_Module')->references('Num_Module')->on('modules');
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
        Schema::dropIfExists('elements');
    }
};
