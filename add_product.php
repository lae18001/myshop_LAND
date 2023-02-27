<?php
    include "product_classes.php"
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
                        <li> <input type="submit" form="product_form" id="save" name="Save" value="SAVE"></li>
                        <li> <input type="button" onclick="location.href='index.php'; return false;" value="CANCEL"></li>
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
                    <form method="POST" id="product_form">   
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label" for="sku">SKU</label>
                            <div class="col-sm-6">
                               <input type="text" id="sku" name="SKU" value="<?= htmlentities($sku) ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label" for="name">Name</label>
                            <div class="col-sm-6">
                                <input type="text" id="name" name="Name" value="<?= htmlentities($name) ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-6 col-form-label" for="price">Price($)</label>
                            <div class="col-sm-6">
                             <input type="text" id="price" name="Price" value="<?= htmlentities($price) ?>">
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
                </div>
            </div>
        </div>
        <script>
             function typeDisplay(id_type) {
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