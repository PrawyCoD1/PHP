<html>

<head>
    <title>My cars data</title>
</head>

<body>
    <?php
    session_start();
    $id = $_SESSION['id'];
    if ($id == 2) {
        header("Location: mycarsadm.php");
    }
    echo $id;
    $connect = mysqli_connect("localhost", "root", "", "mojaBaza");
    $mojaBaza = mysqli_select_db($connect, "mojaBaza");

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $price = $_POST['price'];
        $year = $_POST['year'];

        $query = "UPDATE samochody SET marka='$brand', model='$model', cena='$price', rok='$year' WHERE id=$id";
        $result = mysqli_query($connect, $query);
        if ($result) {
            echo "Data updated successfully.";
        } else {
            echo "Error: " . mysqli_error($connect);
        }
    }

    $query = "SELECT * FROM samochody  WHERE id_uzytkownik = '" . $id . "'";
    $zapytanie = mysqli_query($connect, $query);
    ?>

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
        while ($row = mysqli_fetch_row($zapytanie)) {
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