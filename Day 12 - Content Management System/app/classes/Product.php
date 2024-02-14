<?php

namespace App\classes;
class Product extends Database
{
    private $name;
    private $price;
    private $stock;
    private $description;
    private $data = [];
    private $file;
    private $imageURL;
    private $link;
    private $sql;
    private $queryResult;

    public function __construct($data = null, $file = null)
    {
        if ($data){
            $this->name = $data['name'];
            $this->price = $data['price'];
            $this->stock = $data['stock'];
            $this->description = $data['description'];
        }
        if ($file){
            $this->file = $file;
        }
    }

    public function getImageURL(){
        $imageName = $this->file['image']['name'];
        $directory = '../assets/images/'. $imageName;
        move_uploaded_file($this->file['image']['tmp_name'], $directory);
        return $directory;
    }

    public function save() {


        $this->link = $this->connect();
        if($this->link){

            if(empty($this->file['image']['name'])){
                $this->imageURL = '';
            }
            else
            {
                $this->imageURL = $this->getImageURL();
            }
            $this->sql = "INSERT INTO products(name, price, stock, description, image) 
                        VALUES('$this->name', '$this->price', '$this->stock', '$this->description', '$this->imageURL')";

            if (mysqli_query($this->link, $this->sql)) {
                return 'Product Inserted Successfully';
            } else {
                die('Query Problem'.mysqli_error($this->link));
            }
        }
    }

    public function getAllProductInfo()
    {
        if($this->link = $this->connect()){
            $this->sql = "SELECT * FROM products";
            $this->queryResult = mysqli_query($this->link, $this->sql);
            $i = 0;
            while ($row = mysqli_fetch_assoc($this->queryResult)){
                $this->data[$i]['id'] = $row['id'];
                $this->data[$i]['name'] = $row['name'];
                $this->data[$i]['price'] = $row['price'];
                $this->data[$i]['stock'] = $row['stock'];
                $this->data[$i]['description'] = $row['description'];
                $this->data[$i]['image'] = $row['image'];
                $i++;
            }
            return $this->data;
        }
        else{
            die('Query Problem'.mysqli_error($this->link));
        }

    }

    public function getSingleProductInfo($id)
    {
        if($this->link = $this->connect()){
            $this->sql = "SELECT * FROM products WHERE id = $id";
            if ($this->queryResult = mysqli_query($this->link, $this->sql)){
                return mysqli_fetch_assoc($this->queryResult);
            }
        }

    }

    public function updateProductInfoById($singleProduct){
        if ($this->link = $this->connect()){
            if(empty($this->file['image']['name'])){
                $this->imageURL = $singleProduct['image'];
            } else {
                if(file_exists($singleProduct['image'])){
                    unlink($singleProduct['image']);
                }
                $this->imageURL = $this->getImageURL();
            }
            $this->sql = "UPDATE products SET 
                    name        = '$this->name', 
                    price       = '$this->price', 
                    stock       = '$this->stock', 
                    description = '$this->description', 
                    image       = '$this->imageURL' 
                    WHERE id = '$singleProduct[id]'";

            if (mysqli_query($this->link, $this->sql)){
                session_start();
                $_SESSION['message'] = "Product Updated";
                header('location: action.php?status=manage');
            } else {
                die('Error: '.mysqli_error($this->link));
            }
        }
    }

    public function deleteProductInfo($id)
    {
        if ($this->link = $this->connect()){
            $row = $this->getSingleProductInfo($id);
            if (file_exists($row['image'])){
                unlink($row['image']);
            }
            $this->sql = "DELETE FROM products WHERE id = $id";
            if (mysqli_query($this->link, $this->sql)){
                session_start();
                $_SESSION['message'] = "Product Deleted";
                header('location: action.php?status=manage');
            }else {
                die('Error: '.mysqli_error($this->link));
            }

        }
    }
}