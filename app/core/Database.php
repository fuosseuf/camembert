<?php

namespace App\core;

use \PDO;
use App\src\site\models\country;

/**
 * Description of Database
 *
 * @author rodrigue
 */
class Database {

    public $dbname;
    public $dbhost;
    public $dbuser;
    public $dbpwd;
    public $db;

    function __construct($dbname = "mvondo", $dbhost = "localhost", $dbuser = "mvondo", $dbpwd = "mvondo") {
        $this->dbname = $dbname;
        $this->dbhost = $dbhost;
        $this->dbuser = $dbuser;
        $this->dbpwd = $dbpwd;
    }

    public function getDb() {
        if ($this->db == null) {
            try {
                $this->db = new PDO("mysql:host=$this->dbhost;dbname=$this->dbname;charset=utf8", $this->dbuser, $this->dbpwd);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // MODE DEBUG
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
        }

        return $this->db;
    }

    public function query($statement, $class) {
        return $this->getDb()->query($statement)->fetchAll(PDO::FETCH_CLASS, $class);
    }

    public function prepare($statement, $values, $class, $only_one = true) {
        $req = $this->getDb()->prepare($statement);
        $req->execute($values);
        $req->setFetchMode(PDO::FETCH_CLASS, $class); 
        if ($only_one)
            return $req->fetch();
        else
            return $req->fetchAll();
    }

}
