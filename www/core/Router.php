<?php
/**
 * Date: 09.11.2017
 * Time: 13:19
 */
class Router
{

    public static $route = [ // route
        'controller' => 'Main',
        'action' => 'index'
    ];

    public static function dispatch($url)
    {
        $parseUrl = explode('/', trim($url, '/'));
        //print_r(self::$route);

        // check and redirect:
       if(sizeof($parseUrl)>0){
           if(!empty($parseUrl[0])){
               self::$route['controller'] = $parseUrl[0];
           }

           if(sizeof($parseUrl)>1){
           self::$route['action']     = $parseUrl[1];
           }
       }

       $nameController = self::$route['controller']."Controller";
       $controller     = new $nameController(self::$route);
       // new object (the class file called)
        // to the construct of the abstract controller

       $method = self::$route['action']."Action";

       if(method_exists($nameController,$method)){
           $controller->$method();
           $controller->getView();
       }else{
           echo "method does not exist..";
       }


    }
}// end of class

?>