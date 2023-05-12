<?php
session_start();
if (isset($_POST['brand']) && isset($_POST['model']) && isset($_POST['price']) && isset($_POST['year']) && isset($_POST['desc'])) {
  $db = mysqli_connect("localhost", "root", "", "mojaBaza");
  $brand = $db->real_escape_string($_POST['brand']);
  $model = $db->real_escape_string($_POST['model']);
  $price = $db->real_escape_string($_POST['price']);
  $year = $db->real_escape_string($_POST['year']);
  $desc = $db->real_escape_string($_POST['desc']);
  $id = $_SESSION["id"];

  $query = "INSERT INTO samochody (marka, model, cena, rok, opis, id_uzytkownik) VALUES ('$brand', '$model', $price, '$year', '$desc', '$id')";
  if ($db->query($query)) {
    echo 'Added a new car to the database';
  } else {
    echo 'Error while adding a car to the database: ' . $db->error;
  }
}
?>
<html>

<head>
  <title>Add a new car</title>
  <h1>Add a new car</h1>
</head>

<body>
  <form method="POST" action="addcar.php">
    <label>Brand:</label>
    <input type="text" name="brand" required><br>

    <label>Model:</label>
    <input type="text" name="model" required><br>

    <label>Price:</label>
    <input type="number" name="price" required><br>

    <label>Year:</label>
    <input type="number" name="year" required><br>

    <label>Description:</label>
    <textarea name="desc"></textarea><br>

    <button type="submit">Add car</button></br></br>
    <a href="lab_9.php">Back to homepage</a>
  </form>
</body>

</html>