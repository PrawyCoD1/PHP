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
    function checkVar()
    {
        return isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password']);
    }
    session_start();
    $logged = false;
    if (!$logged) {
        $id = 1;
    }
    $db = mysqli_connect("localhost", "root", "", "mojaBaza");
    if ($db->connect_errno) {
        echo 'Database connection error: ' . $db->connect_error;
        exit();
    }
    if (!mysqli_select_db($db, "mojaBaza")) {
        echo "Problem with selecting database!";
        exit();
    }

    if (checkVar()) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        //to prevent from mysqli injection  
        $username = stripcslashes($username);
        $password = stripcslashes($password);
        $username = mysqli_real_escape_string($db, $username);
        $password = mysqli_real_escape_string($db, $password);

        $sql = "select * from uzytkownik where login = '$username' and haslo = '$password'";
        $results = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
        $count = mysqli_num_rows($results);
        if ($count == 1) {
            echo "<h1><center> Login successful, account : $username </center></h1>";
            if ($username == "admin") {
                $id = 2;
            } else {
                $id = 1;
            }
            $logged = true;
        } else {
            echo "<h1> Login failed. Invalid username or password.</h1>";
        }
    }
    $_SESSION['id'] = $id;
    $_SESSION['logged'] = $logged;

    $query = "SELECT * FROM samochody ORDER BY cena ASC LIMIT 5";
    $result = mysqli_query($db, $query);
    ?>
    <?php
    if ($logged) {
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
        while ($row = mysqli_fetch_row($result)) {
            echo "<tr>";
            echo "<td><a href=\"id.php?id=$row[0]\">$row[0]</a></td>";
            echo "<td>$row[1]</td>";
            echo "<td>$row[2]</td>";
            echo "<td>$row[3]</td>";
            echo "<td>$row[4]</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>