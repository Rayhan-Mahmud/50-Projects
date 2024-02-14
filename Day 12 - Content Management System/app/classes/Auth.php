<?php

namespace App\classes;

class Auth extends Database
{
    private $email;
    private $password;
    private $sql;
    private $queryResult;
    private $data;

    public function __construct($data = null){
        if($data){
            $this->email = $data['email'];
            $this->password = md5($data['password']);
        }
    }
    public function login(){

        $this->sql = "SELECT * FROM users WHERE email = '$this->email' AND password = '$this->password'";

        if ($this->queryResult = mysqli_query($this->connect(), $this->sql)) {
            if($this->data = mysqli_fetch_assoc($this->queryResult)){
                session_start();
                $_SESSION['id'] = $this->data['id'];
                $_SESSION['name'] = $this->data['name'];
                $_SESSION['email'] = $this->data['email'];
                header('location: home.php');
            }
            else{
                return 'Invalid Email or Password';
            }
        }
        else{
            die('Query Problem'.mysqli_error($this->connect()));
        }

    }

    public function logout()
    {
        session_start();
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        header('Location: index.php?status=index');
    }

}