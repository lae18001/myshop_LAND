<?php
    class DVD extends Product{ 
        public $size;

        public function setDVD($sku, $name, $price, $size){
                parent::setProduct($sku, $name, $price);
                $this->size = $size;
        }

        public function getProductInfo(){
            echo "Size: ". $this->size . "MB";
        }
    } 
?>