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
        $item->id = 30;
        $item->quest = "TEST 10 ?";
        $item->sort  = 50 ;
        // $item->save()? 'true' : 'false' ;


        $item2 = new Question();
        $item2->quest = "GOOD ?";
        $item2->sort = 5;
        $item2->st = 5;
        //$item2->save();




        $questions = Question::findAll();
        $question  = Question::findOneById(1);

        $this->setVars($questions);

    }

}