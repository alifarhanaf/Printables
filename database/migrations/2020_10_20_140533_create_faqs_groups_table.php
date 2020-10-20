<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('groups_id')->unsigned()->nullable();
            $table->foreign('groups_id')->references('id')->on('groups')->onDelete('cascade');

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
        Schema::dropIfExists('faqs_groups');
    }
}
