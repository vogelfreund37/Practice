<?php
/*
Problem: 
Erstellen Sie eine einfache Benutzerverwaltung mit Validierung.
*/
// Programm 6: Warenkorb
class Warenkorb {
    private $artikel = [];

    public function artikelHinzufuegen($name, $preis, $menge) {
        // artikel array
        $this->artikel[] = [
            'name' => $name,  // Lücke 1
            'preis' => (float)$preis,  // Lücke 2
            'menge' => (int)$menge   // Lücke 3
        ];
    }

    public function gesamtpreis() {
        $summe = 0;
        foreach ($this->artikel as $artikel) {
            $summe += $artikel['preis'] * $artikel['menge'];
        }
        return number_format($summe, 2, ',', '.');
    }
}

// Test
$korb = new Warenkorb();
$korb->artikelHinzufuegen("T-Shirt", 19.99, 2);
$korb->artikelHinzufuegen("Hose", 49.99, 1);
echo "Gesamtpreis: " . $korb->gesamtpreis() . " €";
?>
