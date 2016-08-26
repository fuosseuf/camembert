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

    /**
     * gestion des resseources users -- list
     */
    public function users()
    {
        if ($this->request->isMethodGet()) {
            $users = $this->getEntity('users');

            if ($this->request->get('id')) {

                if ($data = $users->find($this->request->get('id'))) {
                    $this->jsonRender(200, "User found", $data);
                } else {
                    $this->jsonRender(200, "User not found", null);
                }
            } else {
                if ($data = $users->findAll()) {
                    $this->jsonRender(200, "Users found", $data);
                } else {
                    $this->jsonRender(200, "Users not found", null);
                }
            }
        } else {
            $this->jsonRender(200, "Bad Medhod caller", null);
        }
    }

    /**
     * gestion des resseources music -- list
     */
    public function music()
    {
        if ($this->request->isMethodGet()) {
            $music = $this->getEntity('music');

            if ($this->request->get('id')) {

                if ($data = $music->find($this->request->get('id'))) {
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
        } else {
            $this->jsonRender(200, "Bad Medhod caller", null);
        }
    }


    public function listbookmarks()
    { 
        $users = $this->getEntity('users');
        $music = $this->getEntity('music');

        if ($this->request->isMethodGet()) {
            if ($this->request->get('id_user')) {
                if ($data = $users->getMusics($this->request->get('id_user'))) {
                    $this->jsonRender(200, "Bookmarks found", $data);
                } else {
                    $this->jsonRender(200, "Bookmarks not found", null);
                }
            } else {
                $this->jsonRender(200, "User Id not specified", null);
            }
        } else {
            $this->jsonRender(200, "Bad Medhod caller", null);
        }
    }

    public function addbookmarks()
    {
        $users = $this->getEntity('users');
        $music = $this->getEntity('music');

        if ($this->request->isMethodPut()) {
            if ($this->request->get('id_user') && $this->request->post('id_music')) {
                if ($users->find($this->request->get('id_user'))) {
                    if ($music->find($this->request->post('id_music'))) {

                        if ($data = $users->addMusic($this->request->get('id_user'), $this->request->post('id_music')))
                            $this->jsonRender(200, "Bookmark add", $data);
                        else
                            $this->jsonRender(200, "Bookmarks not add", null);
                    } else {
                        $this->jsonRender(200, "Music not found", null);
                    }
                } else {
                    $this->jsonRender(200, "User not found", null);
                }
            } else {
                $this->jsonRender(200, "User Id or Music Id not specified", null);
            }
        } else {
            $this->jsonRender(200, "Bad Medhod caller", null);
        }
    }

    public function deletebookmarks()
    { 
        $users = $this->getEntity('users');
        $music = $this->getEntity('music');

        if ($this->request->isMethodDelete()) {
            if ($this->request->get('id_user') && $this->request->get('id_music')) {
                if ($users->find($this->request->get('id_user'))) {
                    if ($music->find($this->request->post('id_music'))) {

                        $users->deleteMusic($this->request->get('id_user'), $this->request->get('id_music'));
                        $this->jsonRender(200, "Bookmarks delete", $data);
                    } else {
                        $this->jsonRender(200, "Music not found", null);
                    }
                } else {
                    $this->jsonRender(200, "User not found", null);
                }
            } else {
                $this->jsonRender(200, "User Id or Music Id not specified", null);
            }
        } else {
            $this->jsonRender(200, "Bad Medhod caller", null);
        }
    }

}
