<?php
class Animal {
    public function makeSound(){
        return "Generic animal sound";
    }
}

class Dog extends Animal{
    //overriding the parents method

    public function makeSound(){
        return "Woof!Woof!";
    }
}

$myDog = new Dog();
echo $myDog -> makeSound();
?>