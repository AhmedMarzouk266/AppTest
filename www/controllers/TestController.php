<?php
/**
 * Created by PhpStorm.
 * User: amarz
 * Date: 14.11.2017
 * Time: 13:16
 */

class TestController extends Controller
{
    public function indexAction(){
        $title ="list of tests";
        $tests = Test::findAll();
        $this->setVars(compact('title','tests'));
    }

    public function questionsAction(){
        // outputs all questions of a special test
        $test_id = 0 ;
        if(isset ($_GET['test_id'])) {
            $test_id = $_GET['test_id'];
        }
        $questions = Question::findAll(['test_id'=>$test_id]);
        $this->setVars(compact('questions'));
    }
}