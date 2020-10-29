<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CampaignsPrintLocations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns_print_locations', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('campaigns_id')->unsigned()->nullable();
        $table->foreign('campaigns_id')->references('id')->on('campaigns')->onDelete('cascade');
        $table->integer('print_locations_id')->unsigned()->nullable();
        $table->foreign('print_locations_id')->references('id')->on('print_locations')->onDelete('cascade');
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
        Schema::dropIfExists('campaigns_print_locations');
    }
}
