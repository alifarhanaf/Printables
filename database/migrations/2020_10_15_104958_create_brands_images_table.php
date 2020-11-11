<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brands_id')->unsigned()->nullable();
            $table->foreign('brands_id')->references('id')->on('brands')->onDelete('cascade');
            $table->integer('images_id')->unsigned()->nullable();
            $table->foreign('images_id')->references('id')->on('images')->onDelete('cascade');

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
        Schema::dropIfExists('brands_images');
    }
}
