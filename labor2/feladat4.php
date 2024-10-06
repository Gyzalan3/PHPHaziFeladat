<?php
function atalakit_klasszikus($tomb, $forma) {
    foreach ($tomb as $kulcs => $ertek) {
        if ($forma == "kisbetus") {
            $tomb[$kulcs] = strtolower($ertek); 
        } elseif ($forma == "nagybetus") {
            $tomb[$kulcs] = strtoupper($ertek); 
        }
    }
    return $tomb;
}


$szinek = array('A' => 'Kek', 'B' => 'Zold', 'c' => 'Piros');


print_r(atalakit_klasszikus($szinek, "kisbetus"));
echo "<br><br>";
print_r(atalakit_klasszikus($szinek, "nagybetus"));

?>
