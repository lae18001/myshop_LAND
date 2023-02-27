<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $datab = "dev_test";

    /*$servername = "localhost";
    $username = "id20340347_root";
    $password = "TestDevPro_2023";
    $datab = "id20340347_dev_test";*/
    
    // Create connection to DB
    $conn = new mysqli($servername, $username, $password, $datab);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "Connection Failed!";
    }
    
    class Product{
        public $sku;
        public $name;
        public $price;

        public function setProduct($sku, $name, $price){
            $this->sku = $sku;
            $this->name = $name;
            $this->price = $price;
        }
        public function getSKU(){
            echo $this->sku;
        } 
        public function getName(){
            echo $this->name;
        } 
        public function getPrice(){
            echo $this->price;
        }
    }

    class DVD extends Product{ 
        public $size;

        public function setDVD($sku, $name, $price, $size){
                parent::setProduct($sku, $name, $price);
                $this->size = $size;
        }

        public function getSize(){
            echo $this->size;
        }
    }

    class Book extends Product{ 
        public $weight;

        public function setBook($sku, $name, $price, $weight){
                parent::setProduct($sku, $name, $price);
                $this->weight = $weight; 
        }
        public function getWeight(){
            echo $this->weight;
        } 
    }

    class Furniture extends Product{ 
        public $width;
        public $height;
        public $length;

        public function setFurniture($sku, $name, $price, $height, $width, $length){
                parent::setProduct($sku, $name, $price);
                $this->height = $height; 
                $this->width = $width; 
                $this->length = $length; 
        }

        public function getHeight(){
            echo $this->height;
        }
        public function getWidth(){
            echo $this->width;
        }
        public function getLength(){
            echo $this->length;
        }
        public function getDimensions(){
            echo $this->height. "X" . $this->width. "X". $this->length;
        }
    
    }

    $sku = "";
    $name = "";
    $price = "";
    $p_type = "";
    $size = "";
    $weight = "";
    $height = "";
    $width = "";
    $length = "";

    $errorMsg = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $sku = $_POST["SKU"];
        $name = $_POST["Name"];
        $price = $_POST["Price"];
        $p_type = $_POST["ProductType"];
        $size = $_POST["Size"];
        $weight = $_POST["Weight"];
        $height = $_POST["Height"];
        $width = $_POST["Width"];
        $length = $_POST["Length"];

        do{
            //checks if any given input field is empty, if it is, display the error message.
            //should be checking for the ProductType specific attribute fields as well...TO DO!
            if(empty($sku) || empty($name) || empty($price) || empty($p_type)){
                $errorMsg = "Please, submit required data!";
                break;
            }

            //checks for entered user inputs,and according to product type, creates a new object instance to add to database
            if(isset($_POST["SKU"]) && isset($_POST["Name"]) && isset($_POST["Price"]) && isset($_POST["ProductType"])){
                if($_POST["ProductType"] == "DVD" && isset($_POST["Size"])){
                    $product = new DVD;
                    $product->setDVD($sku, $name, $price, $size);
                    $newProduct = serialize($product);
                    //print_r($newProduct);
                    $sql = "INSERT INTO products (SKU, Product) VALUES('$sku','$newProduct')";
                    $result = $conn->query($sql);
                    if(!$result){
                        $errorMsg = "Invalid query: " . $conn->error;
                        break;
                    }
                    header("location: /myshop_LAND/index.php");
                    exit;
                }
                if($_POST["ProductType"] == "Book" && isset($_POST["Weight"])){
                    $product = new Book;
                    $product->setBook($sku, $name, $price, $weight);
                    $newProduct = serialize($product);
                    //print_r($newProduct);
                    $sql = "INSERT INTO products (SKU, Product) VALUES('$sku','$newProduct')";
                    $result = $conn->query($sql);
                    if(!$result){
                        $errorMsg = "Invalid query: " . $conn->error;
                        break;
                    }
                    header("location: /myshop_LAND/index.php");
                    exit;
                }
                if($_POST["ProductType"] == "Furniture" && isset($_POST["Height"]) && isset($_POST["Width"]) && isset($_POST["Length"])){
                    $product = new Furniture;
                    $product->setFurniture($sku, $name, $price, $height, $width, $length);
                    $newProduct = serialize($product);
                    //print_r($newProduct);
                    $sql = "INSERT INTO products (SKU, Product) VALUES('$sku','$newProduct')";
                    $result = $conn->query($sql);
                    if(!$result){
                        $errorMsg = "Invalid query: " . $conn->error;
                        break;
                    }
                    header("location: /myshop_LAND/index.php");
                    exit;
                }
            }

            $sku = "";
            $name = "";
            $price = "";
            $p_type = "";
            $size = "";
            $weight = "";
            $height = "";
            $width = "";
            $length = "";

        }while(false);  
    }
?>