<?php

namespace App\Controller;

class IndexController {
    public function indexAction(array $id = null)
    {
        echo "I am in Index Controller indexAction";
        echo "<br>";
        echo "My id - ";
        print_r($id);
    }
}


