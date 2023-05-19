<<<<<<< HEAD
<?php session_start();?>

<html>
    <head>
        <title> Second sub-page </title>
    </head>
    <body>
    <form method="post" action="secondSubPage.php">
        <li>    
        <?php
    $numOfPeople = $_SESSION["numOfPeople"];

    if(isset($numOfPeople) && $numOfPeople >= 3){
        for($i = 0; $i < $numOfPeople; $i++){
            echo "Person" . $i . "</br>
            Name and Surname: <input type=\"text\" name=\"names[]\"> </br>";
        }
    }
    ?></li>
            <input type="submit" value="Next page" name="submit"/>
        </form>
    </body>
</html>
<?php
if(isset($_POST['submit'])) {
$names = $_POST["names"];
echo $names[1];
}
?>



=======
<html>

<head>
    <title> Second sub-page </title>
</head>

<body>
    <form method="post" action="thirdSubPage.php">
            <?php
            session_start();
            $_SESSION["nameSurname"] = $_POST["nameSurname"];
            $_SESSION["pesel"] = $_POST["pesel"];
            $_SESSION["address"] = $_POST["address"];
            $_SESSION["cardNumber"] = $_POST["cardNumber"];
            $_SESSION["numOfPeople"] = $_POST["numOfPeople"];
            $numOfPeople = $_SESSION["numOfPeople"];

            if (isset($numOfPeople) && $numOfPeople >= 3) {
                for ($i = 1; $i <= $numOfPeople; $i++) {
                    echo "<h1>Person" . $i . "</h1>
            <h2>Name and Surname:</h2> <input type=\"text\" name=\"names[]\" pattern=\"[a-zA-Z]+[ ][a-zA-Z]+\" title=\"Between name and surname should be space\" required/>
            <h2>Pesel:</h2> <input type=\"text\" name=\"pesels[]\" maxlength=\"11\" pattern=\"[0-9]{11}\" title=\"Pesel number should have 11 digits from 0 to 9!\" required/>
            <h2>Address:</h2> <input type=\"text\" name=\"addresses[]\" required/>
            <h2>Card number:</h2> <input type=\"text\" name=\"cards[]\" maxlength=\"16\" pattern=\"[0-9]{16}\" title=\"Card number should have 16 digits from 0 to 9!\" required/>";
                }
            }
            ?>
        <input type="submit" value="Next page" name="submit"/>
    </form>
</body>
</html>
>>>>>>> dfcd1ef14a722cb74a4b0e3845fd56e25f734f48
