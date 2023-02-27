<?php
    include "product_classes.php";

    //sql request from DB
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if(!$result){
        die("Invalid Query: " .$conn->connect_error);
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	    <link rel="stylesheet" href="styling.css">
        <title>Product List</title>

    </head>
    <body>
        <div class="container-lg my-5">
            <div class="row">
                <div class="col-6">
                    <h2>Product List</h2>
                </div>
                <div class="col-6">
                    <ul>
                    <!--<li> <a class="btn btn-success" role="button" href="add_product.php">ADD</a></li>
                        <li> <a class="btn btn-danger" role="button" id="delete-product-btn" href="#" onclick="removeProduct();">MASS DELETE</a></li>-->
                        <li> <input type="button" onclick="location.href='add_product.php'; return false;" value="ADD"></li>
                        <li> <input type="submit" id="delete-product-btn" form="delete-prod" value="MASS DELETE"></li>
                        <!--
                            “MASS DELETE” action, implemented as checkboxes next to each product 
                            (should have a class: .delete-checkbox) 
                            and a button “MASS DELETE” triggering delete action for the selected products.
                        -->
                    </ul>
                </div>
                <hr>
            </div>
        </div>
        <div class="container-lg my-5">
            <div class="row">
                <?php 
                    //reads data from DB by row, and displays it with associated key names
                    while($row = mysqli_fetch_assoc($result)){
                        $product = unserialize( $row['Product']);
                        if($product instanceof DVD){
                            echo"
                            <div class='col-12 col-lg-3'>
                                <div class='card' style='width: 16rem; height:12rem; margin-bottom: 25px; margin-left: 25px;'>
                                    <div class='card-body'>
                                        <form method='post' id='delete_prod'>
                                        <input type='checkbox' class='delete-checkbox' name='chk_id[]' value='$product->sku'>
                                        </form>
                                        <div class='text-center'>
                                            <h5 class='card-title'>$product->sku</h5>
                                            <h6 class='card-subtitle mb-2 text-muted'>$product->name</h6>
                                            <h6 class='card-subtitle mb-2 text-muted'>$product->price $</h6>
                                            <h6 class='card-subtitle mb-2 text-muted'>Size: $product->size MB</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        }
                        if($product instanceof Book){
                            echo"
                            <div class='col-12 col-lg-3'>
                                <div class='card' style='width: 16rem; height:12rem; margin-bottom: 25px; margin-left: 25px;'>
                                    <div class='card-body'>
                                        <form method='post' id='delete_prod'>
                                        <input type='checkbox' class='delete-checkbox' name='chk_id[]'value='$product->sku'>
                                        </form>
                                        <div class='text-center'>
                                            <h5 class='card-title'>$product->sku</h5>
                                            <h6 class='card-subtitle mb-2 text-muted'>$product->name</h6>
                                            <h6 class='card-subtitle mb-2 text-muted'>$product->price $</h6>
                                            <h6 class='card-subtitle mb-2 text-muted'>Weight: $product->weight KG</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        }
                        if($product instanceof Furniture){
                            echo"
                            <div class='col-12 col-lg-3'>
                                <div class='card' style='width: 16rem; height:12rem; margin-bottom: 25px; margin-left: 25px;'>
                                    <div class='card-body'>
                                        <form method='post' id='delete_prod'>
                                        <input type='checkbox' class='delete-checkbox' name='chk_id[]'value='$product->sku'>
                                        </form>
                                        <div class='text-center'>
                                            <h5 class='card-title'>$product->sku</h5>
                                            <h6 class='card-subtitle mb-2 text-muted'>$product->name</h6>
                                            <h6 class='card-subtitle mb-2 text-muted'>$product->price $</h6>
                                            <h6 class='card-subtitle mb-2 text-muted'>Dimension: $product->height X $product->width X $product->length</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        }
                    }
             
                ?>
            </div>
        </div>
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

    