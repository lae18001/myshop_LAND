<?php
    include "product_classes.php";

    if(isset($_POST["sku"])){
        foreach($_POST["sku"] as $sku){
            $sql = "DELETE FROM products WHERE SKU = '".$sku."' ";
            $result = mysqli_query($conn, $sql);
        }
        header("location: index.php");
        exit;
    }
?>