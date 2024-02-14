<?php

require_once '../vendor/autoload.php';
use App\classes\Product;
use App\classes\Auth;


if (isset($_POST['btn'])){
    $product = new Product($_POST, $_FILES);
    $message = $product->save();
    include 'home.php';
}
elseif (isset($_GET['status'])){
    if ($_GET['status'] == 'manage'){
        $product = new Product();
        $products = $product->getAllProductInfo();
        include 'manage.php';
    }
    elseif ($_GET['status'] == 'edit'){
        $id = $_GET['id'];
        $product = new Product();
        $productInfo = $product->getSingleProductInfo($id);
        extract($productInfo);
        include 'edit.php';
    }
    elseif ($_GET['status'] == 'delete'){
        $id = $_GET['id'];
        $product = new Product();
        $product->deleteProductInfo($id);
    }
    elseif ($_GET['status'] == 'index'){
        $product = new Product();
        $products = $product->getAllProductInfo();
        include 'index.php';
    }
    elseif ($_GET['status'] == 'detail'){
        $id = $_GET['id'];
        $product = new Product();
        $productInfo = $product->getSingleProductInfo($id);
        include 'detail.php';
    }
    elseif ($_GET['status'] == 'logout'){
        $auth = new Auth();
        $message = $auth->logout();
        include 'login.php';
    }
}
elseif (isset($_POST['updateBtn'])){
  $id = $_POST['id'];
  $product = new Product($_POST, $_FILES);
  $singleProduct = $product->getSingleProductInfo($id);
  $product->updateProductInfoById($singleProduct);
}
elseif (isset($_POST['loginBtn'])){
    $auth = new Auth($_POST);
    $message = $auth->login();
    include 'login.php';
}



