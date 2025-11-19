<?php

//Defining an array
// $fruits = ["Banana","Mango"];

// $chocolate = ["truffle","Toblerone"];
// //Accessing the first element of the array
// echo $fruits[0]."<br>";
// //accessing the last elements of an array
// echo $fruits[count($fruits)-1] . "<br>";


// //Accessing all array items
// for($i = 0; $i<count($fruits); $i++){
//     echo $fruits[$i] . "<br>";
// }
$students = array(
    array("Jhon", "Doe",20),
    array("Joe", "Smith",22),
    array("Sam", "Brown",19),
);

// echo $students[0][0] . "\t" .$students[0][1] . " is " . $students[0][2] . " years old <br>";
// echo $students[1][0] . "\t" . $students[1][1] . " is " . $students[1][2] . " years old<br>";
// echo $students[2][0] ."\t". $students[2][1] . " is " . $students[2][2] . " years old<br>";


for ($i = 0; $i < count($students); $i++) {
    echo $students[$i][0] . " " . $students[$i][1] . " is " . $students[$i][2] . " years old<br>";
}
?>