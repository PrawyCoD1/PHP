<html>
    <head>
    <title>My cars data</title>
    </head>
    <body>
        <?php
        session_start();
            $id = $_SESSION['id'];
            echo $id;
            $connect = mysqli_connect("localhost", "root", "", "mojaBaza");
            $mojaBaza = mysqli_select_db($connect, "mojaBaza");
            $query = "SELECT * FROM samochody  WHERE id_uzytkownik = '".$id."'";
            $zapytanie = mysqli_query($connect, $query);
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
            while($row = mysqli_fetch_row($zapytanie)){
                echo "<tr>";
                echo "<td><a href=\"id.php?id=$row[0]\">$row[0]</a></td>";
                echo "<td>$row[1]</td>";
                echo "<td>$row[2]</td>";
                echo "<td>$row[3]</td>";
                echo "<td>$row[4]</td>";
                echo "</tr>";
            }
            
            ?>
        </table></br>
        <a href="lab_9.php">Back to homepage</a>

    </body>
</html>