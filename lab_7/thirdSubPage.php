<html>

<head>
    <title> Third sub-page </title>
</head>

<body>
    <h1>Summary:</h1>
    <?php
        session_start();
        $num = (int)$_SESSION['numOfPeople'];
        $names = $_POST["names"];
        $pesels = $_POST["pesels"];
        $addresses = $_POST["addresses"];
        $cards = $_POST["cards"];
        $ordererName = $_SESSION["nameSurname"];
        $ordererPesel = $_SESSION["pesel"];
        $ordererAddress = $_SESSION["address"];
        $ordererCard = $_SESSION["cardNumber"];
        echo "<h2>Orderer details: "."</h2>
        Name and Surname: ".$ordererName."</br>
        Pesel: ".$ordererPesel."</br>
        Address: ".$ordererAddress."</br>
        Card number: ".$ordererCard;
        for($i = 0; $i < $num; $i++) {
            echo "<h2>Person ".($i + 1)."</h2>
            Name and Surname: ". ($names[$i])."</br>
            Pesel: ". ($pesels[$i])."</br>
            Address: ". ($addresses[$i])."</br>
            Card number: ". ($cards[$i]);
        }
    ?>
</body>

</html>
