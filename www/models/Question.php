<?php
/**
 * Created by PhpStorm.
 * User: amarz
 * Date: 13.11.2017
 * Time: 12:44
 */

class Question extends Model
{
    public static $tableName  = 'questions';
    protected $attributes = array(
        'quest' => "",
        'sort' => 100
    );

}