<?php

namespace App\core;

class Request
{

    function __construct()
    {

    }

    public function isMethodGet()
    {
        if ("GET" == $_SERVER['REQUEST_METHOD'])
            return true;
        return FALSE;
    }

    public function isMethodPost()
    {
        if ("POST" == $_SERVER['REQUEST_METHOD'])
            return true;
        return FALSE;
    }

    public function isMethodDelete()
    {
        if ("DELETE" == $_SERVER['REQUEST_METHOD'])
            return true;
        return FALSE;
    }

    public function isMethodPut()
    {
        if ("PUT" == $_SERVER['REQUEST_METHOD'])
            return true;
        return FALSE;
    }

    public function get($val)
    {
        if (!isset($_GET[$val]))
            return null;
        return htmlspecialchars($_GET[$val]);
    }

    public function post($val)
    {
        if (!isset($_POST[$val]))
            return null;
        return htmlspecialchars($_POST[$val]);
    }

}
