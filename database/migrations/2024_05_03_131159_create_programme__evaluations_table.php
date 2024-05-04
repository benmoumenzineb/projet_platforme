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
        Schema::create('programme__evaluations', function (Blueprint $table) {
            $table->text('Num_Element');
            $table->text('Code_Filiere');
            $table->date('Date_Exam');
           $table->time('Hr_Exam');
           $table->date('Date_Ratt');
           $table->time('Hr_Ratt');
            $table->timestamps();
            $table->foreign('Num_Element')->references('Num_Element')->on('elements');
            $table->foreign('Code_Filiere')->references('Code_Filiere')->on('filiers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programme__evaluations');
    }
};
