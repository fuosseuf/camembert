<?php
namespace App\core;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author rodrigue
 */
class Controller {
    //put your code here
    protected $viewPath;
    protected $template;
    
    public function __construct() {
        $tab = explode("\\", get_called_class());
            $this->viewPath = ROOT.'/'.$tab[1].'/'.$tab[2].'/views/'; 
            $this->template = ROOT.'/app/layout/base.html.php';
    }

    protected function render($view, $vars = array()){ 
        ob_start();
        extract($vars);        
        require ($this->viewPath.'/'.str_replace(':', '/', $view).'.html.php');
        $content = ob_get_clean();
        require ($this->template);
        
    }
}
