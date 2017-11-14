<?php
/**
 * Created by PhpStorm.
 * User: amarz
 * Date: 13.11.2017
 * Time: 12:42
 */

abstract class Model
{
    public static $tableName;
    public static $db; // DB class object.
    public $id;
    protected $attributes = array();
    protected $attr_count;

    public function __construct()
    {
        self::setDB();
    }

    public static function setDB()
    {
        if (!self::$db) {
            self::$db = DB::getInstance();
        }
    }

    public function __set($name, $value)
    {
        if(array_key_exists($name,$this->attributes)){
            $this->attributes[$name] = $value;
        }
    }

    public function __get($name)
    {
        if (isset($this->attributes[$name])) {
            return $this->attributes[$name];
        }
    }

    public function load($data)
    {

        foreach ($this->attributes as $key => $value) {
            if (isset($data[$key])) {
                $this->attributes[$key] = $data[$key];
            }

        }

        // debug($this->attributes);
    }


    public static function findAll()
    {
        self::setDB();
        $sql = "SELECT * FROM " . static::$tableName;
        $result = self::$db->pdo->query($sql);
        $records = array();
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $object = new static();
                if (isset($row['id'])) {
                    $object->id = (int)$row['id'];
                }
                $object->load($row);
                $records[] = $object;
            }
        }
        return $records; // array of objects !
    }

    public static function findOneById($id)
    {
        self::setDB();
        $sql = "SELECT * FROM " . static::$tableName;
        $sql .= " WHERE id =" . $id . " LIMIT 1";
        $result = self::$db->pdo->query($sql);
        $record = [];

        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $object = new static();
                if (isset($row['id'])) {
                    $object->id = (int)$row['id'];
                }
                $object->load($row);
                $record[] = $object;
            }
        }
        return $record;
    }

    public function insert()
    {
        $marks = [];
        $this->attr_count = sizeof(array_keys($this->attributes)); // 5
        for ($i = 0; $i < $this->attr_count; $i++) {
            $marks[] = '?';
        }

        $sql = "INSERT INTO " . static::$tableName;
        $sql .= " (";
        $sql .= join(',', array_keys($this->attributes));
        $sql .= ") ";
        $sql .= "VALUES (";
        $sql .= join(',', $marks);
        $sql .= ");";

        $stmt = self::$db->pdo->prepare($sql);
        $stmt->execute(array_values($this->attributes));

        $last_id = self::$db->pdo->lastInsertId();
        if($last_id){
            $this->id = (int)$last_id;
        }
        return  $this->id;
    }

    public function update()
    {
        $key_value = [];
        foreach ($this->attributes as $key => $value) {
            $key_value[] = "{$key} = ? ";
        }
        $sql = "UPDATE " . static::$tableName . " SET ";
        $sql .= join(',', $key_value);
        $sql .= "WHERE id = ?";
        $stmt = self::$db->pdo->prepare($sql);
        $values = array_values($this->attributes);
        $values[]= $this->id;
        $stmt->execute($values);

        if($stmt->rowCount()== 1){
            return true;
        }else{
            return false;
        }

    }

    public function save()
    {
        if (isset($this->id)) {
            return $this->update();
        } else {
            return $this->insert();
        }
    }


}