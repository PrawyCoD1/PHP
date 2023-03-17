<?php
function isPrime($num)
{
    if ($num <= 1) {
        echo "$num isn't a prime number";
        return 0;
    }

    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) {
            echo "$num isn't a prime number";
            return false;
        }
    }
        return "$num is a prime number";
}
$num = 12;
echo isPrime($num);