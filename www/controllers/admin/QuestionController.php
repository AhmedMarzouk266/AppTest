<?php
/**
 * Created by PhpStorm.
 * User: amarz
 * Date: 20.11.2017
 * Time: 12:41
 */

namespace controllers\admin;


use models\Question;
use models\Test;

class QuestionController extends AppController
{
    public function indexAction(){
        // give data for a list of all questions.
        $title= 'List of Questions';
        $questions = Question::findAll();
        $this->setVars(compact('questions','title'));
    }

    public function editAction(){
// validation is needed !
        $this->view ='form';
        $id       = $_GET['id'];
        $question = Question::findOneById($id);
        $tests    = Test::findAll();
        $this->setVars(compact('question','tests'));

        if(!empty($_POST)){
            $question = Question::findOneById($id);
            // through load function would be better.

            $question->load($_POST);
            $question->save();
            $this->redirect('\admin\question');
        }
    }


    public function addAction()
    {
// validation is needed !
        $this->view ='form';
        $tests    = Test::findAll();
        $this->setVars(compact('tests'));
        if(!empty($_POST)){
            $question = new Question();
            $question->load($_POST);
            $question->save();
            $this->redirect('\admin\question');
        }
    }


    public function deleteAction(){
        if (isset($_GET['id'])) {
            Question::deleteById($_GET['id']);
            $this->redirect("\admin\question");
        }
    }

}