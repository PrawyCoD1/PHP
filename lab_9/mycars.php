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
    if ($id == 2) {
        header("Location: mycarsadm.php");
    }

    $query = "SELECT * FROM samochody WHERE id_uzytkownik = '$id'";
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
        </tr>
        <?php
        while ($row = $result2->fetch_array()) {
            echo "<tr>";
            echo "<td>$row[0]</td>";
            echo "<td>$row[1]</td>";
            echo "<td>$row[2]</td>";
            echo "<td>$row[3]</td>";
            echo "<td>$row[4]</td>";;
            echo "<input type='hidden' name='id' value='$row[0]'>";
            echo "</form>";
            echo "</tr>";
        }
        ?>
    </table></br>
    <a href="lab_9.php">Back to homepage</a>
</body>
</html>