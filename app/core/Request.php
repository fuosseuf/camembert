<?php

namespace App\core;

class Request
{
    function __construct(){
    }


    public function get($val){
       if(!isset($_GET[$val]))
           return null;
       return htmlspecialchars($_GET[$val]);
    }
    
    public function post($val){
        if(!isset($_POST[$val]))
           return null;
        return htmlspecialchars($_POST[$val]);
    }
    
}
