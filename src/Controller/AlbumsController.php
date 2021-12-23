<?php

namespace App\Controller;

class AlbumsController {
    public function indexAction($id = null)
    {
        echo "I am in AlbumsController indexAction";
        echo "<br>";
        echo "My id - " . $id;
    }
}