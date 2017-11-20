<?php
/**
 * Created by PhpStorm.
 * User: amarz
 * Date: 20.11.2017
 * Time: 12:50
 */

namespace controllers\admin;


use models\Answer;
use models\Question;

class AnswerController extends AppController
{
    public function indexAction(){
        $title= 'List of Answers';
        $answers = Answer::findAll();
        $this->setVars(compact('answers','title'));
    }

    public function editAction(){
// validation is needed !
        $this->view ='form';
        $id       = $_GET['id'];
        $answer = Answer::findOneById($id);
        $questions = Question::findAll();
        $this->setVars(compact('answer','questions'));

        if(!empty($_POST)){
            $answer = Answer::findOneById($id);
            $data = $_POST;

            $tmp_name = $_FILES['images']['tmp_name'];
            $target_file = basename($_FILES['images']['name']);
            $upload_dir  = DIR_IMAGES."/data/".$target_file;
            move_uploaded_file($tmp_name,$upload_dir);

            $data['images'] = "/images/data/".$target_file;
            $answer->load($data);
            $answer->save();
            $this->redirect('\admin\answer');
        }
    }


    public function addAction()
    {
        $this->view ='form';
        $questions = Question::findAll();
        $this->setVars(compact('questions'));
// validation is needed !
        if(!empty($_POST)){
            $answer = new Answer();
            $answer->load($_POST);
            $answer->save();
            $this->redirect('\admin\answer');
        }
    }


    public function deleteAction(){
        if (isset($_GET['id'])) {
            Answer::deleteById($_GET['id']);
            $this->redirect("\admin\answer");
        }
    }


}