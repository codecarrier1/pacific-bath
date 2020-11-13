<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobSpecificationQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('js_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('question');
            $table->integer('order_column')->unsigned();
            $table->enum('type', ['yesno-choice', 'multiple-choice', 'text-field', 'long-text-field']);
            $table->json('choices')->nullable();
            $table->boolean('allow_additional_comments')->default(0);
            $table->string('help_text')->nullable();
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
        Schema::dropIfExists('job_specification_questions');
    }
}
