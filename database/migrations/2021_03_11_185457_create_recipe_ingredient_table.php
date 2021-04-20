<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipeIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_ingredient', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_recipe');
            $table->unsignedBigInteger('id_ingredient');
            $table->integer('quantity');
            $table->unsignedBigInteger('id_measure_unit');

            $table->foreign('id_recipe')->references('id')->on('recipes')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_ingredient')->references('id')->on('ingredients')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('id_measure_unit')->references('id')->on('measure_unit')->onUpdate('cascade')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_ingredient');
    }
}
