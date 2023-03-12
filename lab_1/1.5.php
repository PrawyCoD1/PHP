<!DOCTYPE html>
<html>
<head>
	<title>Kalkulator pól powierzchni</title>
</head>
<body>
	<h1>Kalkulator pól powierzchni</h1>
	<form method="post" action="1.5.php">
		<label>Wybierz figurę:</label>
		<select name="figura">
			<option value="trojkat">Trójkąt</option>
			<option value="prostokat">Prostokąt</option>
			<option value="trapez">Trapez</option>
		</select>
		<input type="submit" value="Wybierz">
	</form>
 
	<?php
	function poleTrojkata($a, $h) {
		$wynik = 0.5 * $a * $h;
		return $wynik;
	}
 
	function poleProstokata($a, $b) {
		$wynik = $a * $b;
		return $wynik;
	}
 
	function poleTrapezu($a, $b, $h) {
		$wynik = 0.5 * ($a + $b) * $h;
		return $wynik;
	}
 
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["figura"])) {
		$figura = $_POST["figura"];
 
		switch ($figura) {
			case "trojkat":
				echo '<form method="post" action="1.5.php">';
				echo '<label>Długość boku a:</label>';
				echo '<input type="text" name="a"><br>';
				echo '<label>Wysokość:</label>';
				echo '<input type="text" name="h"><br><br>';
				echo '<input type="hidden" name="figura" value="trojkat">';
				echo '<input type="submit" value="Oblicz">';
				echo '</form>';
 
				if (isset($_POST["a"]) && isset($_POST["h"])) {
					$a = $_POST["a"];
					$h = $_POST["h"];
					$wynik = poleTrojkata($a, $h);
					echo "<p>Pole trójkąta wynosi: $wynik</p>";
				}
				break;
			case "prostokat":
				echo '<form method="post" action="1.5.php">';
				echo '<label>Długość boku a:</label>';
				echo '<input type="text" name="a"><br>';
				echo '<label>Długość boku b:</label>';
				echo '<input type="text" name="b"><br><br>';
				echo '<input type="hidden" name="figura" value="prostokat">';
				echo '<input type="submit" value="Oblicz">';
				echo '</form>';
 
				if (isset($_POST["a"]) && isset($_POST["b"])) {
					$a = $_POST["a"];
					$b = $_POST["b"];
					$wynik = poleProstokata($a, $b);
					echo "<p>Pole prostokąta wynosi: $wynik</p>";
				}
				break;
			case "trapez":
                echo '<form method="post" action="1.5.php">';
                echo '<label>Długość boku a:</label>';
                echo '<input type="text" name="a"><br>';
                echo '<label>Długość boku b:</label>';
                echo '<input type="text" name="b"><br>';
                echo '<label>Wysokość:</label>';
                echo '<input type="text" name="h"><br><br>';
                echo '<input type="hidden" name="figura" value="trapez">';
                echo '<input type="submit" value="Oblicz">';
                echo '</form>';
                if (isset($_POST["a"]) && isset($_POST["b"]) && isset($_POST["h"])) {
                    $a = $_POST["a"];
                    $b = $_POST["b"];
                    $h = $_POST["h"];
                    $wynik = poleTrapezu($a, $b, $h);
                    echo "<p>Pole trapezu wynosi: $wynik</p>";
                }
                break;
            default:
                echo "<p>Nie wybrano figury.</p>";
                break;
        }
    }
    ?>
