<?php

function dice_simulation($numOfThrows){
    $arr = array();
    for($i = 0; $i < $numOfThrows; $i++){
        $arr[$i] = rand(1, 6);
        echo "\n$arr[$i]";
    }
}
$numOfThrows = 3;
echo dice_simulation($numOfThrows);