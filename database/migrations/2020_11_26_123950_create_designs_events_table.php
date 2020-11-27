<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignsEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designs_events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('designs_id')->unsigned()->nullable();
            $table->foreign('designs_id')->references('id')->on('designs')->onDelete('cascade');

            $table->integer('events_id')->unsigned()->nullable();
            $table->foreign('events_id')->references('id')->on('events')->onDelete('cascade');

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
        Schema::dropIfExists('designs_events');
    }
}
