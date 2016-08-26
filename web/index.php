<?php

use App\Autoloader;
use App\core\AppCore;

require '../app/core/Autoloader.php';

define('ROOT', dirname(__DIR__));

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

Autoloader::register();


$rss = '';

if (isset($_GET['rss']))
    $rss = $_GET['rss'];

$controller = new \App\src\api\controllers\ApiController();
switch ($rss) {
    case "users":
        $controller->users();
        break;
    case "music":
        $controller->music();
        break;
    case "bookmarks":
        if (array_key_exists('delete', $_GET))
            $controller->deletebookmarks();
        else if (array_key_exists('add', $_GET))
            $controller->addbookmarks();
        else
            $controller->listbookmarks();
        break;
    default:
        $controller->notFound();
        break;
}
?>