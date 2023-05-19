<?php
$cookie_name = "counter";
$cookie_visit_name = "visited";

if (!isset($_COOKIE[$cookie_name])) {
    $counter = 0;
} else {
    $counter = $_COOKIE[$cookie_name];
}

if (!isset($_COOKIE[$cookie_visit_name])) {
    $counter++;
    setcookie($cookie_visit_name, "true");
    setcookie($cookie_name, $counter);
}

echo "Visits: " . $counter;
?>