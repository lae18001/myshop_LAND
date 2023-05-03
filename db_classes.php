<?php

//OOP database connection using PDO
    class DBconnection { 
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $datab = "dev_test";

        protected function connect(){
            $dsn = 'mysql=' . $this->servername . ';dbname=' . $this->datab;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        }
    }


    class DB_querie extends DBconnection{
        public function getProducts(){
            $sql = "SELECT * FROM products";
            $stmt = $this->connect()->query($sql);
            while($row = $stmt->fetch()){
                  echo"
                    <div class='col-12 col-lg-3'> 
                        <div class='card' id='$row->sku' style='width: 16rem; height:12rem; margin-bottom: 25px; margin-left: 25px;'>
                            <div class='card-body'>
                                    <input type='checkbox' class='delete-checkbox' name='product_sku[]' value='$row->sku'>
                                    <div class='text-center'>
                                        <h5 class='card-title'>$row->sku</h5>
                                        <h6 class='card-subtitle mb-2 text-muted'>$row->name</h6>
                                        <h6 class='card-subtitle mb-2 text-muted'>$row->price $</h6>
                                        <h6 class='card-subtitle mb-2 text-muted'>---</h6>
                                    </div>
                            </div>
                        </div>
                    </div>";
            }
        }
    }


   //Procedural PHP connection to DB
   /* $servername = "localhost";
    $username = "root";
    $password = "";
    $datab = "dev_test";*/

    /*$servername = "localhost";
    $username = "id20340347_root";
    $password = "TestDevPro_2023";
    $datab = "id20340347_dev_test";*/
    
    // Create connection to DB
    /*$conn = new mysqli($servername, $username, $password, $datab);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "Connection Failed!";
    }*/