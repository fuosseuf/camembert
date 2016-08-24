<?php

namespace App\core;

use \PDO;

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
class Entity {

    //put your code here

    protected $table;
    protected $db;
    protected $class_name;

    public function __construct(\App\core\Database $db) {
        $this->db = $db;
        $this->class_name = get_class($this);
        if (is_null($this->table)) {
            $tab = explode("\\", $this->class_name);
            $table = end($tab);
            $this->table = strtolower(str_replace("Entity", "", $table));
        }
    }

    public function findAll() {
        $statement = "SELECT * FROM $this->table";
        return $this->db->query($statement);
    }

    public function findBy(array $attrs) {
        $statement = "SELECT * FROM $this->table WHERE";
        $where = "";
        foreach ($attrs as $key => $value) {
            $where .= " $key = '$value' AND";
        }
        $where = substr($where, 0, -4);
        $statement .= $where;
        return $this->db->query($statement);
    }

    public function find($id) {
        return $this->findBy(array('id' => $id));
    }

    public function delete($id) {
        $statement = "DELETE FROM $this->table WHERE id=$id";
        if (1 === $this->db->execute($statement))
            return true;

        return FALSE;
    }

    public function add($values) {
        $statement = "INSERT INTO $this->table VALUES(null," ;
        $set = "";
        foreach ($values as $key => $value) {
            $set .= " '$value',";
        }
        $set = substr($set, 0, -1);
        $statement .= "$set)";
        return $this->db->execute($statement);
    }

    public function update($id, $values) {
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

}
