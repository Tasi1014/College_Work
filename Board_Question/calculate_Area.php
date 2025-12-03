<?php

interface CalculateArea {
    public function calculateArea();
}

class Circle implements CalculateArea {
    private $radius;

    public function __construct($radius){
        $this->radius = $radius;
    }

    public function calculateArea(){
        return 3.14 * $this->radius * $this->radius;
    }
}

class Square implements CalculateArea {
    private $side;

    public function __construct($side){
        $this->side = $side;
    }

    public function calculateArea(){
        return $this->side * $this->side;
    }
}

class Triangle implements CalculateArea {
    private $base;
    private $height;

    public function __construct($base, $height){
        $this->base = $base;
        $this->height = $height;
    }

    public function calculateArea(){
        return 0.5 * $this->base * $this->height;
    }
}

// Example usage
$circle = new Circle(5);
$square = new Square(4);
$triangle = new Triangle(10, 6);

echo "Circle Area: " . $circle->calculateArea() . "<br>";
echo "Square Area: " . $square->calculateArea() . "<br>";
echo "Triangle Area: " . $triangle->calculateArea() . "<br>";

?>
