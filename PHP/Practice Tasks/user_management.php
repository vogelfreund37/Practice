<?php
/*
Problem: 
Erstellen Sie eine einfache Benutzerverwaltung mit Validierung.
*/
class Benutzer {
    private $benutzername;
    private $email;

    public function setzeBenutzer($benutzername, $email) {
        // Überprüfen der Länge des Benutzernamens
        if (strlen($benutzername) <= 3) { // Lücke 1: Benutzername validieren
            throw new Exception("Benutzername muss mindestens 3 Zeichen haben");
        }
        // Validierung der E-Mail-Adresse
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // Lücke 2: E-Mail validieren
            throw new Exception("Ungültige E-Mail-Adresse");
        }

        // Leerzeichen im Benutzernamen entfernen
        $this->benutzername = trim($benutzername);  // Lücke 3
        $this->email = $email;

        // Rückgabe des aktuellen Objekts
        return $this;
    }

    // Getter für den Benutzernamen (optional)
    public function getBenutzername() {
        return $this->benutzername;
    }
}

// Test
$benutzer = new Benutzer();
try {
    $userInfo = $benutzer->setzeBenutzer("maxxxx", "max@beispiel.de");
    echo "Benutzer " . $userInfo->getBenutzername() . " erfolgreich erstellt!";
} catch (Exception $ex) {
    echo "Fehler: " . $ex->getMessage();
}