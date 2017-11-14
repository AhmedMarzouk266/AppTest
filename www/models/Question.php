<?php
/**
 * Created by PhpStorm.
 * User: amarz
 * Date: 13.11.2017
 * Time: 12:44
 */

class Question extends Model
{
    public static $tableName  = 'questions';
    protected $attributes = array(
        'title' => "",
        'sort' => 100,
        'test_id' => 1,
        'right_ans_id' => 1
    );
    public $answers = array();

    public function setAnswers(){
        $answers = Answer::findAll(['quest_id'=>$this->id]);
        debug($answers,true);
    }

}