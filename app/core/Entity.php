<?php

namespace App\core;

use \PDO;
use App\core\AppCore;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Entity
 *
 * @author rodrigue
 */
class Entity
{

    //put your code here

    public $table;
    protected $db;
    protected $class_name;

    public function __construct(\App\core\Database $db)
    {
        $this->db = $db;
        $this->class_name = get_class($this);
        if (is_null($this->table)) {
            $tab = explode("\\", $this->class_name);
            $table = end($tab);
            $this->table = strtolower(str_replace("Entity", "", $table));
        }
    }

    public static function getEntity($entity)
    {
        return AppCore::getInstance()->getEntity($entity);
    }

    public function findAll()
    {
        $statement = "SELECT * FROM $this->table";
        return $this->db->query($statement);
    }

    public function findBy(array $attrs, $one = FALSE)
    {
        $statement = "SELECT * FROM $this->table WHERE";
        $where = "";
        foreach ($attrs as $key => $value) {
            $where .= " $key = '$value' AND";
        }
        $where = substr($where, 0, -4);
        $statement .= $where;
        return $this->db->query($statement, $one);
    }

    public function find($id)
    {
        return $this->findBy(array('id' => $id), true);
    }

    public function delete($id)
    {
        $statement = "DELETE FROM $this->table WHERE id=$id";
        if (1 === $this->db->execute($statement))
            return true;

        return FALSE;
    }

    public function add($values, $hasId = true)
    {
        $statement = "INSERT INTO $this->table VALUES(";

        if ($hasId)
            $statement .= "null,";
        $set = "";
        foreach ($values as $key => $value) {
            if (is_float($value) || is_int($value))
                $set .= " $value,";
            else
                $set .= " '$value',";
        }
        $set = substr($set, 0, -1);
        $statement .= "$set)";
        return $this->db->execute($statement);
    }

    public function update($id, $values)
    {
        $statement = "UPDATE $this->table";
        $set = " SET";
        foreach ($values as $key => $value) {
            $set .= " $key='$value',";
        }
        $set = substr($set, 0, -1);
        $statement .= "$set  WHERE id=$id";
        echo $statement;
        return $this->db->execute($statement . $set);
    }

    public function __get($name)
    {
        $method = 'get' . ucfirst($name);
        $this->$name = $this->$method();
        return $this->$name;
    }

}
