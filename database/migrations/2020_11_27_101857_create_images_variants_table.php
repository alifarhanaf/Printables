<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_variants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('variants_id')->unsigned()->nullable();
            $table->foreign('variants_id')->references('id')->on('variants')->onDelete('cascade');
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
        Schema::dropIfExists('images_variants');
    }
}
