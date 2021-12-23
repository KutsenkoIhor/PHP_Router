<?php

require_once 'vendor/autoload.php';
use App\Controller\AlbumsController;
use App\Controller\IndexController;
use App\Controller\NewsController;
use App\Controller\TestController;





$uriMap = [
    '/test-uri' => [TestController::class, 'indexAction'],
    '/' => [IndexController::class, 'indexAction'],
    '/news' => [NewsController::class, 'indexAction'],
    '/news/edit' => [NewsController::class, 'editAction'],
    '/albums' => [AlbumsController::class, 'indexAction'],
];

//$_SERVER['REQUEST_URI'] = '/news/edit/6';

$arrUrll = explode("/", $_SERVER['REQUEST_URI']);
$id = $arrUrll[count($arrUrll) - 1];
$maskArr = array_slice($arrUrll, 0, count($arrUrll) - 1 );
$mask = implode("/", $maskArr);
if ($mask === '') {
    $mask = '/';
}

if (isset($uriMap[$_SERVER['REQUEST_URI']])) {
    [$nameClass, $action] = $uriMap[$_SERVER['REQUEST_URI']];
    $controller = new $nameClass();
    $controller ->$action();
} elseif (isset($uriMap[$mask])) {
    [$nameClass, $action] = $uriMap[$mask];
    $controller = new $nameClass();
    $controller ->$action($id);
} else {
    http_response_code(404);
    echo 'Page not found';
    die();
}



