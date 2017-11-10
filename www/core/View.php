<?php
/**
 * Created by PhpStorm.
 * User: amarz
 * Date: 10.11.2017
 * Time: 9:47
 */

class View
{
    private $route =[];
    public  $layout;
    public  $view ;
    public  $vars=[];

    public function __construct($route,$view){
        $this->route = $route ;
        $this->layout = LAYOUT_DEFAULT;
        $this->view = $view;
    }

    public function render($vars){ // $vars[] also recieved
        $layoutFile = DIR_VIEW."/".$this->layout.".php" ;
       // $this->vars = $vars;
        extract($vars);
        if(file_exists($layoutFile)){
            ob_start();
            require_once (DIR_VIEW."/".$this->route['controller']."/".$this->view.".php");
            $content = ob_get_clean();
            require_once($layoutFile);
        }else{
            echo "Failed to require the layout..";
        }
    }
}