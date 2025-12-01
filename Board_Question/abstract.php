<?php
abstract class Employee {
    abstract public function calculateSalary();
}

class FullTimeEmployee extends Employee {
    public function calculateSalary() {
        return 40000; // Fixed salary
    }
}

class PartTimeEmployee extends Employee {
    public function calculateSalary() {
        return 200 * 20; // hourly_rate * hours
    }
}

function showSalary(Employee $e) {
    echo "Salary: " . $e->calculateSalary() . "\n";
}

$fullTime = new FullTimeEmployee();
$partTime = new PartTimeEmployee();

showSalary($fullTime);
showSalary($partTime);

?>
