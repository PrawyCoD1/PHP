<?php
$arr = array(rand(0, 15));

$biggestNum = 0;
foreach ($arr as $number) {
    if ($number > $biggestNum)
        $biggestNum = $number;
}
echo "\n$biggestNum";

for ($i = 1; $i < sizeOf($arr); $i++) {
    if ($arr[$i] > $biggestNum)
        $biggestNum = $arr[$i];
}
echo "\n$biggestNum";

$i = 1;
while ($i < sizeOf($arr)) {
    if ($arr[$i] > $biggestNum)
        $biggestNum = $arr[$i];

    $i++;
}
echo "\n$biggestNum";

$biggestNum = 0;
$i = 0;
do {
    if ($arr[$i] > $biggestNum)
        $biggestNum = $arr[$i];
    $i++;
    echo "\n$biggestNum";
} while ($i < sizeOf($arr));
