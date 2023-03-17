<?php
function tableOfMultiplication($sideOfSquare)
{
    $randNum = rand(1, 10);
    for ($i = 1; $i <= $sideOfSquare; $i++) {
        for ($j = 1; $j <= $sideOfSquare; $j++) {
           echo "\n",$i*$j;
        }
        echo "</br>"; 
    }
}
$sideOfSquare = 10;
echo tableOfMultiplication($sideOfSquare);
