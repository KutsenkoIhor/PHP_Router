<?php

require_once 'vendor/autoload.php';

use App\Router\Router;

//$_SERVER['REQUEST_URI'] = '/news/edit/12вы34?567/';

$obj = new Router($_SERVER['REQUEST_URI']);
