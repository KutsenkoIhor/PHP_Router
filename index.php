<?php

require_once 'vendor/autoload.php';
//use App\Controller\AlbumsController;
//use App\Controller\IndexController;
//use App\Controller\NewsController;
//use App\Controller\TestController;
use App\Router\Router;


//$_SERVER['REQUEST_URI'] = '/news/edit/1/';

$obj = new Router($_SERVER['REQUEST_URI']);


//$uriMap = [
//    '/test-uri' => [TestController::class, 'indexAction'],
//    '/' => [IndexController::class, 'indexAction'],
//    '/news' => [NewsController::class, 'indexAction'],
//    '/news/edit' => [NewsController::class, 'editAction'],
//    '/albums' => [AlbumsController::class, 'indexAction'],
//];


//$arrUrll = explode("/", $_SERVER['REQUEST_URI']);
//$indexLastValue = count($arrUrll) - 1;
//$id = $arrUrll[$indexLastValue];
//if ($id === '') {
//    $indexLastValue = count($arrUrll) - 2;
//}
//$id = $arrUrll[$indexLastValue];
//$maskArr = array_slice($arrUrll, 0, $indexLastValue);
//$mask = implode("/", $maskArr);
//if ($mask === '') {
//    $mask = '/';
//}

//echo "\n";
//echo "URL  -  {$_SERVER['REQUEST_URI']}";
//echo "\n";
//echo "Mask -  $mask";
//echo "\n";
//echo "id   -  $id";
//echo "\n";

//if (isset($uriMap[$_SERVER['REQUEST_URI']])) {
//    [$nameClass, $action] = $uriMap[$_SERVER['REQUEST_URI']];
//    $controller = new $nameClass();
//    $controller ->$action();
//} elseif (isset($uriMap[$mask])) {
//    [$nameClass, $action] = $uriMap[$mask];
//    $controller = new $nameClass();
//    $controller ->$action($id);
//} else {
//    http_response_code(404);
//    echo 'Page not found';
//    die();
//}



