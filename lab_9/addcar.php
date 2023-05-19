<?php
class addCar
{
  private $db;

  function checkVar()
  {
    return isset($_POST['brand']) && isset($_POST['model']) && isset($_POST['price']) && isset($_POST['year']) && isset($_POST['desc']);
  }

  public function __construct()
  {
    $this->db = new mysqli("localhost", "root", "", "mojaBaza");
    if ($this->db->connect_errno) {
      echo 'Database connection error: ' . $this->db->connect_error;
      exit();
    }
  }

  public function selectDatabase()
  {
    if (!$this->db->select_db("mojaBaza")) {
      echo "Problem with selecting database!";
      exit();
    }
  }

  function addCar()
  {
    if ($this->checkVar()) {
      $brand = $this->db->real_escape_string($_POST['brand']);
      $model = $this->db->real_escape_string($_POST['model']);
      $price = $this->db->real_escape_string($_POST['price']);
      $year = $this->db->real_escape_string($_POST['year']);
      $desc = $this->db->real_escape_string($_POST['desc']);
    } else {
      echo 'Missing required input fields.';
      return;
    }

    $id = $_SESSION["id"];

    // Prepared statement
    $query = "INSERT INTO samochody (marka, model, cena, rok, opis, id_uzytkownik) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param("ssdiss", $brand, $model, $price, $year, $desc, $id);

    if ($stmt->execute()) {
      echo 'Added a new car to the database';
    } else {
      echo 'Error while adding a car to the database: ' . $stmt->error;
    }
  }
}

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $car = new addCar();
  $car->addCar();
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

      <button type="submit">Add car</button><br><br>
      <a href="lab_9.php">Back to homepage</a>
    </form>
  </body>
</html>
