<?php
// Programm 4: Temperaturumrechner
class TemperaturRechner {
    public function nachFahrenheit($celsius) {
        // T (° F) = T (° C) × 9/5 + 32
        return ($celsius * 9/5) + 32; // Lücke 1
    }

    public function nachCelsius($fahrenheit) {
        // T (° C) = T (° F) - 32 * 5/9
        return (($fahrenheit - 32) * 5/9); // Lücke 2
    }

    public function formatiere($temperatur) {
        // formatiere auf zwei dezimalstelle
        return (number_format($temperatur, 2)); // Lücke 3
    }
}

// Test
$rechner = new TemperaturRechner();
$celsius = 13;
$fahrenheit = $rechner->nachFahrenheit($celsius);
echo $rechner->formatiere($celsius) . "°C = " . $rechner->formatiere($fahrenheit) . "°F";
?>
