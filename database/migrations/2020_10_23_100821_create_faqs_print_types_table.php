<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrintTypesFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs_print_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('print_types_id')->unsigned()->nullable();
            $table->foreign('print_types_id')->references('id')->on('print_types')->onDelete('cascade');

            $table->integer('faqs_id')->unsigned()->nullable();
            $table->foreign('faqs_id')->references('id')->on('faqs')->onDelete('cascade');

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
        Schema::dropIfExists('faqs_print_types');
    }
}
