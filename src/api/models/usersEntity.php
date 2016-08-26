<?php

namespace App\src\api\models;

use App\core\Entity;
/**
 * Description of country
 *
 * @author rodrigue
 */
class usersEntity extends Entity{
    private $id;
    private $name;
    private $email;

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getEmail() {
        return $this->email;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setEmail($email) {
        $this->email = $email;
    }


}
