<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscoveryQuestionChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discovery_question_choices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('choice');
            $table->integer('order_column')->unsigned();
            $table->unsignedBigInteger('discovery_question_id');
            $table->foreign('discovery_question_id')->references('id')->on('discovery_questions');
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
        Schema::dropIfExists('discovery_question_choices');
    }
}
