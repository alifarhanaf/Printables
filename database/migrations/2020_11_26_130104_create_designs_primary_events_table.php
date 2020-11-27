<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignsPrimaryEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designs_primary_events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('designs_id')->unsigned()->nullable();
            $table->foreign('designs_id')->references('id')->on('designs')->onDelete('cascade');

            $table->integer('primary_events_id')->unsigned()->nullable();
            $table->foreign('primary_events_id')->references('id')->on('primary_events')->onDelete('cascade');

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
        Schema::dropIfExists('designs_primary_events');
    }
}
