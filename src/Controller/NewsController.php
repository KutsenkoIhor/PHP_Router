<?php

namespace App\Controller;

class NewsController {
    public function indexAction()
    {
        echo "I am in News Controller indexAction";
    }

    public function editAction($id = null)
    {
        echo "I am in News Controller editAction";
        echo "<br>";
        echo "My id - " . $id;
    }
}