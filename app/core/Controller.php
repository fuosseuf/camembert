<?php
namespace App\core;

use App\core\AppCore;

class Controller {
    //put your code here
    protected $viewPath;
    protected $template;
    
    public function __construct() {
        $tab = explode("\\", get_called_class());
            $this->viewPath = ROOT.'/'.$tab[1].'/'.$tab[2].'/views/'; 
            $this->template = ROOT.'/app/layout/base.html.php';
    }
    
    protected function getEntity($entity){
        return AppCore::getInstance()->getEntity($entity);
    }


    protected function render($view, $vars = array()){ 
        ob_start();
        extract($vars);        
        require ($this->viewPath.'/'.str_replace(':', '/', $view).'.html.php');
        $content = ob_get_clean();
        require ($this->template);
        
    }
}
