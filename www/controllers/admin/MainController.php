<?php
/**
 * Created by PhpStorm.
 * User: amarz
 * Date: 16.11.2017
 * Time: 13:04
 */

namespace controllers\admin;

use core\Router;
use models\Test;

class MainController extends AppController
{
    public function indexAction()
    {
        $this->route['controller']='test';
        Router::$route['controller']='test';
        debug(Router::$route['controller']);
        debug($this->route['controller']);
        $test = new TestController($this->route);
        debug($test);
        $test->indexAction();
        // here test->setvars() has run from the indedx frunction,
        // but getView(); is called by another object ! which is Main controller !
        // even if we change the Router::$route var but the object has been made !
    }

    public function loginAction()
    {
        $this->view = 'login';
        $title = "Log in page..";
        $this->setVars(compact('title'));
    }

    public function logoutAction()
    {
        unset($_SESSION['USER']);
        $this->redirect('\admin');
    }


}
