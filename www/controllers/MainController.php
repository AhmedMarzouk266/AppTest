<?php
/**
 * Created by PhpStorm.
 * User: amarz
 * Date: 09.11.2017
 * Time: 15:36
 */

class MainController extends Controller
{

    public function indexAction(){
        //$this->view = 'test';



        $data = array(
            'id' => 4,
            'quest'=> 'What do you want ?',
            'sort' =>'10'
        );


        $item = new Question();

        $item->quest = 'No ??';
        $item->sort  = 100;

        Question::save($data);

        $questions = Question::findAll();




        $question = Question::findOneById(1);

        $this->setVars($questions);

    }

}