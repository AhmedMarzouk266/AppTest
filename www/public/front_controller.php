<?php


spl_autoload_register(function($classname){
// runs when you make a class
    $classname = ucwords($classname);

    if(file_exists(ROOT."/controllers/{$classname}.php")){
        require_once (ROOT."/controllers/{$classname}.php");
    }elseif(file_exists(ROOT."/core/{$classname}.php")){
        require_once (ROOT."/core/{$classname}.php");
    }elseif(file_exists(ROOT."/models/{$classname}.php")){
        require_once (ROOT."/models/{$classname}.php");
    }

});

// sessions
session_start();


require_once ('../core/functions.php');

define('ROOT',$_SERVER["DOCUMENT_ROOT"]);
define('PUBLIC_PATH',$_SERVER["DOCUMENT_ROOT"]."/public");
define('DIR_VIEW',ROOT."/views");
define('LAYOUT_DEFAULT','layout');
define('DIR_IMAGES',ROOT."/public/images");

$url = $_SERVER['REQUEST_URI'];
Router::dispatch($url);





?>