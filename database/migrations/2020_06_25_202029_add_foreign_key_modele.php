<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyModele extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('modeles', function (Blueprint $table) {
            $table->integer('id_marque')->unsigned()->after('nom');
            $table->foreign('id_marque')->references('id')->on('marques');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('modeles', function (Blueprint $table) {
            //
        });
    }
}
