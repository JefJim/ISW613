<?php
// Array of countrys and capital
$ceu = array(
    "Italy" => "Rome", "Luxembourg" => "Luxembourg", "Belgium" => "Brussels", 
    "Denmark" => "Copenhagen", "Finland" => "Helsinki", "France" => "Paris", 
    "Slovakia" => "Bratislava", "Slovenia" => "Ljubljana", "Germany" => "Berlin", 
    "Greece" => "Athens", "Ireland" => "Dublin", "Netherlands" => "Amsterdam", 
    "Portugal" => "Lisbon", "Spain" => "Madrid", "Sweden" => "Stockholm", 
    "United Kingdom" => "London", "Cyprus" => "Nicosia", "Lithuania" => "Vilnius", 
    "Czech Republic" => "Prague", "Estonia" => "Tallin", "Hungary" => "Budapest", 
    "Latvia" => "Riga", "Malta" => "Valetta", "Austria" => "Vienna", "Poland" => "Warsaw"
);

ksort($ceu);

echo "<h2>List of countries and capitals</h2>";
echo "<ul>";
foreach ($ceu as $country => $capital) {
    echo "<li>The capital of $country is $capital.</li>";
}
echo "</ul>";

?>
