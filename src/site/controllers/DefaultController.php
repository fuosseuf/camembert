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
        $countries = $this->getEntity('country');
        $this->render('Default:index', array('users' => $users->findAll()));
    }
}
