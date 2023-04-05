<?php

$file_path = "links.txt";
$file = file($file_path);

foreach ($file as $link) {
  // Split the link into its address and description
  $link_parts = explode(";", $link);
  $address = $link_parts[0];
  $description = $link_parts[1];

  echo "<li><a href=\"$address\">$address</a> => $description</li>\n";
}
?>
