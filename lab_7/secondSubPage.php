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



