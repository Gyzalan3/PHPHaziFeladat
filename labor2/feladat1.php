<?php
$color = "cyan";

$szorzotabla = function($n) use ($color) {
    echo "<table border='1' cellpadding='10' style='border-collapse: separate;'>";
    for ($i = 1; $i <= $n; $i++) {
        echo "<tr>";
        for ($j = 1; $j <= $n; $j++) {
            $eredmeny = $i * $j;
            
            if ($i == $j) {
                echo "<td style='background-color: $color;'>$eredmeny</td>";
            } else {
                echo "<td>$eredmeny</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
};

$szorzotabla(10);
?>
