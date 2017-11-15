<?php

    function debug($var,$die = false){
        echo "<pre>";
            var_dump($var);
        echo "</pre>";
        if($die){
            die();
        }
    }

    function redirect_to($location){
        header("location: ".$location);
    }


?>