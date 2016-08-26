<?php

namespace App\src\api\models;

use App\core\Entity;

/**
 * Description of country
 *
 * @author rodrigue
 */
class bookmarksEntity extends Entity
{

    private $id_user;
    private $id_music;

    function getId_user()
    {
        return $this->id_user;
    }

    function getId_music()
    {
        return $this->id_music;
    }

    function setId_user($id_user)
    {
        $this->id_user = $id_user;
    }

    function setId_music($id_music)
    {
        $this->id_music = $id_music;
    }

}
