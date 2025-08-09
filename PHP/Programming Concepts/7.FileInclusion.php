<?php
// file1.php
$message = "Hello from File1!";
?>

<?php
// file2.php
include 'file1.php';
echo $message;
?>
