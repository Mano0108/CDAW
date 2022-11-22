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
        Schema::create('pokemon_energy', function (Blueprint $table) {
            $table->bigInteger('FK_energy')->unsigned()->index();
            $table->foreign('FK_energy')->references('energy_id')->on('energy');
            $table->bigInteger('FK_pokemon')->unsigned()->index();
            $table->foreign('FK_pokemon')->references('pokemon_id')->on('pokemon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemon_energy');
    }
};
