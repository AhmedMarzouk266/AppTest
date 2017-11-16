<?php
/**
 * Created by PhpStorm.
 * User: amarz
 * Date: 16.11.2017
 * Time: 12:56
 */

namespace controllers\admin;

use core\base\Controller;

abstract class AppController extends Controller
{
    protected $isAdmin = false;

    public function __construct($route)
    {
        $adminData = require_once ROOT . "/config/config.php";

        parent::__construct($route);
        $this->layout = LAYOUT_ADMIN_DEFAULT;
        if(!$this->checkLogin($adminData)){
            if($route['controller']=='Main' && $route['action']=='index'){
                return;
            }
            $this->redirect("/admin");
        }

    }

    public function checkLogin($adminData)
    {
        if (isset($_SESSION['USER'])) {
            return true;
        } else {
            if ($_POST['userName'] == $adminData['user'] && $_POST['password'] == $adminData['pass']) {
                $_SESSION['USER'] = $_POST['userName'];
                $this->isAdmin = true;
                return true;
            } else {
                return false;
            }
        }

    }



}