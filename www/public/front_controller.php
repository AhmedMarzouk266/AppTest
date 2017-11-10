<?php

spl_autoload_register(function($classname){

    $classname = ucwords($classname);
    $path = ROOT."/controllers/{$classname}.php" ;
    if(file_exists($path)){
        require_once ($path);
    }else{
        die("the file {$classname}.php does not exist");
    }

});


require_once ('../core/Router.php');
require_once ('../core/functions.php');
require_once ('../core/view.php');

define('ROOT',$_SERVER["DOCUMENT_ROOT"]);
define('PUBLIC_PATH',$_SERVER["DOCUMENT_ROOT"]."/public");
define('DIR_VIEW',ROOT."/views");
define('LAYOUT_DEFAULT','layout');

$url = $_SERVER['REQUEST_URI'];
Router::dispatch($url);





?>