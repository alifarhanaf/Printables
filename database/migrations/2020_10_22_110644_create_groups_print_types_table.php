<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsPrintTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups_print_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('groups_id')->unsigned()->nullable();
            $table->foreign('groups_id')->references('id')->on('groups')->onDelete('cascade');

            $table->integer('print_types_id')->unsigned()->nullable();
            $table->foreign('print_types_id')->references('id')->on('print_types')->onDelete('cascade');

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
        Schema::dropIfExists('groups_print_types');
    }
}
