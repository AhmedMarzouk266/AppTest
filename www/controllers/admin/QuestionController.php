<?php
/**
 * Created by PhpStorm.
 * User: amarz
 * Date: 20.11.2017
 * Time: 12:41
 */
// TODO : after editing or adding or deleting an element there should be update position function !
// todo : the question should have add answer option also not only the choosen one.
namespace controllers\admin;


use models\Answer;
use models\Question;
use models\Test;

class QuestionController extends AppController
{
    public function indexAction(){
        // give data for a list of all questions.
        $this->partialView = false;
        if(isset($_GET['partView'])){
            $this->view ='partView';
            $this->partialView = true;
        }
        $quest_title="";
        $title= 'List of Questions';
        if(!empty($_GET['test_id'])){
            // i came from a test link not general so :
            $_SESSION['test_id'] = $_GET['test_id'];
            $questions = Question::findAll(['test_id'=>$_GET['test_id']]);
            $test      = Test::findOneById($_GET['test_id']);
            $tests     = Test::findAll();
            $answers   = Answer::findAll();
            $quest_title = $test->title;
        }else{
            // i came from general link
            $questions = Question::findAll();
            $tests     = Test::findAll();
            $answers   = Answer::findAll();
            unset( $_SESSION['test_id']);
        }
        $this->setVars(compact('questions','title','quest_title','tests','answers','test'));
    }

    public function editAction(){
// validation is needed !
        $this->view ='form';
        if(isset($_GET['id'])){
            $id         = $_GET['id'];
            $question   = Question::findOneById($id);
        }
        if(isset($_GET['idSort'])){
            $idSort     = (int)$_GET['idSort'];
            $idNextSort = (int)$_GET['idNextSort'];
            $question1 = Question::findOneById($idSort);
            $question2 = Question::findOneById($idNextSort);
            //replace them:
            $temp = $question1->sort ;
            $question1->sort = $question2->sort;
            $question2->sort = $temp;
            $question1->save();
            $question2->save();
        }
        $tests      = Test::findAll();
        $answers    = Answer::findAll();
        $questions   = Question::findAll(['test_id'=>$question->test_id]);
        $action     = "/admin/question/edit?id= ". $question->id ;
        $this->setVars(compact('question','tests','answers','action','questions'));

        if(!empty($_POST)){
            $question = Question::findOneById($id);
            // through load function would be better.
            $question->load($_POST);
            $question->save();
            $question->updatePosition($question->sort,'updatedQuestion');
            $this->redirect('\admin\question\index?test_id='.$_SESSION['test_id']);
        }


    }


    public function addAction()
    {
// validation is needed !
        $this->view ='form';
        $tests    = Test::findAll();
        $answers  = Answer::findAll();
        $questions = Question::findAll(['test_id'=>$_SESSION['test_id']]);
        $action = "/admin/question/add";
        $this->setVars(compact('tests','answers','action','questions'));
        if(!empty($_POST)){
            $question = new Question();
            $question->load($_POST);
            $question->updatePosition($question->sort,'newQuestion');
            $question->save();
            $this->redirect('\admin\question\index?test_id='.$_SESSION['test_id']);
        }
    }


    public function deleteAction(){
        if (isset($_GET['id'])) {
            $question = Question::findOneById($_GET['id']);
            $question->updatePosition($question->sort,'deletedQuestion');
            Question::deleteById($_GET['id']);
            $this->redirect('\admin\question\index?test_id='.$_SESSION['test_id']);
        }
    }


}

