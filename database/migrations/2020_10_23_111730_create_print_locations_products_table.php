<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrintLocationsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('print_locations_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('products_id')->unsigned()->nullable();
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('print_locations_products');
    }
}
