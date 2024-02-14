<?php

namespace App\classes;

class Front
{
    public function index(){
        header('location: pages/action.php?status=index');
    }

}