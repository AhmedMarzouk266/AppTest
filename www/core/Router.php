<?php
/**
 * Date: 09.11.2017
 * Time: 13:19
 */
class Router
{
    public static $route = [ // route
        'controller' => 'Main',
        'action' => 'index',
    ];

    public static function dispatch($url)
    {
        $url      = preg_replace('~[&?]~','/',$url);
        $parseUrl = explode('/', trim($url, '/'));




       // debug($parseUrl,true);

        // check and redirect:
       if(sizeof($parseUrl)>0){
           if(!empty($parseUrl[0])){
               self::$route['controller'] = $parseUrl[0];
           }
           if(sizeof($parseUrl)>1){
               self::$route['action']     = $parseUrl[1];
           }
       }


       self::setNameControllerAction();

       $nameController = self::$route['controller']."Controller";
       if(class_exists($nameController)){
           $controller = new $nameController(self::$route);
           // new object (the class file called)
           // to the construct of the abstract controller
       }else{
           echo "Class does not exist..<br/>";
           die();
       }

       $method = self::$route['action']."Action";

       if(method_exists($nameController,$method)){
           $controller->$method();
           $controller->getView();
       }else{
           echo "method does not exist..";
           die();
       }
    }

    public static function setNameControllerAction(){
        $edited_controller = ucwords(self::$route['controller'],'-');
        self::$route['controller'] = str_replace('-','',$edited_controller);

        $edited_action = ucwords(self::$route['action'],'-');
        $edited_action[0]= strtolower($edited_action[0]);
        self::$route['action'] = str_replace('-','',$edited_action);

    }
}

?>