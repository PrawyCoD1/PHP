<!DOCTYPE html>
<html>
<head>
	<title>Calculate the date of Easter</title>
</head>
<body>
	<h1>Calculate the date of Easter</h1>
	<form method="post">
		<label for="year">Enter year:</label>
		<input type="number" id="year" name="year" required>
		<button type="submit">Calculate</button>
	</form>

	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$year = $_POST['year'];

			if ($year < 1) {
				echo "Invalid year";
				return;
			} elseif ($year <= 1582) {
				$x = 15;
				$y = 6;
			} elseif ($year <= 1699) {
				$x = 22;
				$y = 2;
			} elseif ($year <= 1799) {
				$x = 23;
				$y = 3;
			} elseif ($year <= 1899) {
				$x = 23;
				$y = 4;
			} elseif ($year <= 2099) {
				$x = 24;
				$y = 5;
			} elseif ($year <= 2199) {
				$x = 24;
				$y = 6;
			} else {
				echo "Invalid year";
				return;
			}

			$a = $year % 19;
			$b = $year % 4;
			$c = $year % 7;
			$d = (19 * $a + $x) % 30;
            $f = (2 * $b + 4 * $c + 6 * $d + $y) % 7;
    
            if ($f == 6 && $d == 29) {
                $easterDate = new DateTime("$year-04-26");
            } elseif ($f == 6 && $d == 28 && ((11 * $x + 11) % 30 < 19)) {
                $easterDate = new DateTime("$year-04-18");
            } elseif ($d + $f < 10) {
                $easterDate = new DateTime("$year-03-" . (22 + $d + $f));
            } else {
                $easterDate = new DateTime("$year-04-" . ($d + $f - 9));
            }
            
            echo "Easter for $year is on " . $easterDate->format('F j, Y');
		}
	?>
</body>
</html>