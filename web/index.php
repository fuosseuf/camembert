<?php

use App\Autoloader;
use App\core\AppCore;

require '../app/core/Autoloader.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

Autoloader::register();

$c = AppCore::getInstance()->getEntity("country");

var_dump($c->delete(3));
die;
$page = 'home';

if (isset($_GET['page']))
    $page = $_GET['page'];

ob_start();

require '../src/site/views/' . $page . '.html.php';

$content = ob_get_clean();

require '../app/layout/base.html.php';
?>