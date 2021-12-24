<?php

namespace App\Router;
require_once 'vendor/autoload.php';

use App\Controller\AlbumsController;
use App\Controller\IndexController;
use App\Controller\NewsController;
use App\Controller\TestController;

class Router
{
    private string $url;
    private array $uriMap = [
        '/test-uri' => [TestController::class, 'indexAction'],
        '/' => [IndexController::class, 'indexAction'],
        '/news' => [NewsController::class, 'indexAction'],
        '/news/edit' => [NewsController::class, 'editAction'],
        '/albums' => [AlbumsController::class, 'indexAction'],
    ];
    private string $id;
    private string $mask;
    private array $uriMapWithID = [
        '/news/edit' => [NewsController::class, 'editAction'],
    ];

    public function __construct($url)
    {
        $this->url = $url;
        $this->selectIDandMask();
    }

    private function selectIDandMask(): void
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
        $this->id = $id;
        $this->mask = $mask;
        $this->checkONnQueryString();
    }

    private function checkONnQueryString(): void
    {
        $posQueryString = strpos($this->id, '?');
        if ($this->id[0] === "?") {
            $this->PageNotFound();
        } elseif ($posQueryString) {
            $this->id = substr($this->id, 0, $posQueryString);
            $this->startTheController();
        } else {
            $this->startTheController();
        }
    }

    private function startTheController(): void
    {
        if (isset($this->uriMap[$this->url])) {
            [$nameClass, $action] = $this->uriMap[$this->url];
            $controller = new $nameClass();
            $controller ->$action();
        } elseif (isset($this->uriMapWithID[$this->mask])) {
            [$nameClass, $action] = $this->uriMapWithID[$this->mask];
            $controller = new $nameClass();
            $controller ->$action($this->id);
        } else {
            $this->PageNotFound();
        }
    }

    private function PageNotFound(): void
    {
        http_response_code(404);
        echo 'Page not found';
        die();
    }
}