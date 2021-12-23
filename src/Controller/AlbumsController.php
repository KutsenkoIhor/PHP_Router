<?php

namespace App\Controller;

class AlbumsController {
    public function indexAction($id = null)
    {
        echo "I am in AlbumsController MY id - " . $id;
    }
}