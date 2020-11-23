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
            $table->string('frontSuggestion')->nullable();
            $table->string('backSuggestion')->nullable();
            $table->string('pocketSuggestion')->nullable();
            $table->string('sleevesSuggestion')->nullable();
            $table->string('frontColors')->nullable();
            $table->string('backColors')->nullable();
            $table->string('pocketColors')->nullable();
            $table->string('sleevesColors')->nullable();
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
