<?php

namespace App\src\api\models;

use App\core\Entity;
/**
 * Description of country
 *
 * @author rodrigue
 */
class musicEntity extends Entity{
    private $id;
    private $name;
    private $duration;
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getDuration() {
        return $this->duration;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setDuration($duration) {
        $this->duration = $duration;
    }



}
