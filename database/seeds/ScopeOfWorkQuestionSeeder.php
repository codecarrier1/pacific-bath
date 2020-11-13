<?php

use App\JobSpecificationQuestion;
use Illuminate\Database\Seeder;

/**
 * Class ScopeOfWorkQuestionSeeder
 */
class ScopeOfWorkQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'question' => 'Plumbing',
                'order_column' => 1,
                'type' => JobSpecificationQuestion::F_TYPE_LONGTEXT,
                'question_type' => JobSpecificationQuestion::Q_TYPE_SCOPE_OF_WORK,
                'choices' => NULL,
                'allow_additional_comments' => 0,
                'help_text' => NULL,
            ],
            [
                'question' => 'Electrical',
                'order_column' => 1,
                'type' => JobSpecificationQuestion::F_TYPE_LONGTEXT,
                'question_type' => JobSpecificationQuestion::Q_TYPE_SCOPE_OF_WORK,
                'choices' => NULL,
                'allow_additional_comments' => 0,
                'help_text' => NULL,
            ],
            [
                'question' => 'Construction',
                'order_column' => 1,
                'type' => JobSpecificationQuestion::F_TYPE_LONGTEXT,
                'question_type' => JobSpecificationQuestion::Q_TYPE_SCOPE_OF_WORK,
                'choices' => NULL,
                'allow_additional_comments' => 0,
                'help_text' => NULL,
            ],
            [
                'question' => 'Floors',
                'order_column' => 1,
                'type' => JobSpecificationQuestion::F_TYPE_LONGTEXT,
                'question_type' => JobSpecificationQuestion::Q_TYPE_SCOPE_OF_WORK,
                'choices' => NULL,
                'allow_additional_comments' => 0,
                'help_text' => NULL,
            ],
            [
                'question' => 'Drywall Repair & Scarring',
                'order_column' => 1,
                'type' => JobSpecificationQuestion::F_TYPE_LONGTEXT,
                'question_type' => JobSpecificationQuestion::Q_TYPE_SCOPE_OF_WORK,
                'choices' => NULL,
                'allow_additional_comments' => 0,
                'help_text' => NULL,
            ],
            [
                'question' => 'Special Customer Request',
                'order_column' => 1,
                'type' => JobSpecificationQuestion::F_TYPE_LONGTEXT,
                'question_type' => JobSpecificationQuestion::Q_TYPE_SCOPE_OF_WORK,
                'choices' => NULL,
                'allow_additional_comments' => 0,
                'help_text' => NULL,
            ],
        ];

        JobSpecificationQuestion::insert($questions);
    }
}
