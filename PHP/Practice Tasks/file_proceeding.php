<?php
// Programm 3: Dateizähler
class DateiVerarbeitung {
    private $dateipfad;

    public function __construct($dateipfad) {
        // Check file existance
        if (!file_exists($dateipfad)) { 
            throw new Exception("Datei existiert nicht!");
        }
        $this->dateipfad = $dateipfad;
    }

    public function zaehlZeilen() {
        // get the file path
        $daten = $this->dateipfad; 
        // get all lines from the file
        return count($daten); // Lücke 3
    }
}

// Test
try {
    $verarbeiter = new DateiVerarbeitung("test.txt");
    echo "Anzahl der Zeilen: " . $verarbeiter->zaehlZeilen();
} catch (Exception $ex) {
    echo "Fehler: " . $ex->getMessage();
}
?>