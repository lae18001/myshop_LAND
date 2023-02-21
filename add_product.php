<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $datab = "dev_test";
    
    // Create connection to DB
    $conn = new mysqli($servername, $username, $password, $datab);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "Connection Failed!";
    }
    abstract class Product{
        private $sku;
        private $name;
        private $price;

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
        private $size;

        public function setDVD($sku, $name, $price, $size){
                parent::setProduct($sku, $name, $price);
                $this->size = $size;
        }

        public function getProductInfo(){
            echo $this->size;
        }
    }

    class Book extends Product{ 
        private $weight;

        public function setBook($sku, $name, $price, $weight){
                parent::setProduct($sku, $name, $price);
                $this->weight = $weight; 
        }
        public function getWeight(){
            echo $this->weight;
        } 
    }

    class Furniture extends Product{ 
        private $width;
        private $height;
        private $length;

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
    
    
        if(isset($_POST["SKU"]) && isset($_POST["Name"]) && isset($_POST["Price"]) && isset($_POST["ProductType"])){
            if($_POST["ProductType"] == "DVD" && isset($_POST["Size"])){
                $product = new DVD;
                $product->setDVD($sku, $name, $price, $size);
                //$myJson = json_encode($product);

                //$sql = "INSERT INTO products (Object) VALUES('$myJson')";
                $sql = "INSERT INTO productinfo (SKU, Name, Price, ProductType, Size) VALUES('$sku', '$name', '$price', '$p_type', '$size')";
                $result = $conn->query($sql);
                //echo $product->getSKU();
                echo "PHP got values: " . $_POST['SKU'] . ", " . $_POST['Name']. ", " . $_POST['Price']. ", " . $_POST['ProductType']. ", " . $_POST['Size']; 
            }
            if($_POST["ProductType"] == "Book" && isset($_POST["Weight"])){
                $product = new Book;
                $product->setBook($sku, $name, $price, $weight);

                $sql = "INSERT INTO productinfo (SKU, Name, Price, ProductType, Weight) VALUES('$sku', '$name', '$price', '$p_type', '$weight')";
                $result = $conn->query($sql);
                echo "PHP got values: " . $_POST['SKU'] . ", " . $_POST['Name']. ", " . $_POST['Price']. ", " . $_POST['ProductType']. ", " . $_POST['Weight']; 
            }
            if($_POST["ProductType"] == "Furniture" && isset($_POST["Height"]) && isset($_POST["Width"]) && isset($_POST["Length"])){
                $product = new Furniture;
                $product->setFurniture($sku, $name, $price, $height, $width, $length);

                $sql = "INSERT INTO productinfo (SKU, Name, Price, ProductType, Height, Width, Length) VALUES('$sku', '$name', '$price', '$p_type', '$height', '$width', '$length')";
                $result = $conn->query($sql);
                echo "PHP got values: " . $_POST['SKU'] . ", " . $_POST['Name']. ", " . $_POST['Price']. ", " . $_POST['ProductType']. ", " . $_POST['Height']. "X" . $_POST['Width']. "X" . $_POST['Length']; 
            }
        }
        
        do{
            if(empty($sku) || empty($name) || empty($price)){
                $errorMsg = "Please, submit required data!";
                break;
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

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="styling2.css">
        <title>Product Add</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    </head>
    <body>
        <div class="container-lg my-5">
            <div class="row">
                <div class="col-6">
                    <h2>Product Add</h2>
                </div>
                <div class="col-6">
                    <ul>
                       <!--  <li> <a class="btn btn-success" role="button" type="submit" form="product_form" name="Save-btn" value="SAVE">SAVE</a></li>
                         <li> <a class="btn btn-danger" role="button" id="" href="index.php">CANCEL</a></li>-->
                        <li> <input type="submit" form="product_form" id="save-btn" name="Save-btn" value="SAVE"></li>
                        <li> <a class="btn btn-danger" role="button" onclick="location.href='index.php'; return false;">CANCEL</a></li>
                        <!--<li> <input type="button" onclick="location.href='index.php'; return false;" value="CANCEL"></li>-->
                    </ul>
                </div>
                <hr>
            </div>
            
        </div>
        <div class="container-lg my-5">
            <?php
                if(!empty($errorMsg)){
                    echo"
                    <div class='alert alert-warning alert-dissmissable fade show' role='alert'>
                        <strong>$errorMsg</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>"; 
                }
            ?>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <!--<form method="POST" id="product_form" action="send.php">-->
                    <form method="POST" id="product_form">   
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label" for="sku">SKU</label>
                            <div class="col-sm-6">
                               <input type="text" id="sku" name="SKU" value="<?= htmlentities($sku) ?>">
                               <!--  <input type="text" id="sku" name="SKU">
                                <span class="validity"></span>-->
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label" for="name">Name</label>
                            <div class="col-sm-6">
                                <input type="text" id="name" name="Name" value="<?= htmlentities($name) ?>">
                                <!--   <input type="text" id="name" name="Name">
                                <span class="validity"></span>-->
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label" for="price">Price($)</label>
                            <div class="col-sm-6">
                             <input type="text" id="price" name="Price" value="<?= htmlentities($price) ?>">
                                <!--   <input type="text" id="price" name="Price">
                                <span class="validity"></span>-->
                            </div>
                        </div>
                        
                        <div class=" row mb-3">
                            <label class="col-sm-6 col-form-label" for="productType">Type Switcher</label>
                            <div class="col-6">
                                <select class="productType" id="productType" name="ProductType">
                                    <option value="" >--Select product type--</option>
                                    <option value="DVD" id="DVD">DVD</option>
                                    <option value="Book" id="Book">Book</option>
                                    <option value="Furniture" id="Furniture">Furniture</option>
                                </select>
                            </div>
                        </div>

                        <div id="DVD_disp" class="row mb-3">
                            <label class="col-sm-6 col-form-label" for="size">Size(MB)</label>
                            <div class="col-6">
                               <input type="text" id="size" name="Size" value="<?= htmlentities($size) ?>">
                               <!--  <input type="text" id="size" name="Size">
                                <span class="validity"></span>-->
                            </div>
                            <span class="form-text text-muted">Please, provide size</span>
                        </div>

                        <div id="Book_disp" class="row mb-3">
                            <label class="col-sm-6 col-form-label" for="weight">Weight(KG)</label>
                            <div class="col-6">
                                <input type="text" id="weight" name="Weight" value="<?= htmlentities($weight) ?>">
                            </div>
                            <span class="form-text text-muted">Please, provide weight</span>
                        </div>

                        <div id="Furniture_disp" class=" row mb-3">
                            <label class="col-sm-6 col-form-label" for="height">Height(CM)</label>
                            <div class="col-6">
                                <input type="text" id="height" name="Height" value="<?= htmlentities($height) ?>">
                            </div>
                            <label class="col-sm-6 col-form-label" for="width">Width(CM)</label>
                            <div class="col-6">
                                <input type="text" id="width" name="Width" value="<?= htmlentities($width) ?>">
                            </div>
                            <label class="col-sm-6 col-form-label" for="length">Length(CM)</label>
                            <div class="col-6">
                                <input type="text" id="length" name="Length" value="<?= htmlentities($length) ?>">
                            </div>
                            <span class="form-text text-muted">Please, provide dimensions</span>
                        </div>
                    </form>
                    <pre>
                        $_POST:
                        <?php
                            print_r($_POST);
                        ?>
                    </pre>
                </div>
            </div>
        </div>
        <script>
             function typeDisplay(id_type) {
                //console.log(id_type);
                let x = document.getElementById(id_type);
                if (x.style.display === "flex") {
                    x.style.display = "none";
                } else {
                    x.style.display = "flex";
                }
            }

            const selectElement = document.querySelector('.productType');
            selectElement.addEventListener('change', (event) => {
                typeDisplay(`${event.target.value}_disp`);
            });

        </script>
        <footer>
            <div class="container-lg my-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <hr>
                        <h6>Scandiweb Test assignment</h6>
                    </div>
                </div>
            </div>
        </footer>
    
    </body>
</html>