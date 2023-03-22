<?php
function nationality($country){
    $arr = array("Poland" => "Poles", "India" => "Indian", "Ireland" => "Irish");
    return $arr[$country];
}
$country = "India";
echo nationality($country);
?>