<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignsOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designs_organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('designs_id')->unsigned()->nullable();
            $table->foreign('designs_id')->references('id')->on('designs')->onDelete('cascade');

            $table->integer('organizations_id')->unsigned()->nullable();
            $table->foreign('organizations_id')->references('id')->on('organizations')->onDelete('cascade');

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
        Schema::dropIfExists('designs_organizations');
    }
}
