<?php
/**
 * Created by PhpStorm.
 * User: amarz
 * Date: 17.11.2017
 * Time: 11:38
 */

namespace controllers\admin;


use models\Question;
use models\Test;

class TestController extends AppController
{

    public function indexAction(){
        // now we want to show out all the tests:
        $title = "list of tests";
        $tests = Test::findAll();
        $this->setVars(compact('title', 'tests'));
    }


    public function deleteAction(){
        if (isset($_GET['test_id'])) {
            Test::deleteById($_GET['test_id']);
            $this->redirect("\admin");
        }
    }

    public function editAction(){
        $test_id = $_GET['test_id'];
        $test = Test::findOneById($test_id);
        $questions = Question::findAll(['test_id' => $test_id]);
        $this->setVars(compact('test','questions'));
    }
}