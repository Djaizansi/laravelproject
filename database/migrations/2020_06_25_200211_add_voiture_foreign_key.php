<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVoitureForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('voiture', function (Blueprint $table) {
            $table->foreign('id_marque')->references('id')->on('marques');
            $table->foreign('id_modele')->references('id')->on('modeles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('voiture', function (Blueprint $table) {
            //
        });
    }
}
