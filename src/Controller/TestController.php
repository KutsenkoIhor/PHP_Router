<?php

namespace App\Controller;

class TestController {
    public function indexAction(array $id = null)
    {
        echo "I am in Test Controller indexAction";
        echo "<br>";
        echo "My id - ";
        print_r($id);
    }
}