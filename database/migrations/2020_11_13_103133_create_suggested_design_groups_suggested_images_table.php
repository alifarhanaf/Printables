<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuggestedDesignGroupsSuggestedImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggested_design_groups_suggested_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('suggested_images_id')->unsigned()->nullable();
            $table->foreign('suggested_images_id')->references('id')->on('suggested_images')->onDelete('cascade');
            $table->integer('suggested_design_groups_id')->unsigned()->nullable();
            $table->foreign('suggested_design_groups_id')->references('id')->on('suggested_design_groups')->onDelete('cascade');
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
        Schema::dropIfExists('suggested_design_groups_suggested_images');
    }
}
