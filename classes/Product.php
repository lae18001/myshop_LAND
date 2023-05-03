 <?php
 abstract class Product{
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
        abstract public function getProductInfo();
    }

      /*$product1 = new DVD;
    $product2 = new Book;
    $product3 = new Furniture;*/

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
            //-------checks if any given input field is empty, if it is, display the error message.-----------
            if(empty($sku) || empty($name) || empty($price) || empty($p_type)){
                $errorMsg = "Please, submit required data!";
                break;
            }

            //-----------checks for entered user inputs,and according to product type, creates a new object instance to add to database------boilerplate!!!
            if(isset($_POST["SKU"]) && isset($_POST["Name"]) && isset($_POST["Price"]) && isset($_POST["ProductType"])){
                if(!empty($size)){
                    if(!is_numeric($size) || !is_numeric($price)){
                        $errorMsg = "Please, provide the data of indicated type";
                        break;
                    }
                    $product = new DVD;
                    $product->setDVD($sku, $name, $price, $size);
                    $newProduct = serialize($product);
                    
                    $sql = "INSERT INTO products (SKU, Product) VALUES('$sku','$newProduct')";
                    $result = $conn->query($sql);
                    if(!$result){
                        $errorMsg = "Invalid query: " . $conn->error;
                        break;
                    }
                    header("location: index.php");
                    exit;
                   
                }
                else if(!empty($weight)){
                    if(!is_numeric($weight) || !is_numeric($price)){
                        $errorMsg = "Please, provide the data of indicated type";
                        break;
                    }
                    $product = new Book;
                    $product->setBook($sku, $name, $price, $weight);
                    $newProduct = serialize($product);
                    
                    $sql = "INSERT INTO products (SKU, Product) VALUES('$sku','$newProduct')";
                    $result = $conn->query($sql);
                    if(!$result){
                        $errorMsg = "Invalid query: " . $conn->error;
                        break;
                    }
                    header("location: index.php");
                    exit;
                }
                else if(!empty($height) && !empty($width) && !empty($length)){
                    if(!is_numeric($height) || !is_numeric($width) || !is_numeric($length) || !is_numeric($price)){
                        $errorMsg = "Please, provide the data of indicated type";
                        break;
                    }
                    $product = new Furniture;
                    $product->setFurniture($sku, $name, $price, $height, $width, $length);
                    $newProduct = serialize($product);

                    $sql = "INSERT INTO products (SKU, Product) VALUES('$sku','$newProduct')";
                    $result = $conn->query($sql);
                    if(!$result){
                        $errorMsg = "Invalid query: " . $conn->error;
                        break;
                    }
                    header("location: index.php");
                    exit;
                }
                else{
                    $errorMsg = "Please, submit required data";
                    break;
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