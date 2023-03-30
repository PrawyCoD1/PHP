<?php

// Funkcje obliczające podstawowe działania matematyczne
function sum($a, $b) {
    return $a + $b;
}

function subtract($a, $b) {
    return $a - $b;
}

function multiply($a, $b) {
    return $a * $b;
}

function divide($a, $b) {
    if ($b == 0) {
        return "Nie można dzielić przez zero!";
    } else {
        return $a / $b;
    }
}

// Funkcje obliczające funkcje zaawansowane
function calc_cosinus($kat) {
    return cos($kat);
}

function calc_sinus($kat) {
    return sin($kat);
}

function calc_tangens($kat) {
    return tan($kat);
}

function bin_to_dec($liczba) {
    return bindec($liczba);
}

function dec_to_bin($liczba) {
    return decbin($liczba);
}

function dec_to_hex($liczba) {
    return dechex($liczba);
}

function hex_to_dec($liczba) {
    return hexdec($liczba);
}

function degrees_to_radians($kat) {
    return deg2rad($kat);
}

function radians_to_degrees($kat) {
    return rad2deg($kat);
}

// Sprawdzenie, czy formularz został wysłany
if (isset($_POST['submit'])) {
    $dzialanie = $_POST['dzialanie'];
    $liczba1 = $_POST['liczba1'];
    $liczba2 = $_POST['liczba2'];
    $wynik = '';

    // Wywołanie odpowiedniej funkcji w zależności od wybranego działania
    switch ($dzialanie) {
        case 'Dodawanie':
            $wynik = sum($liczba1, $liczba2);
            break;
        case 'Odejmowanie':
            $wynik = subtract($liczba1, $liczba2);
            break;
        case 'Mnożenie':
            $wynik = multiply($liczba1, $liczba2);
            break;
        case 'Dzielenie':
            $wynik = divide($liczba1, $liczba2);
            break;
        case 'Cosinus':
            $wynik = calc_cosinus($liczba1);
            break;
        case 'Sinus':
            $wynik = calc_sinus($liczba1);
            break;
        case 'Tangens':
            $wynik = calc_tangens($liczba1);
            break;
        case 'Binarne na dziesiętne':
            $wynik = bin_to_dec($liczba1);
            break;
            case 'Dziesiętne na binarne':
                $wynik = dec_to_bin($liczba1);
                break;
            case 'Dziesiętne na szesnastkowe':
                $wynik = dec_to_hex($liczba1);
                break;
            case 'Szesnastkowe na dziesiętne':
                $wynik = hex_to_dec($liczba1);
                break;
            case 'Stopnie na radiany':
                $wynik = degrees_to_radians($liczba1);
                break;
            case 'Radiany na stopnie':
                $wynik = radians_to_degrees($liczba1);
                break;
            default:
                $wynik = "Nieznane działanie!";
                break;
        }
    }
    ?>
    
    <!DOCTYPE html>
    <html>
    <head>
        <title>Kalkulator</title>
    </head>
    <body>
        <h1>Kalkulator</h1>
        <form method="post" action="">
            <p>
                <label for="dzialanie">Działanie:</label>
                <select name="dzialanie" id="dzialanie">
                    <option value="Dodawanie">Dodawanie</option>
                    <option value="Odejmowanie">Odejmowanie</option>
                    <option value="Mnożenie">Mnożenie</option>
                    <option value="Dzielenie">Dzielenie</option>
                    <option value="Cosinus">Cosinus</option>
                    <option value="Sinus">Sinus</option>
                    <option value="Tangens">Tangens</option>
                    <option value="Binarne na dziesiętne">Binarne na dziesiętne</option>
                    <option value="Dziesiętne na binarne">Dziesiętne na binarne</option>
                    <option value="Dziesiętne na szesnastkowe">Dziesiętne na szesnastkowe</option>
                    <option value="Szesnastkowe na dziesiętne">Szesnastkowe na dziesiętne</option>
                    <option value="Stopnie na radiany">Stopnie na radiany</option>
                    <option value="Radiany na stopnie">Radiany na stopnie</option>
                </select>
            </p>
            <p>
                <label for="liczba1">Liczba 1:</label>
                <input type="text" name="liczba1" id="liczba1">
            </p>
            <p>
                <label for="liczba2">Liczba 2:</label>
                <input type="text" name="liczba2" id="liczba2">
            </p>
            <p>
                <input type="submit" name="submit" value="Oblicz">
            </p>
        </form>
        <?php
        // Wyświetlenie wyniku obliczeń
        if (isset($_POST['submit'])) {
            echo "<p>Wynik: " . $wynik . "</p>";
        }
        ?>
    </body>
    </html>