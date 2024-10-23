<?php
// Array of register temps
$temperatures = array(78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 
                      62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73);

// Calculate prom temp
$averageTemperature = array_sum($temperatures) / count($temperatures);
echo "<h2>Temperature Statistics</h2>";
echo "Average Temperature is : " . round($averageTemperature, 1) . "<br>";

$uniqueTemperatures = array_unique($temperatures);

// Sort from bigger to lower and select 5 most higher
rsort($uniqueTemperatures);
$highestTemperatures = array_slice($uniqueTemperatures, 0, 5);
echo "List of 5 highest temperatures (no duplicates): " . implode(", ", $highestTemperatures) . "<br>";

// Sort and select the 5 lowest temps 
$lowestTemperatures = array_slice($uniqueTemperatures, 0, 5);
echo "List of 5 lowest temperatures (no duplicates): " . implode(", ", $lowestTemperatures) . "<br>";
?>

