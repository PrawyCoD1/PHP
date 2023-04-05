<?php
$file = file("ips.txt");
$ip = $_SERVER['REMOTE_ADDR'];
if(in_array($ip, $file)) {
    include 'VIP.php';
}
else {
    include 'Guest.php';
}
?>
