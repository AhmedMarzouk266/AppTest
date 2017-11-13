<?php
/**
 * Created by PhpStorm.
 * User: amarz
 * Date: 13.11.2017
 * Time: 12:42
 */

abstract class Model
{
    public static $tableName ;
    public static $db; // DB class object.
    public $id;
    protected $data = array();

    public function __construct()
    {
        self::setDB();
    }

    public static function setDB(){
        if( !self::$db ){
            self::$db = DB::getInstance();
        }
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value ;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }


    public static function findAll(){
       self::setDB();
       $sql    = "SELECT * FROM ".static::$tableName;
       $result = self::$db->pdo->query($sql);
       $questions = array();
       if($result->rowCount()>0){
           $i =1 ;
           while($row = $result->fetch(PDO::FETCH_ASSOC)){
               $questions[] = $row;
               $i++;
           }
       }

       return $questions;
   }

    public static function findOneById($id){
        self::setDB();
        $sql  = "SELECT * FROM ".static::$tableName;
        $sql .= " WHERE id =".$id." LIMIT 1" ;
        $result = self::$db->pdo->query($sql);
        $question =[];
        if($result->rowCount()>0){
            $i =1 ;
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $question = $row;
                $i++;
            }
        }
        return $question;
    }

    public static function insert($data){
        self::setDB();

        $stmt = self::$db->pdo->prepare('INSERT INTO questions (quest,sort)
        VALUES (?,?)');
        $stmt->execute(array($data['quest'],$data['sort']));

    }

    public static function update($data){
        self::setDB();

        $stmt = self::$db->pdo->prepare('UPDATE questions SET
        quest = ? ,sort = ? WHERE id= ?');
        $stmt->execute(array($data['quest'],$data['sort'],$data['id']));
    }

    public static function save($data){
        if(static::findOneById($data['id'])){
            static::update($data);
        }else{
            static::insert($data);
        }
    }



}