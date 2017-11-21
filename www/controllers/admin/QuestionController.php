<?php
/**
 * Created by PhpStorm.
 * User: amarz
 * Date: 20.11.2017
 * Time: 12:41
 */

namespace controllers\admin;


use models\Answer;
use models\Question;
use models\Test;

class QuestionController extends AppController
{
    public function indexAction(){
        // give data for a list of all questions.
        $quest_title="";
        $title= 'List of Questions';
        if(!empty($_GET['test_id'])){
            // i came from a test link not general so :
            $_SESSION['test_id'] = $_GET['test_id'];
            $questions = Question::findAll(['test_id'=>$_GET['test_id']]);
            $test = Test::findOneById($_GET['test_id']);
            $quest_title = $test->title;
        }else{
            // i came from general link
            $questions = Question::findAll();
            unset( $_SESSION['test_id']);
        }
        $this->setVars(compact('questions','title','quest_title'));
    }

    public function editAction(){
// validation is needed !
        $this->view ='form';
        $id       = $_GET['id'];
        $question = Question::findOneById($id);
        $tests    = Test::findAll();
        $answers  = Answer::findAll();
        $action = "/admin/question/edit?id= ". $question->id ;
        $this->setVars(compact('question','tests','answers','action'));

        if(!empty($_POST)){
            $question = Question::findOneById($id);
            // through load function would be better.

            $question->load($_POST);
            $question->save();
            $this->redirect('\admin\question\index?test_id='.$_SESSION['test_id']);
        }
    }


    public function addAction()
    {
// validation is needed !
        $this->view ='form';
        $tests    = Test::findAll();
        $answers  = Answer::findAll();
        $action = "/admin/question/add";
        $this->setVars(compact('tests','answers','action'));
        if(!empty($_POST)){
            $question = new Question();
            $question->load($_POST);
            $question->save();
            $this->redirect('\admin\question\index?test_id='.$_SESSION['test_id']);
        }
    }


    public function deleteAction(){
        if (isset($_GET['id'])) {
            Question::deleteById($_GET['id']);
            $this->redirect("\admin\question");
        }
    }

}