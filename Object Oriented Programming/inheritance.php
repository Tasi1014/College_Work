<?php
class Vehicle{
    public function move(){
        return "The vehicle is moving.";
    }
}

class Truck extends Vehicle{
    public function haul(){
        return "The truck is hauling cargo";
    }
}

$myTruck = new Truck();
echo $myTruck->move();

?>