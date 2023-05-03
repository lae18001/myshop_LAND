<?php
     class DataBase extends DB_connection{
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
