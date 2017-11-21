<?php
/**
 * Created by PhpStorm.
 * User: amarz
 * Date: 20.11.2017
 * Time: 12:50
 */

namespace controllers\admin;


use core\ImageTools;
use models\Answer;
use models\Question;

class AnswerController extends AppController
{
    public function indexAction(){
        $title= 'List of Answers';
        $quest_title ="";
        if(isset($_SESSION['quest_id'])){
            $answers  = Answer::findAll(['quest_id' => $_SESSION['quest_id']]);
            $question = Question::findOneById($_SESSION['quest_id']);
            $quest_title= $question->title;
            if(empty($_GET['quest_id'])){
                unset($_SESSION['quest_id']);
            }
        }else{
            $answers = Answer::findAll();
        }
        $this->setVars(compact('answers','title','quest_title'));
    }

    public function editAction(){
// validation is needed !
        $this->view ='form';
        $id       = $_GET['id'];
        $answer = Answer::findOneById($id);
        $questions = Question::findAll();
        $action = "/admin/answer/edit?id= ". $answer->id ;
        $src = $answer->images;
        $this->setVars(compact('answer','questions','action','src'));

        if(!empty($_POST)){
            $answer = Answer::findOneById($id);
            $data   = $_POST;
            $ansImage    = new ImageTools();
            $target_file = $ansImage->saveImageFromPost();
            if($target_file){
                $data['images'] = IMAGE_DATA_PATH."/".$target_file;
            }else{
                $data['images'] = $answer->images;
            }
            $answer->load($data);
            $answer->save();
            $this->redirect('\admin\answer');
        }
    }


    public function addAction()
    {
        $this->view ='form';
        $questions = Question::findAll();
        $action = "/admin/answer/add";
        $src = "../../public/images/data/NoImage.png";
        $this->setVars(compact('questions','action','src'));
// validation is needed !
        if(!empty($_POST)){
            $answer = new Answer();
            $data   = $_POST;
            $ansImage    = new ImageTools();
            $target_file = $ansImage->saveImageFromPost();
            $data['images'] = IMAGE_DATA_PATH."/".$target_file;

            $answer->load($data);
            $answer->save();
            $this->redirect('\admin\answer');
        }
    }


    public function deleteAction(){
        if (isset($_GET['id'])) {
            $answer = Answer::findOneById($_GET['id']);
            $imageFile =PUBLIC_PATH.$answer->images ;
            if(file_exists($imageFile)){
                unlink($imageFile);
            }
            $answer->deleteByObjectId();
            $this->redirect("\admin\answer");
        }
    }


}