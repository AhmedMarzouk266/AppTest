<?php
/**
 * Created by PhpStorm.
 * User: amarz
 * Date: 14.11.2017
 * Time: 11:49
 */

class Answer extends Model
{
    public static $tableName  = 'answers';
    protected $attributes = array(
        'title' => "",
        'images' => "",
        'sort' => 100,
        'quest_id' => 1
    );
}