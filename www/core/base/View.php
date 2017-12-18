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
    public  $partialView;

    public function __construct($route,$view,$layout,$partialView){
        $this->route = $route ;
        $this->layout = $layout;
        $this->view = $view;
        $this->partialView = $partialView;
    }

    public function render($vars){
        $layoutFile = DIR_VIEW."/".$this->layout.".php" ;
        $layoutFile = str_replace("\\","/",$layoutFile);
       // $this->vars = $vars;
        extract($vars);
        //extract gives you vars in the back ground so you can use them in the view page.
        if($this->layout != false){
            if(file_exists($layoutFile)){ // check if layout not false
                ob_start();
                $view_name = DIR_VIEW."/".$this->route['prefix'].$this->route['controller']."/".$this->view.".php" ;
                $view_name = str_replace("\\","/",$view_name);
                require_once ($view_name);
                $content = ob_get_clean();
                if(!$this->partialView){
                    require_once($layoutFile);
                }else{
                    echo $content;
                }

            }else{
                echo "Failed to require the layout..";
            }
        }
    }
}