<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('choice_id')->unsigned()->nullable();
            $table->integer('choice_question_id')->unsigned()->nullable();
            $table->boolean('reponse');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('choice_id')->references('id')->on('choices')->onDelete('cascade');
            $table->foreign('choice_question_id')->references('question_id')->on('choices')->onDelete('cascade');
            # $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('responses');
    }
}
