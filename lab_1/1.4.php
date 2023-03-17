<?php
function getDateOfBirthFromPesel($pesel) {
    $year = substr($pesel, 0, 2); //output: 99
    $month = substr($pesel, 2, 2); // output: 10
    $day = substr($pesel, 4, 2); // output: 18

    if ($month == "81" || $month == "01") { //year between 1800 and 1899
        $month = "01";
        $year = "19" . $year;
    } elseif ($month > 80 && $month < 93) { // year between 1800-1899
        $year = "18" . $year;
        $month -= 80;
    } elseif ($month > 0 && $month < 13) { // year between 1900-1999
        $year = "19" . $year;
    } elseif ($month > 20 && $month < 33) { // year between 2000-2099
        $year = "20" . $year;
        $month -= 20;
    } elseif ($month > 40 && $month < 53) { // year between 2100-2199
        $year = "21" . $year;
        $month -= 40;
    } elseif ($month > 60 && $month < 73) { // year between 2200-2299
        $year = "22" . $year;
        $month -= 60;
    }

    $day = sprintf("%02d", $day);
    $month = sprintf("%02d", $month);

    $dateOfBirth = $day . "-" . $month . "-" . $year;

    return $dateOfBirth;
}

echo getDateOfBirthFromPesel("09210546970");