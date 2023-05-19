<?php
class allCars{
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
    $allCars = new allCars();
    $database = $allCars->getDb();
    $allCars->selectDatabase();
    $query = 'SELECT * FROM samochody';
    $result = $database->query($query);
    ?>
    <table>
        <tr>
            <td>ID</td>
            <td>Brand</td>
            <td>Model</td>
            <td>Price</td>
            <td>Year</td>
        </tr>
        <?php
        while ($row = $result->fetch_row()) {
            echo "<tr>";
            echo "<td><a href=\"id.php?id=$row[0]\">$row[0]</a></td>";
            echo "<td>$row[1]</td>";
            echo "<td>$row[2]</td>";
            echo "<td>$row[3]</td>";
            echo "<td>$row[4]</td>";
            echo "</tr>";
        }
        ?>
<html>
    <head>
        <title>All cars data</title>
    </head>
        <body>
            </table></br>
            <a href="lab_9.php">Back to homepage</a>
        </body>
</html>