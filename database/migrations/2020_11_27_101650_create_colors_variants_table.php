<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorsVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colors_variants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('variants_id')->unsigned()->nullable();
            $table->foreign('variants_id')->references('id')->on('variants')->onDelete('cascade');
            $table->integer('colors_id')->unsigned()->nullable();
            $table->foreign('colors_id')->references('id')->on('colors')->onDelete('cascade');
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
        Schema::dropIfExists('colors_variants');
    }
}
