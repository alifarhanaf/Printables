<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brands_id')->unsigned()->nullable();
            $table->foreign('brands_id')->references('id')->on('brands')->onDelete('cascade');

            $table->integer('products_id')->unsigned()->nullable();
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');

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
        Schema::dropIfExists('brands_products');
    }
}
