<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsSuggestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns_suggestions', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('campaigns_id')->unsigned()->nullable();
        $table->foreign('campaigns_id')->references('id')->on('campaigns')->onDelete('cascade');
        $table->integer('suggestions_id')->unsigned()->nullable();
        $table->foreign('suggestions_id')->references('id')->on('suggestions')->onDelete('cascade');
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
        Schema::dropIfExists('campaigns_suggestions');
    }
}
