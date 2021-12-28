<?php

namespace App\Router;

use App\Controller\AlbumsController;
use App\Controller\IndexController;
use App\Controller\NewsController;
use App\Controller\TestController;

class Router
{
    private array $uriMap = [
        '/test-uri' => [TestController::class, 'indexAction'],
        '/' => [IndexController::class, 'indexAction'],
        '/news' => [NewsController::class, 'indexAction'],
        '/news/edit/{id}/{cd}' => [NewsController::class, 'editAction'],
        '/albums' => [AlbumsController::class, 'indexAction'],
    ];
    private string $url;

    public function __construct(string $url)
    {
        $this->url = $url;
        $this->startTheController($url);
    }

    private function startTheController(string $mask, array $id = null): void
    {
        if (isset($this->uriMap[$mask])) {
            [$nameClass, $action] = $this->uriMap[$mask];
            $controller = new $nameClass();
            $controller->$action($id);
            die();
        } else {
            $this->selectUrlMapWithParameters();
        }
    }

    private function selectUrlMapWithParameters(): void
    {
        $urlMapWithParameters = null;
        foreach ($this->uriMap as $key => $value) {
            if (strpos($key, "/{") !== false & strpos($key, "}") !== false) {
                $maskAndId = explode("/{", $key);
                $mask = array_shift($maskAndId);
                foreach ($maskAndId as $keu => $valuee) {
                    $maskAndId[$keu]  = "{" . $valuee;
                }
                $urlMapWithParameters[$mask] = $maskAndId;
            }
        }
        if ($urlMapWithParameters === null) {
            $this->PageNotFound();
        } else {
            $this->selectMaskAndId($urlMapWithParameters);
        }
    }

    private function selectMaskAndId(array $urlMapWithParameters): void
    {
        $mask = null;
        foreach ($urlMapWithParameters  as $key => $value) {
            if (strpos($this->url, $key . "/") !== false) {
                $mask = $key;
            } elseif ($this->url === $key) {
                $mask = $this->url . "/" . implode("/", $value);
                $this->startTheController($mask);
            }
        }
        if ($mask === null) {
            $this->PageNotFound();
        }
        $id = substr($this->url, strlen($mask) + 1);
        $arrId = explode("/", $id);
        $this->MatchingParameterNames($urlMapWithParameters, $mask, $arrId);
    }

    private function MatchingParameterNames(array $urlMapWithParameters, string $mask, array $arrid): void
    {
        $parametr = [];
        foreach ($urlMapWithParameters[$mask] as $key => $value) {
            $parametr[$value] = $arrid[$key];
        }
        $maskk = $mask . "/" . implode("/", $urlMapWithParameters[$mask]);
        $this->startTheController($maskk, $parametr);
    }

    private function PageNotFound(): void
    {
        http_response_code(404);
        echo 'Page not found';
        die();
    }
}