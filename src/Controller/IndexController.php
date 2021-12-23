<?php

namespace App\Controller;

class IndexController {
    public function indexAction($id = null)
    {
        echo "I am in IndexController MY id - " . $id;
    }
}


