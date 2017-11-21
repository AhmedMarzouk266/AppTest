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
            $data   = $_POST;
            // to image tools
            if(!empty($_FILES['images'])){
                $ansImage    = new ImageTools();
                $target_file = $ansImage->saveImageFromPost();
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
        $this->setVars(compact('questions'));
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
            Answer::deleteById($_GET['id']);
            $this->redirect("\admin\answer");
        }
    }


}