<?php

use App\Autoloader;
use App\core\AppCore;

require '../app/core/Autoloader.php';

define('ROOT', dirname(__DIR__));

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

Autoloader::register();

$page = 'home';

if (isset($_GET['page']))
    $page = $_GET['page'];

if($page === "home"){
    $controller = new \App\src\site\controllers\DefaultController();
    $controller->index();
}

?>