<?php
class ID{
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
$id = $_GET['id'];
$getID = new ID();
$database = $getID->getDb();
$getID->selectDatabase();
$query = "SELECT * FROM samochody WHERE id = $id";
$result = $database->query($query);
    ?>
    <table>
        <tr>
            <td>ID</td>
            <td>Brand</td>
            <td>Model</td>
            <td>Price</td>
            <td>Year</td>
            <td>Description</td>
        </tr>
        <?php
        while ($row = $result->fetch_row()) {
            echo "<tr>";
            echo "<td>$row[0] </td>";
            echo "<td>$row[1] </td>";
            echo "<td>$row[2] </td>";
            echo "<td>$row[3] </td>";
            echo "<td>$row[4] </td>";
            echo "<td>$row[5]</td>";
            echo "</tr>";
        }
        ?>
        <html>

<head>
    <title>Data for car with id <?php echo $_GET['id'] ?></title>
</head>
    <body>
    </table>
        <a href="lab_9.php">Back to homepage</a>
    </body>
</html>