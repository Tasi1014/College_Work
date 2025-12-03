<?php

class Employees {

    private $name;
    private $designation;
    private $salary;

    public function setName($name){
        $this->name = $name;
    }

    public function setDesignation($designation){
        $this->designation = $designation;
    }

    public function setSalary($salary){
        $this->salary = $salary;
    }

    public function getName(){
        return $this->name;
    }

    public function getDesignation(){
        return $this->designation;
    }

    public function getSalary(){
        return $this->salary;
    }
}

$e1 = new Employees();
$e1->setName("Tashi");
$e1->setDesignation("Full stack developer");
$e1->setSalary(100000);

echo "Name: " . $e1->getName() . "<br>";
echo "Designation: " . $e1->getDesignation() . "<br>";
echo "Salary: " . $e1->getSalary() . "<br>";

?>
