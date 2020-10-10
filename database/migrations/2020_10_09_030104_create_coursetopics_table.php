<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursetopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coursetopics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('TopicID')->unsigned();
            $table->foreign('TopicID')->references('TopicId')->on('topics')->onDelete('cascade');
            $table->integer('CourceID')->unsigned();
            $table->foreign('CourceID')->references('id')->on('cources')->onDelete('cascade');
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
        Schema::dropIfExists('coursetopics');
    }
}
