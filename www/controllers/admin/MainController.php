<?php
/**
 * Created by PhpStorm.
 * User: amarz
 * Date: 16.11.2017
 * Time: 13:04
 */

namespace controllers\admin;

class MainController extends AppController
{
    public function indexAction()
    {
        $title = "Hello Admin..";
        $this->setVars(compact('title'));
    }

    public function testAction()
    {

        $this->view = 'test';
        $title = "Hello test..";
        $this->setVars(compact('title'));
    }

    public function logoutAction(){
        unset($_SESSION['USER']);
        $this->redirect('\admin');
    }
}