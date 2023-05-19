<?php
class Database
{
    private $db;
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
    public function checkVar()
    {
        return isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password']);
    }

    public function loginUser()
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        //to prevent from mysqli injection  
        $username = stripcslashes($username);
        $password = stripcslashes($password);
        $username = $this->db->real_escape_string($username);
        $password = $this->db->real_escape_string($password);

        $sql = "SELECT * FROM uzytkownik WHERE login = '$username' AND haslo = '$password'";
        $results = $this->db->query($sql);
        $count = $results->num_rows;
        if ($count == 1) {
            echo "<h1><center> Login successful, account : $username </center></h1>";
            if ($username == "admin") {
                $_SESSION['id'] = 2;
            } else {
                $_SESSION['id'] = 1;
            }
            $_SESSION['logged'] = true;
        } else {
            echo "<h1> Login failed. Invalid username or password.</h1>";
        }
    }
    public function getCarData()
    {
        $query = "SELECT * FROM samochody ORDER BY cena ASC LIMIT 5";
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function closeConnection()
    {
        $this->db->close();
    }
}

session_start();
$_SESSION['logged'] = false;
if (!$_SESSION['logged']) {
    $_SESSION['id'] = 1;
}
$database = new Database();
$database->selectDatabase();

if ($database->checkVar()) {
    $database->loginUser();
}
$results = $database->getCarData();
?>
<html>

<head>
    <title>Database in php</title>
</head>

<body>
    <form method="post">
        <label>Username:</label>
        <input type="text" name="username"><br>

        <label>Password:</label>
        <input type="password" name="password"><br>

        <input type="submit" name="submit" value="Log In">
    </form>
    <?php
    if ($_SESSION['logged']) {
        echo '<a href="mycars.php"> My cars</a> </br>';
    }
    echo  '<a href="allCars.php"> All cars</a></br>';
    echo '<a href="addcar.php"> Add car</a></br>';
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
        foreach ($results as $row) {
            echo "<tr>";
            echo "<td><a href=\"id.php?id=" . $row['id'] . "\">" . $row['id'] . "</a></td>";
            echo "<td>" . $row['marka'] . "</td>";
            echo "<td>" . $row['model'] . "</td>";
            echo "<td>" . $row['cena'] . "</td>";
            echo "<td>" . $row['rok'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>