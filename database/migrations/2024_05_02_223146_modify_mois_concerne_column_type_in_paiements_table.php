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
        Schema::table('paiements', function (Blueprint $table) {
            // Modifier le type de colonne mois_concerne en JSON
            $table->json('mois_concerne')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('paiements', function (Blueprint $table) {
            // Revenir au type de colonne d'origine si nécessaire
            $table->text('mois_concerne')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    
};
