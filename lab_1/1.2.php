<?php
function circleDiameter($radius)
{
    $wynik = $radius ** 2 * pi();
    return "Radius: $wynik";
}

echo circleDiameter(2);