<?php
class MyCars{
    private $db;

    public function __construct(){
        $this->db = new mysqli("localhost", "root", "", "mojaBaza");
        if ($this->db->connect_errno) {
            echo 'Database connection error: ' . $this->db->connect_error;
            exit();
        }
    }

    public function selectDatabase(){
        if (!$this->db->select_db("mojaBaza")) {
            echo "Problem with selecting database!";
            exit();
        }
    }

    public function updateCarData(){
        if (isset($_POST['submit'])) {
            $_SESSION['id'] = $_POST['id'];
            $_SESSION['brand'] = $_POST['brand'];
            $_SESSION['MODEL'] = $_POST['model'];
            $_SESSION['price'] = $_POST['price'];
            $_SESSION['price'] = $_POST['year'];

            $id = $_SESSION['id'];
            $brand = $_SESSION['brand'];
            $model = $_SESSION['model'];
            $price = $_SESSION['price'];
            $year = $_SESSION['year'];

            $query = "UPDATE samochody SET marka='$brand', model='$model', cena='$price', rok='$year' WHERE id=$id";
            $result = $this->db->query($query);
            if ($result) {
                echo "Data updated successfully.";
            } else {
                echo "Error: " . $this->db->error;
            }
        }
    }

    public function getDB()
    {
        return $this->db;
    }
}

    session_start();
    $id = $_SESSION['id'];
    $myCars = new MyCars();
    $database = $myCars->getDb();
    $myCars->selectDatabase();

    $query = "SELECT * FROM samochody";
    $result2 = $database->query($query);
    ?>

    <html>
<head>
    <title>My cars data</title>
</head>
<body>
    <table>
        <tr>
            <td>ID</td>
            <td>Brand</td>
            <td>Model</td>
            <td>Price</td>
            <td>Year</td>
            <td>Edit</td>
        </tr>
        <?php
        while ($row = $result2->fetch_array()) {
            echo "<tr>";
            echo "<form method='post'>";
            echo "<td>$row[0]</td>";
            echo "<td><input type='text' name='brand' value='$row[1]'></td>";
            echo "<td><input type='text' name='model' value='$row[2]'></td>";
            echo "<td><input type='text' name='price' value='$row[3]'></td>";
            echo "<td><input type='text' name='year' value='$row[4]'></td>";
            echo "<td><input type='submit' name='submit' value='Update'></td>";
            echo "<input type='hidden' name='id' value='$row[0]'>";
            echo "</form>";
            echo "</tr>";
        }
        ?>
    </table></br>
    <a href="lab_9.php">Back to homepage</a>
</body>
</html>