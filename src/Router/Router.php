<?php

namespace App\Router;
require_once 'vendor/autoload.php';

use App\Controller\AlbumsController;
use App\Controller\IndexController;
use App\Controller\NewsController;
use App\Controller\TestController;

class Router
{
    public string $url;
    private array $uriMap = [
        '/test-uri' => [TestController::class, 'indexAction'],
        '/' => [IndexController::class, 'indexAction'],
        '/news' => [NewsController::class, 'indexAction'],
        '/news/edit' => [NewsController::class, 'editAction'],
        '/albums' => [AlbumsController::class, 'indexAction'],
    ];
    private string $id;
    private string $mask;

    public function __construct($url)
    {
        $this->url = $url;
        $this->selectIDandMask();
    }

    private function selectIDandMask()
    {
        $arrUrll = explode("/", $this->url);
        $indexLastValue = count($arrUrll) - 1;
        $id = $arrUrll[$indexLastValue];
        if ($id === '') {
            $indexLastValue = count($arrUrll) - 2;
        }
        $id = $arrUrll[$indexLastValue];
        $maskArr = array_slice($arrUrll, 0, $indexLastValue);
        $mask = implode("/", $maskArr);
        if ($mask === '') {
            $mask = '/';
        }
        $this->id = $id;
        $this->mask = $mask;
        $this->startTheController();
    }

    private function startTheController()
    {
        if (isset($this->uriMap[$this->url])) {
            [$nameClass, $action] = $this->uriMap[$this->url];
            $controller = new $nameClass();
            $controller ->$action();
        } elseif (isset($this->uriMap[$this->mask])) {
            [$nameClass, $action] = $this->uriMap[$this->mask];
            $controller = new $nameClass();
            $controller ->$action($this->id);
        } else {
            http_response_code(404);
            echo 'Page not found';
            die();
        }
    }
}