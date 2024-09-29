<?php
//Feladat1
echo "<strong>Feladat 1</strong><br>";

$tomb = ([5, '5', '05', 12.3, '16.7', 'five', 'true', 0xDECAFBAD, '10e200']);

for ($i = 0; $i < count($tomb); $i++) {
    echo "Típus: " . gettype($tomb[$i]);

    if (is_numeric($tomb[$i])) {

        echo ' - Igen<br>';
    } else {
        echo ' - Nem<br>';
    }

}
echo "<br>";


//Feladat2
echo "<strong>Feladat 2</strong><br>";

$masodpercek = 52336;

if (is_int($masodpercek)) {
    $orak = floor($masodpercek / 3600);
    $percek = floor(($masodpercek % 3600) / 60);
    $masodperc = $masodpercek % 60;

    echo "<strong>$masodpercek másodperc</strong> átváltva: <br>";
    echo "<strong>$orak óra</strong>, <strong>$percek perc</strong> és <strong>$masodperc másodperc</strong>.";
} else {
    echo "<strong>Hibás adat:</strong> Kérjük, egész számot adjon meg!";
}
echo "<br>";
//Feladat3
echo "<br>";
echo "<strong>Feladat 3</strong><br>";

$elsoErtek = 5;
$masodikErtek = 8;

$osszeadas = $elsoErtek + $masodikErtek;
echo "$elsoErtek+$masodikErtek=$osszeadas<br>";

$kivonas = $elsoErtek - $masodikErtek;
echo "$elsoErtek-$masodikErtek=$kivonas<br>";

$szorzas = $elsoErtek * $masodikErtek;
echo "$elsoErtek*$masodikErtek=$szorzas<br>";

$osztas = $elsoErtek / $masodikErtek;
echo "$elsoErtek/$masodikErtek=$osztas<br>";

$hatvany = $elsoErtek ^ $masodikErtek;
echo "$elsoErtek^$masodikErtek=$hatvany<br>";

echo "<br>";
//Feladat4
echo "<strong>Feladat 4</strong><br>";

$sakkTabla = <<<SakkTabla
|██| . |██|<br>
| .. |██| .. |<br>
|██| . |██|<br>
SakkTabla;
echo $sakkTabla;

echo "<br>";
//Feladat5
echo "<strong>Feladat 5</strong><br>";

$szam1 = 4;
$szam2 = 7;
$muvelet = '/';
echo "Szam1: $szam1<br> Szam2: $szam2<br> Művelet: $muvelet<br>";
switch ($muvelet) {
    case '+':
        echo "Eredmény: " . ($szam1 + $szam2) . '<br>';
        break;
    case '-':
        echo "Eredmény: " . ($szam1 - $szam2) . '<br>';
        break;
    case '*':
        echo "Eredmény: " . ($szam1 * $szam2) . '<br>';
        break;
    case '/':
        if ($szam2 == 0) {
            echo "Hiba történt számoláskor, 0-val való osztás nem lehet!<br>";
        } else {
            echo "Eredmény: " . ($szam1 / $szam2) . '<br>';
        }
        break;
    default:
        echo "Hiba történt számoláskor, érvénytelen műveleti jel!<br>";
        break;
}

echo "<br>";
//Feladat6
echo "<strong>Feladat 6</strong><br>";

//If megoldás: 
echo "If megoldása: <br>";
$honap = "Valami";
echo "Válassz egy hónapot, hogy melyik évszakban van! Helyesírásra figyelj oda! Megadott forma: 'Március'<br> Választott hónap: $honap<br>";

if ($honap == "Január" || $honap == "Február" || $honap == "December") {
    echo "Évszak: Tél<br>";
} elseif ($honap == "Március" || $honap == "Április" || $honap == "Május") {
    echo "Évszak: Tavasz<br>";
} elseif ($honap == "Június" || $honap == "Július" || $honap == "Augusztus") {
    echo "Évszak: Nyár<br>";
} elseif ($honap == "Szeptember" || $honap == "Október" || $honap == "November") {
    echo "Évszak: Ősz<br>";
} else {
    echo "Hiba történt, kérlek hónapot adj meg!<br>";
}
echo "<br>";


//Switch megoldás: 
echo "Switch megoldása: <br>";
$honap = "Október";
echo "Válassz egy hónapot, hogy melyik évszakban van! Helyesírásra figyelj oda! Megadott forma: 'Március'<br> Választott hónap: $honap<br>";
switch ($honap) {
    case "Január":
        echo "Évszak: Tél";
        break;
    case "Február":
        echo "Évszak: Tél";
        break;
    case "Március":
        echo "Évszak: Tavasz";
        break;
    case "Április":
        echo "Évszak: Tavasz";
        break;
    case "Május":
        echo "Évszak: Tavasz";
        break;
    case "Június":
        echo "Évszak: Nyár";
        break;
    case "Július":
        echo "Évszak: Nyár";
        break;
    case "Augusztus":
        echo "Évszak: Nyár";
        break;
    case "Szeptember":
        echo "Évszak: Ősz";
        break;
    case "Október":
        echo "Évszak: Ősz";
        break;
    case "November":
        echo "Évszak: Ősz";
        break;
    case "December":
        echo "Évszak: Tél";
        break;
    default:
        echo "Hiba történt, kérlek hónapot adj meg!";
        break;
}


?>