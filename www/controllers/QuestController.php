<?php
/**
 * Created by PhpStorm.
 * User: amarz
 * Date: 10.11.2017
 * Time: 11:05
 */

class QuestController extends Controller
{
    public function  indexAction(){
        $this->vars  = array(
            'quest5' => ' Question 5',
            'quest6' => ' Question 6',
            'quest7' => ' Question 7',
            'quest8' => ' Question 8'
        );
    }
}