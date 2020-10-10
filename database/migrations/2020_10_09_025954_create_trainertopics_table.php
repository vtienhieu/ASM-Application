<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainertopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainertopics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('TrainerID')->unsigned();
            $table->foreign('TrainerID')->references('id')->on('trainers')->onDelete('cascade');
            $table->integer('TopicID')->unsigned();
            $table->foreign('TopicID')->references('TopicId')->on('topics')->onDelete('cascade');
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
        Schema::dropIfExists('trainertopics');
    }
}
