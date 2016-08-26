<?php

namespace App\src\api\models;

use App\core\Entity;

/**
 * Description of country
 *
 * @author rodrigue
 */
class usersEntity extends Entity
{

    private $id;
    private $name;
    private $email;
    private $musics = [];

    function addMusic($id, $id_music)
    {
        $bookmarks = self::getEntity('bookmarks');
        return $bookmarks->add(array('id_user' => (int)$id, "id_music" => $id_music), false);
    }

    function deleteMusic($id, $id_music)
    {
        $bookmarks = self::getEntity('bookmarks');
        $statement = "DELETE FROM $bookmarks->table WHERE id_user=$id AND id_music=$id_music";
        return $this->db->execute($statement);
    }

    function getMusics($id)
    {
        $bookmarks = self::getEntity('bookmarks');
        $music = self::getEntity('music');
        $statement = "SELECT $music->table.* FROM $music->table INNER JOIN $bookmarks->table ON $music->table.id = $bookmarks->table.id_music AND $bookmarks->table.id_user = $id";
        return $this->db->query($statement);
    }

    function getId()
    {
        return $this->id;
    }

    function getName()
    {
        return $this->name;
    }

    function getEmail()
    {
        return $this->email;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setName($name)
    {
        $this->name = $name;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

}
