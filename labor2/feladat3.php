<?php

$napok = array(
    "HU" => array("H", "K", "Sze", "Cs", "P", "Szo", "V"),
    "EN" => array("M", "Tu", "W", "Th", "F", "Sa", "Su"),
    "DE" => array("Mo", "Di", "Mi", "Do", "F", "Sa", "So"),
);

foreach ($napok as $orszag => $hetnap) {
    echo "$orszag: ";
    foreach ($hetnap as $index => $nap) {
        if ($index == 1 || $index == 3 || $index == 5) {
            echo "<strong>$nap</strong>";
        } else {
            echo $nap;
        }
        if ($index < count($hetnap) - 1) {
            echo ", ";
        }
    }
    echo"<br>";
}

?>