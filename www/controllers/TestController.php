<?php
/**
 * Created by PhpStorm.
 * User: amarz
 * Date: 14.11.2017
 * Time: 13:16
 */

class TestController extends Controller
{
    public function indexAction()
    {
        $title = "list of tests";
        $tests = Test::findAll();
        $this->setVars(compact('title', 'tests'));
    }

    public function questionsAction()
    {
        $test_id = 0;
        if (isset ($_GET['test_id'])) {
            $test_id = $_GET['test_id'];
        }

        // if we don not have questions in sessions so new array
        if (!isset($_SESSION['QUESTIONS'])) {
            $_SESSION['QUESTIONS'] = [];
        }


        // show answer and question id !
        if(isset($_POST['submit'])){
            if(isset($_POST['answer'])){
                echo "   Answer ID =".$_POST['answer'];
            }if(isset($_POST['quest_id'])){
                echo "   QUESTION ID =".$_POST['quest_id'];
            }
        }else{
            echo "Not submitted";
        }




        $method = isset($_GET['method']) ? $_GET['method'] : 'next';
        $question = Question::getNextQuestion($test_id, $method);
        if ($question === false) {
            $this->success();
            return; // not to complete code.
        }
        $answers = $question->answers;
        $right_ans = $question->right_ans_id;
        $_SESSION['QUESTIONS'][] = $question->id;

        $this->setVars(compact('question', 'answers'));

    }

    protected function success()
    {
        $this->view = 'success';
        unset( $_SESSION['QUESTIONS']);
    }



}