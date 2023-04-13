<html>
    <head>
        <title> 7.1 </title>
    </head>
    <body>
        <form method="post" action ="secondSubPage.php">
        <li>Name and surname * <input type="text" name="nameSurname" required/></li>
        <li>Pesel * <input type="text" name="pesel" pattern="[0-9]{11}" maxlength="11" title="Pesel number should have 11 digits from 0 to 9!" required/></li>
        <li>Address * <input type="text" name="address" required/></li>
        <li>Card number * <input type="text" name="cardNumber" pattern="[0-9]{16}" maxlength="16" title="Card number should have 16 digits from 0 to 9!" required/></li>
        <li>Number of people * <input type="number" name="numOfPeople" min="1" max="10"></li>
        <input type="submit" value="Next page" name="submit"/>
        </form>
    </body>
</html>

<?php
    session_start();
?>