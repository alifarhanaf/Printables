<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuggestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggestions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('frontSuggestion');
            $table->string('backSuggestion');
            $table->string('pocketSuggestion');
            $table->string('sleevesSuggestion');
            $table->string('frontColors');
            $table->string('backColors');
            $table->string('pocketColors');
            $table->string('sleevesColors');
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
        Schema::dropIfExists('suggestions');
    }
}
