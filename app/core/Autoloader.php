<?php

namespace App;

/**
 * Description of Autoload
 *
 * @author rodrigue
 */
class Autoloader {

    public static function autoload($class) { 
        if (strpos($class, __NAMESPACE__ . "\\") === 0) {
            $class = str_replace(__NAMESPACE__ . "\\", "", $class);
            
            $class = str_replace("\\", "/", $class);
            if (file_exists(__DIR__ . "/../" . $class . ".php"))
                require __DIR__ . "/../" . $class . ".php";
            else
                require __DIR__ . "/../../" . $class . ".php";  //src
        }
    }

    public static function register() {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

}
