 <?php
 class Book extends Product{ 
        public $weight;

        public function setBook($sku, $name, $price, $weight){
                parent::setProduct($sku, $name, $price);
                $this->weight = $weight; 
        }
        public function getProductInfo(){
            echo "Weight: " . $this->weight . "KG";
        } 
    }