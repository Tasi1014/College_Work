<?php
$str = "Tasi";

$reverse = "";

for($i = strlen($str)-1 ; $i>=0; $i--){
    $reverse .= $str[$i];
}

echo "The reversed string is $reverse";

?>