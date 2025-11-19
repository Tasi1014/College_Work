<!-- Associative Array -->

<?php
// $associcativeArray = array(
//     "name" => "Tasi",
//     "age" => 20,
//     "city" => "Kathmandu"
// );
// echo $associcativeArray['name']."<br>" ;
// echo $associcativeArray['age']."<br>";
// echo $associcativeArray['city']."<br>";

// $associcativeArray['email'] = "sherpajack3@gmail.com";
// echo "<pre>";
// print_r($associcativeArray);

$arr = [1,2,3,4,5];

foreach($arr as $key => $value){
    echo $key. " => ".$value."<br>";
}

// echo "<pre>";
// print_r($arr);
$multiDimensionalArray = array(
    array(
        "name" => "Tasi",
        "age" => 20
    ),
    array(
        "name" => "Tasi",
        "age" => 20
    ),
    array(
        "name" => "Tasi",
        "age" => 20
    )
);

echo "<pre>";
print_r($multiDimensionalArray);

// Accessing items in 2d array

// echo $multiDimensionalArray[0]['name'];


// Accessing array item using for each loop

foreach ($multiDimensionalArray as $key => $value) {
    echo $key;
    print_r($value);
}








?>