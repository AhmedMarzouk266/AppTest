<?php
/**
 * Created by PhpStorm.
 * User: amarz
 * Date: 14.11.2017
 * Time: 11:51
 */

class Test extends Model
{
    public static $tableName  = 'tests';
    protected $attributes = array(
        'title' => "",
        'sort' => 100,
    );
}