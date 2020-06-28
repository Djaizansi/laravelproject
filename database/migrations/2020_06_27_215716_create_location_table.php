<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->float('prix');
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_voiture')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_voiture')->references('id')->on('voiture');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
