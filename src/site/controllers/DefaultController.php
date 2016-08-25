<?php
namespace App\src\site\controllers;

use App\core\Controller;
use App\core\AppCore;
/**
 * Description of Controller
 *
 * @author rodrigue
 */
class DefaultController extends Controller{
    //put your code here
    
    public function index() {
        $countries = AppCore::getInstance()->getEntity('country');
        $this->render('Default:index', array('countries' => $countries->findAll()));
    }
}
