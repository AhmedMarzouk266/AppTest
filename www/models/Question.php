<?php
/**
 * Created by PhpStorm.
 * User: amarz
 * Date: 13.11.2017
 * Time: 12:44
 */

class Question extends Model
{
    public static $tableName = 'questions';
    protected $attributes = array(
        'title' => "",
        'sort' => 100,
        'test_id' => 1,
        'right_ans_id' => 1
    );
    public $answers = array();

    public function setAnswers()
    {
        $answers = Answer::findAll(['quest_id' => $this->id]);
        $this->answers = $answers;
    }

    // method here to process questions, all questions get by test_id
    public static function getNextQuestion($test_id,$method)
    {
        // function return back the next question that does not exist in the session IDs array.
        $questions = Question::findAll(['test_id' => $test_id]);

            if ($method == 'next') {
                foreach ($questions as $question) {
                    if (!in_array($question->id, $_SESSION['QUESTIONS'])) {
                        $question->setAnswers();

                        return $question;
                    }
                }
                return false;
            } elseif ($method == 'previous') {
                return Question::getPrevQuestion($test_id);
            }

        }


    public static function getPrevQuestion()
    {
        return self::findOneById($_SESSION['last_quest_id']);
    }


}