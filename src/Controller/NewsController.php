<?php

namespace App\Controller;

class NewsController {
    public function indexAction(array $id = null)
    {
        echo "I am in News Controller indexAction";
        echo "<br>";
        echo "My id - ";
        print_r($id);
    }

    public function editAction($id = null)
    {
        echo "I am in News Controller editAction";
        echo "<br>";
        echo "My id - ";
        print_r($id);
    }
}