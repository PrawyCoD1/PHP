<!DOCTYPE html>
<html>
<head>
	<title>PESEL Decoder</title>
</head>
<body>
	<h2>PESEL Decoder</h2>
	<form method="post" action="">
		<label>PESEL:</label>
		<input type="text" name="pesel"><br><br>
		<input type="submit" name="submit" value="Submit">
	</form>
	<br>
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$pesel = $_POST["pesel"];
		if (strlen($pesel) == 11) {
			$year = substr($pesel, 0, 2);
			$month = substr($pesel, 2, 2);
			$day = substr($pesel, 4, 2);
			$gender = substr($pesel, 9, 1);

			if ($gender % 2 == 0) {
				$gender = "Female";
			} else {
				$gender = "Male";
			}

			if ($month >= 81 && $month <= 92) {
				$year += 1800;
				$month -= 80;
			} elseif ($month >= 1 && $month <= 12) {
				$year += 1900;
			} elseif ($month >= 21 && $month <= 32) {
				$year += 2000;
				$month -= 20;
			} elseif ($month >= 41 && $month <= 52) {
				$year += 2100;
				$month -= 40;
			} elseif ($month >= 61 && $month <= 72) {
				$year += 2200;
				$month -= 60;
			}

			$birthdate = sprintf("%02d-%02d-%d", $day, $month, $year);

			echo "<p>Date of Birth: ".$birthdate."</p>";
			echo "<p>Gender: ".$gender."</p>";
		} else {
			echo "<p>PESEL should be exactly 11 characters long</p>";
		}
	}
	?>
</body>
</html>