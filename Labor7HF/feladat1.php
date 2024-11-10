<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $szam1 = $_POST['szam1'];
    $szam2 = $_POST['szam2'];
    $muv = $_POST['muv'];

    if (!isset($_COOKIE['veletlenszam'])) {
        $veletlenszam = rand(1, 100);
        setcookie('veletlenszam', $veletlenszam, time() + 3600);
        echo "<p>A szerver gondolt egy véletlenszámra, amit elmentettünk a sütiben. Próbáld meg kitalálni!</p>";
    } else {
        $veletlenszam = $_COOKIE['veletlenszam'];
    }

    if (($szam1&&$szam2) == $veletlenszam) {
        echo "<p>Gratulálok! Eltaláltad a számot: $veletlenszam</p>";
        $veletlenszam = rand(1, 100);
        setcookie('veletlenszam', $veletlenszam, time() + 3600);
    }

    if ($muv == "/" && $szam2 == 0) {
        echo "<p style='color:red;'>Hiba: Nullával való osztás nem értelmezhető!</p>";
    } else {
        switch ($muv) {
            case "+":
                $eredmeny = $szam1 + $szam2;
                break;
            case "-":
                $eredmeny = $szam1 - $szam2;
                break;
            case "*":
                $eredmeny = $szam1 * $szam2;
                break;
            case "/":
                $eredmeny = $szam1 / $szam2;
                break;
            default:
                $eredmeny = "Ismeretlen művelet";
        }
        echo "<p>Eredmény: $szam1 $muv $szam2 = $eredmeny</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Egyszerű számológép és véletlenszám</title>
</head>
<body>
<h1>Egyszerű számológép sütivel</h1>
<p>A szerver gondolt egy véletlenszámra, amit elmentett sütiben. Próbáld meg kitalálni!</p>

<form method="POST" action="">
    <label>Az első szám:</label>
    <input type="number" name="szam1" required><br><br>

    <label>A második szám:</label>
    <input type="number" name="szam2" required><br><br>

    <label>Műveleti jel:</label>
    <select name="muv" required>
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select><br><br>

    <input type="submit" name="elkuld" value="Számol">
</form>
</body>
</html>
