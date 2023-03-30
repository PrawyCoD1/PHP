<?php
function factorial($a){
	$factorial = 1;
	for($i = 1; $i<=$a; $i++){
		$result = $factorial * $i;
	}
	return $result;
}

function factorialRecursive($a){
	if($a>=1)
		return $a * factorialRecursive($a-1);
	else
		return 1;
}

$a = 2;

// Measure the performance of both functions
$nonRecursiveStart = microtime(true);
$nonRecursiveResult = factorial($a);
$nonRecursiveEnd = microtime(true);
$nonRecursiveTime = $nonRecursiveEnd - $nonRecursiveStart;

$recursiveStart = microtime(true);
$recursiveResult = factorialRecursive($a);
$recursiveEnd = microtime(true);
$recursiveTime = $recursiveEnd - $recursiveStart;

// Display the results and time taken by each function
echo "Non-recursive function result: " . $nonRecursiveResult . "<br>";
echo "Time taken by non-recursive function: " . $nonRecursiveTime . " seconds<br>";
echo "Recursive function result: " . $recursiveResult . "<br>";
echo "Time taken by recursive function: " . $recursiveTime . " seconds<br>";

// Compare the performance of both functions and display the faster one
if ($nonRecursiveTime < $recursiveTime) { 
  echo "Recursive function was faster.\n";
}elseif ($nonRecursiveTime == $recursiveTime){
	echo "Both are the same";
}else{
  echo "Non-recursive function was faster.\n";
}
?>