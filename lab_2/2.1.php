<?php
function arrayOfNums($index){
    $arr = array();
    for($i = 0; $i<=$index; $i++){
        $arr[$i] = rand();
    }
    return $arr[$index];
}
$index = 1;
echo "Index: $index <br>", "Num: ",arrayOfNums($index);