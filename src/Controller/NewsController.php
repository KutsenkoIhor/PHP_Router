<?php

namespace App\Controller;

class NewsController {
    public function indexAction($id = null)
    {
        echo "I am in NewsController indexAction MY id - " . $id;
    }

    public function editAction($id = null)
    {
        echo "I am in NewsController editAction MY id - " . $id;
    }
}