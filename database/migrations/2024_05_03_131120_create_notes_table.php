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
        Schema::create('notes', function (Blueprint $table) {
            $table->text('Num_Element');
           // $table->text('Code_Apogee');
           $table->text('Note_Exam');
           $table->text('Note_Ratt');
           $table->text('Note_Ctrl1');
           $table->text('Note_Ctrl2');
           $table->text('Note_Ctrl_Tp');
           $table->text('Note_PFE');
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
        Schema::dropIfExists('notes');
    }
};
