<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers_faqs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('faqs_id')->unsigned()->nullable();
            $table->foreign('faqs_id')->references('id')->on('faqs')->onDelete('cascade');

            $table->integer('answers_id')->unsigned()->nullable();
            $table->foreign('answers_id')->references('id')->on('answers')->onDelete('cascade');

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
        Schema::dropIfExists('answers_faqs');
    }
}
