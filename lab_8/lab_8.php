<html>
    <head>
    <title>Database in php</title>
    </head>
    <body>
    <a href="allCars.php"> All cars</a></br>
    <a href="addcar.php"> Add car</a>
        <?php
            $db = mysqli_connect("localhost", "root", "", "mojaBaza");
            if ($db->connect_errno) {
                echo 'Database connection error: ' . $db->connect_error;
                exit();
            }
            if(!mysqli_select_db($db, "mojaBaza")){
                echo "Problem with selecting database!";
                exit;
            }
            $query = "SELECT * FROM samochody ORDER BY cena ASC LIMIT 5";
            $result = mysqli_query($db, $query);
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
            while($row = mysqli_fetch_row($result)){
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