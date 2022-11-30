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
        Schema::create('tour', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('FK_combat_id')->unsigned()->index();
            $table->foreign('FK_combat_id')->references('combat_id')->on('combat');
            $table->bigInteger('FK_user_id')->unsigned()->index();
            $table->foreign('FK_user_id')->references('id')->on('users');
            $table->bigInteger('FK_pokemon_id')->unsigned()->index();
            $table->foreign('FK_pokemon_id')->references('pokemon_id')->on('pokemon');
            $table->integer('action');
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
        Schema::dropIfExists('tour');
    }
};
