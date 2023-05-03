<?php

    //database connection using PDO
    class DB_connection { 
        private $servername = "localhost";
        private $username = "root";
        private $password = " ";
        private $datab = "dev_test";

        protected function connect(){
            $dsn = 'mysql=' . $this->servername . ';dbname=' . $this->datab;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
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

    