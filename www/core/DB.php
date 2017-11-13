<?php
/**
 * Created by PhpStorm.
 * User: amarz
 * Date: 10.11.2017
 * Time: 16:22
 */

class DB
{
    protected static $instance ; // where it saves object
    public $pdo ;

    protected function __construct()
    {
        //Thou shalt not construct that which is unconstructable!
        // from config array. open connection PDO

    }

    protected function __clone()
    {
        //Me not like clones! Me smash clones!
    }

    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
    }

}

