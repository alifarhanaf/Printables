<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('groups_id')->unsigned()->nullable();
            $table->foreign('groups_id')->references('id')->on('groups')->onDelete('cascade');

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
        Schema::dropIfExists('groups_products');
    }
}
