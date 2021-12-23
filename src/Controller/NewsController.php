<?php

namespace App\Controller;

class NewsController {
    public function indexAction($id = null)
    {
        echo "I am in NewsController indexAction";
        echo "<br>";
        echo "My id - " . $id;
    }

    public function editAction($id = null)
    {
        echo "I am in NewsController editAction";
        echo "<br>";
        echo "My id - " . $id;
    }
}