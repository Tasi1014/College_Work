<?php
function divide($a,$b){
    //throw a custom exception object if a condition is not met
    if($b===0){
        throw new Exception("Division by zero is not allowed.");
    }
    return $a/$b;
}

try{
    //code that might fail
    echo divide (10,2)."\n";
     echo divide (10,0)."\n"; //this line throws an exception

    echo "This line will not execute."; //this line is skipped
} catch (Exception $e){
    //code to handle the exception
    "Error caught :". $e->getMessage()."\n";
}

//Execution continues after the catch block
echo "Program continues running.";
?>