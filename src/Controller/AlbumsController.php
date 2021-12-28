<?php

namespace App\Controller;

class AlbumsController {
    public function indexAction(array $id = null)
    {
        echo "I am in Albums Controller indexAction";
        echo "<br>";
        echo "My id - ";
        print_r($id);
    }
}