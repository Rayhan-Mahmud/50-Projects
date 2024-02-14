<?php

namespace App\classes;

class Database
{
    private $host;
    private $user;
    private $password;
    private $database;
    private $connection;
    private $port;


    protected function connect(){
        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->database = "_myweb";
        $this->port = "3307";

        if ($this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->database, $this->port)){
            return $this->connection;
        }else{
            die("Connection failed: " . mysqli_connect_error());
        }

    }

}