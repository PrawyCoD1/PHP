<html>
	<head>
		<title>Date of Birth Form</title>
	</head>
	<body>
		<form method="GET">
			<label for="dob">Date of Birth:</label>
			<input type="date" name="dob" value="2002-07-16">
			<input type="submit" value="Submit">
		</form>
		<?php
			if (isset($_GET['dob'])) {
				$dob = $_GET['dob'];
				echo "<p>You were born on " . getDayOfWeek($dob) . ".</p>";
				echo "<p>You are " . getAge($dob) . " years old.</p>";
				echo "<p>There are " . getDaysToNextBirthday($dob) . " days until your next birthday.</p>";
			}

			function getDayOfWeek($dob) {
				return date('l', strtotime($dob));
			}

			function getAge($dob) {
				$bornYear = date("Y", strtotime($dob));
				$currentYear = date("Y");
				$age = $currentYear - $bornYear;
				return $age;
			}

			function getDaysToNextBirthday($dob) {
				$birthday = date('jS F', strtotime($dob)); //Outputs only day and month in a format for example: 16th July
				$currentDate = time(); //currentDate in seconds
				$nextBirthday = round(abs(strtotime($birthday) - $currentDate) / 86400);
				return $nextBirthday;
			}
		?>
	</body>
</html>