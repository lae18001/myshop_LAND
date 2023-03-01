<?php
    /*$servername = "localhost";
    $username = "root";
    $password = "";
    $datab = "dev_test";*/

    $servername = "localhost";
    $username = "id20340347_root";
    $password = "TestDevPro_2023";
    $datab = "id20340347_dev_test";
    
    // Create connection to DB
    $conn = new mysqli($servername, $username, $password, $datab);
    // Check connection
    if ($conn->connect_error) {
        die(" Connection failed: " . $conn->connect_error);
        echo "Connection Failed!";
    }

    if(isset($_POST["sku"])){
        foreach($_POST["sku"] as $sku){
            $sql = "DELETE FROM products WHERE SKU = '".$sku."' ";
            $result = mysqli_query($conn, $sql);
        }
        header("location: index.php");
        exit;
    }
?>