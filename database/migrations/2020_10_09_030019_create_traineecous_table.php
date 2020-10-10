<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraineecousTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traineecous', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('TraineeID')->unsigned();
            $table->foreign('TraineeID')->references('id')->on('trainees')->onDelete('cascade');
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
        Schema::dropIfExists('traineecous');
    }
}
