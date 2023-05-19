<?php
$cookie_name = "counter";

if(!isset($_COOKIE[$cookie_name])) {
    $counter = 0;
} else {
    $counter = $_COOKIE[$cookie_name];
}

$counter++;

setcookie($cookie_name, $counter);

if($counter == 35) {
    echo "Welcome back for the 35th time!";
} elseif($counter == 100) {
    echo "You've been here hundred times!";
} else {
    echo "This is your " . $counter . ". visit to this page.";
}
?>