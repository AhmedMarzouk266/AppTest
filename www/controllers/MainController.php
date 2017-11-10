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

        $this->setVars([
            'quest' => "what is your name ?",
            'answer' => " Ahmed..",
        ]);

//        $db = DB::getInstance();
//        debug($db);

    }

}