<?php
namespace App;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DIContainer
 *
 * @author rodrigue
 */
class DIContainer {

    //put your code here
    private $registry = [];
    private $_instances = [];
    private $_factories = [];

    public function set($key, callable $resolver) {
        $this->registry[$key] = $resolver;
    }

        public function setFactory($key, callable $resolver) {
        $this->_factories[$key] = $resolver;
    }

    
    public function get($key) {
         if (isset($this->_factories[$key]))
             return $this->_factories[$key]();

        if (!isset($this->_instances[$key]))
            $this->_instances[$key] = $this->registry[$key]();

        return $this->_instances[$key];
    }

}
