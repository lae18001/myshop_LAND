 <?php
    class Furniture extends Product{ 
        public $width;
        public $height;
        public $length;

        public function setFurniture($sku, $name, $price, $height, $width, $length){
                parent::setProduct($sku, $name, $price);
                $this->height = $height; 
                $this->width = $width; 
                $this->length = $length; 
        }

        public function getProductInfo(){
            echo "Dimension:" . $this->height. "X" . $this->width. "X". $this->length;
        }
    
    }