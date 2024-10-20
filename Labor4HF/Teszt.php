<?php
require 'Autoload.php';


$manipulator = new ArrayManipulator();

$manipulator->adat1 = "Első adat<br>";
$manipulator->adat2 = "Második adat<br>";

echo "$manipulator<br>";

if (isset($manipulator->item1)) {
    echo "adat1 set<br>";
}


unset($manipulator->item1);


if (!isset($manipulator->item1)) {
    echo "adat2 unset<br>";
}


$clonedManipulator = clone $manipulator;
$clonedManipulator->item3 = "Harmadik adat";
echo $clonedManipulator;