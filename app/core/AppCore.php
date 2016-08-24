<?php
namespace App\core;

use App\core\Database;
use App\config\Config;

/**
 * Description of AppCore
 *
 * @author rodrigue
 */
class AppCore {

    private $db;
    private static $_instance;

    private function __construct() {
        $config = Config::getInstance();
        $this->db = new Database($config->get('db_name'), $config->get('db_host'), $config->get('db_user'), $config->get('db_pswd'));
    }

    public static function getInstance() {
        if (self::$_instance === null)
            self::$_instance = new AppCore();
        return self::$_instance;
    }

    public function getEntity($class) {
        $class_name = '\\App\\src\\site\\models\\'.$class . 'Entity';
        return new $class_name($this->getDb());
    }

    public function getDb() {
        return $this->db;
    }
    
//    public static function load(){
//        session_start();
//        require 'Autoloader.php';
//        App\Autoloader::register();
//        
////        require '../src/Autoloader.php';
////        src\Autoloader::register();
//    }

}
