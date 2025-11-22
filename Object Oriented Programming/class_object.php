<?php
//class definition
class Car{
    public $color;
    public $model;

    // method
    public function startEngine(){
        return "Engine started for the".$this->model."car.";


    }
}

//object creation (instantiation)

$myCar= new Car();
$yourCar= new Car();

//using the objects

$myCar->color="Red";
$myCar->model="Sedan";

echo $myCar->startEngine(); 

?>