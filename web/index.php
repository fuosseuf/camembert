<?php

use App\Autoloader;

require '../app/core/Autoloader.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

Autoloader::register();

$page = 'home';

if (isset($_GET['page']))
    $page = $_GET['page'];

ob_start();

require '../src/site/views/' . $page . '.html.php';

$content = ob_get_clean();

require '../app/layout/base.html.php';
?>