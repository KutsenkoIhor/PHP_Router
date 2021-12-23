<?php

namespace App\Controller;

class TestController {
    public function indexAction($id = null)
    {
        echo "I am in TestController indexAction";
        echo "<br>";
        echo "My id - " . $id;
    }
}