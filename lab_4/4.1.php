<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Formularz</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
function checkVar()
{
    return isset($_POST['submit']) && !empty($_POST['nameSurname']) && !empty($_POST['email']) && isset($_POST['subject']) && !empty($_POST['text']);
}
    function checkNumeric()
    {
        return isset($_POST['phoneNumber']) && is_numeric($_POST['phoneNumber']);
    }
    $nameSurname = '';
    $email = '';
    $subject = '';
    if (checkVar()) {
        $nameSurname = $_POST['nameSurname'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
    }
    ?>

    <FORM name="pierwszy" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <TABLE>
            <TR class="table">
                <TD>Imię i nazwisko *
                    <INPUT name="nameSurname" value='<?php echo $nameSurname ?>'>
                </TD>
            </TR>
            <TR>
                <TD>Adres e-mail *
                    <INPUT name="email" id="data" value='<?php echo $email ?>'>
                </TD>
            </TR>
            <TR class="table">
                <TD>Telefon kontaktowy
                    <INPUT name="phoneNumber" value=''>
                </TD>
            </TR>
            <TR class="table">
                <TD>Wybierz temat *
                    <SELECT name="subject">
                        <OPTION>Wykonanie strony internetowej</OPTION>
                        <OPTION>Inne</OPTION>
                    </SELECT>
                </TD>
            </TR>
            <TR>
                <TD><label class="custom">Treść wiadomości *</label>
                    <TEXTAREA name="text" cols="20" rows="10"> Wpisz tutaj treść swojej wiadomości... </TEXTAREA>
                </TD>
            </TR>
            <TR>
                <TD><label class="custom">Preferowana forma kontaktu</label><br>
                    <div class="checkbox">
                        <input TYPE="checkbox" name="phone">
                        <label for="phone">E-mail</label><br>
                        <input TYPE="checkbox" name="mail">
                        <label for="mail">Telefon</label>
                </TD>
                </div>
            </TR>
            <TR>
                <TD><label class="custom">Posiadasz już stronę www?</label><br>
                    <div class="radio">
                        <input type="radio" name="yes">
                        <label for="yes">Tak</label><br>
                        <input type="radio" name="no">
                        <label for="no">Nie</label>
                </TD>
                </div>
            </TR>
            <TR>
    <TD class="custom"><label for="attachements">Załączniki:</label></TD>
</TR>
<TR>
    <TD class="custom"><input type="file" name="attachements" /></TD>
</TR>
<TR>
    <TD class="send"><INPUT type="submit" name="submit" value="Wyślij formularz"></TD>
</TR>
<?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if(checkVar()) {
                    echo "Formularz wysłany!";
                } else {
                    echo "Błędne dane! Pola są puste!<BR>";
                }
            }

?>
</body>
</html>