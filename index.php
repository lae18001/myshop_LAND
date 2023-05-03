<?php
    include "autoloader.php";

    //sql request from DB
    /*$sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if(!$result){
        die("Invalid Query: " .$conn->connect_error);
    }*/
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
                        <li> <a role="button" class="btn btn-success" href="add_product.php">ADD</a></li>
                        <li> <button type="submit" class="btn btn-danger" name="delete-product-btn" id="delete-product-btn" >MASS DELETE</button></li>
                    </ul>
                </div>
                <hr>
            </div>
        </div>
        <div class="container-lg my-5">
            <div class="row">
                <?php 

                    $testObj = new DataBase;
                    $testObj->getProducts();
                    //------------reads data from DB row by row, and displays it with associated key/property names--------------
                    //while($row =  mysqli_fetch_all($result)){
                   /* while($row = mysqli_fetch_assoc($result)){
                        $product = unserialize( $row['Product']);
                        //if($product instanceof DVD){
                            echo"
                            <div class='col-12 col-lg-3'> 
                                <div class='card' id='$product->sku' style='width: 16rem; height:12rem; margin-bottom: 25px; margin-left: 25px;'>
                                    <div class='card-body'>
                                            <input type='checkbox' class='delete-checkbox' name='product_sku[]' value='$product->sku'>
                                            <div class='text-center'>
                                                <h5 class='card-title'>$product->sku</h5>
                                                <h6 class='card-subtitle mb-2 text-muted'>$product->name</h6>
                                                <h6 class='card-subtitle mb-2 text-muted'>$product->price $</h6>
                                                <h6 class='card-subtitle mb-2 text-muted'>$product->getProductInfo()</h6>
                                            </div>
                                    </div>
                                </div>
                            </div>";
                        }*/
                       /* if($product instanceof Book){
                            echo"
                            <div class='col-12 col-lg-3'>
                                <div class='card' id='$product->sku' style='width: 16rem; height:12rem; margin-bottom: 25px; margin-left: 25px;'>
                                    <div class='card-body'>
                                        
                                        <input type='checkbox' class='delete-checkbox' name='product_sku[]' value='$product->sku'>
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
                                <div class='card' id='$product->sku' style='width: 16rem; height:12rem; margin-bottom: 25px; margin-left: 25px;'>
                                    <div class='card-body'>
                                        <input type='checkbox' class='delete-checkbox' name='product_sku[]' value='$product->sku'>
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
                    }*/
                ?>
            </div>
        </div>
        <script type="text/javascript">
            //------------deleting multiple products using checkbox----------------
           $(document).ready(function(){
            $('#delete-product-btn').click(function(){
                var sku = [];
                $(':checkbox:checked').each(function(i){
                    sku[i]=$(this).val();
                });
                if(sku.length > 0){
                    $.ajax({
                    url:'delete_product.php',
                    method: 'POST',
                    data: {sku:sku},
                    success: function(){
                        for(var i=0; i<sku.length; i++){
                            $('div#'+sku[i]+'').remove();
                        }
                        location.reload();
                    }
                    });
                }
            });
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

    