<?php


use core\Router;

spl_autoload_register(function($classname){
// runs when you make a class
    //$classname = ucwords($classname);
    if(file_exists(ROOT."/{$classname}.php")){
        require_once (ROOT."/{$classname}.php");
    }
});

// sessions
session_start();


require_once ('../core/functions.php');

define('ROOT',$_SERVER["DOCUMENT_ROOT"]);
define('PUBLIC_PATH',$_SERVER["DOCUMENT_ROOT"]."/public");
define('DIR_VIEW',ROOT."/views");
define('LAYOUT_DEFAULT','layout');
define('LAYOUT_ADMIN_DEFAULT','layoutAdmin');
define('DIR_IMAGES',ROOT."/public/images");
define('DIR_IMAGES_DATA',ROOT."/public/images/data");

$url = $_SERVER['REQUEST_URI'];
Router::dispatch($url);






?>