<html>
<head>
<title>Data for car with id <?php echo $_GET['id']?></title>
</head>
<body>
    <?php
    $id = $_GET['id'];
    $db = mysqli_connect("localhost", "root", "", "mojaBaza");
    $db = mysqli_select_db($connect, "mojaBaza");
    $query = "SELECT * FROM samochody WHERE id = $id";
    $result = mysqli_query($connect, $query);
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
    </table>
    <?php
    while ($row = mysqli_fetch_row($result)) {
        echo "<tr>";
        echo "<td>$row[0] </td>";
        echo "<td>$row[1] </td>";
        echo "<td>$row[2] </td>";
        echo "<td>$row[3] </td>";
        echo "<td>$row[4] </td>";
        echo "<td>$row[5]</td>";
        echo "</tr>";
    }
    ?></br>
    <a href="lab_8.php">Back to homepage</a>
</body>

</html>