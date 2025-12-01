<?php

interface Vehicle {
    public function startEngine();
}

class Car implements Vehicle {
    public function startEngine() {
        echo "Car engine started with key.\n";
    }
}

class Bike implements Vehicle {
    public function startEngine() {
        echo "Bike engine started with self-start.\n";
    }
}

function startAnyVehicle(Vehicle $v) {
    $v->startEngine();
}

$car = new Car();
$bike = new Bike();

startAnyVehicle($car);
startAnyVehicle($bike);

?>
