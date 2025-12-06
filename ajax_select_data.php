<?php
$countries = [
    "Nepal" => ["ktm","BHKT","LPT"],
    "India" => ["Delhi","Hyderabad","Banglore"],
    "USA" => ["NYC","LA","SF"]
];

$country = $_GET['country'] ?? "";

if ($country === "" || !isset($countries[$country])) {
    exit; 
}

echo json_encode($countries[$country]);


?>