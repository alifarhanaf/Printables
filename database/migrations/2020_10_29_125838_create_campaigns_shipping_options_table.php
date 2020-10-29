<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsShippingOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns_shipping_options', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('campaigns_id')->unsigned()->nullable();
        $table->foreign('campaigns_id')->references('id')->on('campaigns')->onDelete('cascade');
        $table->integer('shipping_options_id')->unsigned()->nullable();
        $table->foreign('shipping_options_id')->references('id')->on('shipping_options')->onDelete('cascade');
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
        Schema::dropIfExists('campaigns_shipping_options');
    }
}
