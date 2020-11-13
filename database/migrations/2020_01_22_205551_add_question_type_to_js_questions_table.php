<?php

use App\JobSpecificationQuestion;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQuestionTypeToJsQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('js_questions', function (Blueprint $table) {
            $table->string('question_type')->default(JobSpecificationQuestion::Q_TYPE_SPECIFICATION);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('js_questions', function (Blueprint $table) {
            $table->dropColumn('question_type');
        });
    }
}
