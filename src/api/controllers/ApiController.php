<?php

namespace App\src\api\controllers;

use App\core\RestController;
use App\core\AppCore;

/**
 * Description of Controller
 *
 * @author rodrigue
 */
class ApiController extends RestController
{

    //put your code here

    public function users()
    {
        $users = $this->getEntity('users');

        if ($id = isset($_GET['id'])) {

            if ($data = $users->find($id)) {
                $this->jsonRender(200, "User found", $data);
            } else {
                $this->jsonRender(404, "User not found", null);
            }
        } else {
            if ($data = $users->findAll()) {
                $this->jsonRender(200, "Users found", $data);
            } else {
                $this->jsonRender(404, "Users not found", null);
            }
        }
    }

    public function music()
    {
        $music = $this->getEntity('music');

        if ($id = isset($_GET['id'])) {

            if ($data = $music->find($id)) {
                $this->jsonRender(200, "Music found", $data);
            } else {
                $this->jsonRender(404, "Music not found", null);
            }
        } else {
            if ($data = $music->findAll()) {
                $this->jsonRender(200, "Musics found", $data);
            } else {
                $this->jsonRender(404, "Musics not found", null);
            }
        }
    }
    
     public function music()
    {
        $music = $this->getEntity('music');

        if ($id = isset($_GET['id'])) {

            if ($data = $music->find($id)) {
                $this->jsonRender(200, "Music found", $data);
            } else {
                $this->jsonRender(200, "Music not found", null);
            }
        } else {
            if ($data = $music->findAll()) {
                $this->jsonRender(200, "Musics found", $data);
            } else {
                $this->jsonRender(200, "Musics not found", null);
            }
        }
    }

}
