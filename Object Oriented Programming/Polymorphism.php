<?php
//define an interface (the common type)
interface shape{
    public function calculateArea();
}

//class 1 implements the interface

class circle implements shape{
    public $radius=5;

    public function calculateArea(){
        return M_PI *$this-> radius * $this->radius;    //Pi*r^2
    }
}
 //class 2 implements the interface

 class square implements shape{
    public $side=4;
    public function calculateArea(){
        return $this->side * $this-> side;
    }
 }
 function printArea (shape $shape){
    echo "Area ".$shape-> calculateArea()."\n";
 }

 $circle = new Circle();
 $sqaure= new Square();

 printArea($circle);
 printArea($sqaure);

 ?>