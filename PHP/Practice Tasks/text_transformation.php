<!-- 

Problem:
 Erstellen Sie ein Programm, das jeden
 Satz umkehrt und den ersten Buchstaben
jedes Wortes groß schreibt.
 -->


 <?php
// Programm 2: Textverarbeitung
function transformiereSatz($satz) {
    $woerter = explode(' ', $satz); // Lücke 1

    // Gehe durch jedens element in array und halte variable in $wort
    $transformiert = array_map(function($wort) {
        //macht alle buchstaben klein und ersten buchstaben groß (ucfirst)
        $wort = ucfirst(strtolower($wort)); // Lücke 2
        // dreht den inhalt des strings
        return strrev($wort); // Lücke 3
    }, $woerter);

    return implode(' ', $transformiert);
}

// Test
echo transformiereSatz("hallo welt php"); // Sollte ausgeben: "OllaH TleW PhP"
?>
