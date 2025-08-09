<?php
$file = 'test.txt';

// Write File
file_put_contents($file, "Hello from file!");

// Read FIle
$content = file_get_contents($file);
echo $content;
?>