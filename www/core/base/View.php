<?php
/**
 * Created by PhpStorm.
 * User: amarz
 * Date: 10.11.2017
 * Time: 9:47
 */
namespace core\base;
class View
{
    private $route =[];
    public  $layout;
    public  $view ;
    public  $vars=[];

    public function __construct($route,$view,$layout){
        $this->route = $route ;
        $this->layout = $layout;
        $this->view = $view;
    }

    public function render($vars){
        $layoutFile = DIR_VIEW."/".$this->layout.".php" ;
       // $this->vars = $vars;
        extract($vars);
        //extract gives you vars in the back ground so you can use them
        if(file_exists($layoutFile)){
            ob_start();
            require_once (DIR_VIEW."/".$this->route['prefix'].$this->route['controller']."//".$this->view.".php");
            $content = ob_get_clean();
            require_once($layoutFile);


        }else{
            echo "Failed to require the layout..";
        }
    }
}