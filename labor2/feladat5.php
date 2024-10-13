<?php

$bevasarlolista = [];

// Elem hozzáadása a bevásárlólistához
function hozzadHozza($lista, $nev, $mennyiseg, $egysegar) {
    $lista[] = [
        "nev" => $nev,
        "mennyiseg" => $mennyiseg,
        "egysegar" => $egysegar, 
    ];
    return $lista;
}

// Elem eltávolítása a bevásárlólistáról név alapján
function eltavolit($lista, $nev) {
    foreach ($lista as $index => $elem) {
        if ($elem['nev'] === $nev) {
            unset($lista[$index]);
            break; 
        }
    }
    return array_values($lista); 
}

// Összes bevásárlólista elem kiírása
function kiirat($lista) {
    foreach ($lista as $elem) {
        echo "Név: " . $elem['nev'] . ", Mennyiség: " . $elem['mennyiseg'] . ", Az ára: " . $elem['egysegar'] . " RON<br>"; 
    }
}

// Összköltség számítása
function osszkoltseg($lista) {
    $osszeg = 0;
    foreach ($lista as $elem) {
        $osszeg += $elem['mennyiseg'] * $elem['egysegar']; // Itt is az egységárat használjuk
    }
    return $osszeg;
}

// Példák 
$bevasarlolista = hozzadHozza($bevasarlolista, "Kenyér", 3, 8.2);
$bevasarlolista = hozzadHozza($bevasarlolista, "Víz", 6, 3.3);
$bevasarlolista = hozzadHozza($bevasarlolista, "Hús", 1, 10.1);

echo "Bevásárlólista:<br>";
kiirat($bevasarlolista);

// Összköltség kiírása
$osszeg = osszkoltseg($bevasarlolista);
echo "<br>Összköltség: " . $osszeg . " RON<br>";

// Elem eltávolítása
$bevasarlolista = eltavolit($bevasarlolista, "Víz");

echo "<br>Frissített bevásárlólista:<br>";
kiirat($bevasarlolista);

// Összköltség kiírása frissített lista alapján
$osszeg = osszkoltseg($bevasarlolista);
echo "<br>Új összköltség: " . $osszeg . " RON<br>";
?>
