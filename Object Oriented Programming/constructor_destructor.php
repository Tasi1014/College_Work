<?php
class Product{
    public $name;
    public $price;

    //constructor: runs when a new product is created

    public function __construct($name, $price){
        $this->name= $name;
        $this->price=$price;

        echo "Product ** {$this->name} ** created.\n";
    }

    //Destructor:runs when the object is destroyed

    public function __destruct(){
        echo "Product ** {$this->name} ** destroyed.\n";

    }
}

$laptop= new Product("Laptop", 1200);
?>