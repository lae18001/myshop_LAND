
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
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
                        <li> <a class="btn btn-success" role="button" href="add_product.php">ADD</a></li>
                        <li> <a class="btn btn-danger" role="button" id="delete-product-btn" href="#">MASS DELETE</a></li>
                    </ul>
                </div>
                <hr>
            </div>
        </div>
        <div class="container-lg my-5">
            <div class="row">
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
                    //sql request from DB
                    $sql = "SELECT * FROM productinfo";
                    $result = $conn->query($sql);

                    if(!$result){
                        die("Invalid Query: " .$conn->connect_error);
                    }
                    //read data for each row, display it with associated column name
                    //should print out the product object, depending on the product type 
                    while($row = $result->fetch_assoc()){
                        echo"
                        <div class='col-12 col-lg-3'>
                            <div class='card' style='width: 16rem; height:12rem; margin-bottom: 25px; margin-left: 25px;'>
                                <div class='card-body'>
                                    <input type='checkbox' class='delete-checkbox'>
                                    <div class='text-center'>
                                        <h5 class='card-title'>$row[SKU]</h5>
                                        <h6 class='card-subtitle mb-2 text-muted'>$row[Name]</h6>
                                        <h6 class='card-subtitle mb-2 text-muted'>$row[Price] $</h6>
                                        <h6 class='card-subtitle mb-2 text-muted'>$row[ProductType]</h6>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>";
                    }

                    //sql request from DB
                   /* $sql = "SELECT * FROM products";
                    $result = $conn->query($sql);

                    if(!$result){
                        die("Invalid Query: " .$conn->connect_error);
                    }
                    //read data for each row, display it with associated column name
                    //should print out the product object, depending on the product type 
                    while($row = $result->fetch_assoc()){
                        echo"
                        <div class='col-12 col-lg-3'>
                            <div class='card' style='width: 16rem; height:12rem; margin-bottom: 25px; margin-left: 25px;'>
                                <div class='card-body'>
                                    <input type='checkbox' class='delete-checkbox'>
                                    <div class='text-center'>
                                        <h5 class='card-title'>$row[SKU]</h5>
                                        <h6 class='card-subtitle mb-2 text-muted'>$row[Name]</h6>
                                        <h6 class='card-subtitle mb-2 text-muted'>$row[Price] $</h6>
                                        <h6 class='card-subtitle mb-2 text-muted'>$row[ProductType]</h6>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>";
                    }*/
                ?>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
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

    