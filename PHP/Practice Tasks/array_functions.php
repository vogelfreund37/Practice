<?php

// Erstellen Sie ein Programm, das aus einem Array
// von Zahlen nur die geraden Zahlen filtert und diese verdoppel


// Programm 1: Zahlenverarbeitung
function verarbeiteArray($zahlen) {
    $ergebnis = array_filter($zahlen, function($zahl) {
        return $zahl % 2 === 0;  // Lücke 1
    });

    $ergebnis = array_map(function($zahl) {
        return $zahl * 2; // Lücke 2
    }, $ergebnis);

    return $ergebnis;  // Lücke 3
}

// Test
$zahlen = [1, 2, 3, 4, 5, 6];
print_r(verarbeiteArray($zahlen));
?>
