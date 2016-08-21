<?php

namespace App\src\site\models;
/**
 * Description of country
 *
 * @author rodrigue
 */
class country {

    private $name;
    private $iso_code;

    function __construct() {
    }
    function getName() {
        return $this->name;
    }

    function getIso_code() {
        return $this->iso_code;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setIso_code($iso_code) {
        $this->iso_code = $iso_code;
    }
    
    public function __get($name) {
        $method = 'get'.  ucfirst($name);
        $this->$name =  $this->$method();
        return $this->$name;
    }


}
