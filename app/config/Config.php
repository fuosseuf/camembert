<?php
namespace App\config;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Config
 *
 * @author rodrigue
 */
class Config {
    //put your code here
    private $settings = [];
    private static $_instance;


    private function __construct() {
        $this->settings = require 'Parameters.php';
    }
    
    public static function getInstance(){
        if(self::$_instance === null)
            self::$_instance = new Config();
        return self::$_instance;
    }
    
    public function get($key){
        if(isset($this->settings[$key]))
            return $this->settings[$key];
        return null;
    }
}
