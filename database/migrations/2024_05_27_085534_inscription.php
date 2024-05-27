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
    { DB::table('inscriptions')->update([
        'apogee' => DB::raw("CONCAT(SUBSTRING(num_annee, 3, 2), LPAD(FLOOR(RAND() * 999999), 6, '0'))")
    ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
