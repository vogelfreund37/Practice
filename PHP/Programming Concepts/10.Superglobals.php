<?php


/*
Superglobas are used for proceeding formulars, storing tokens (cookies) or accessing enviroment variables.

$GLOBALS
$_SERVER || server environment, such as headers, paths, and script locations.
$_REQUEST || contains the contents of $_GET, $_POST, and $_COOKIE.
$_POST || Input from User || Formular proceeding
$_GET || Get resource from Server || Formular requesting
$_FILES || Uploaded files via $_POST method
$_ENV || System enviroment variables
$_COOKIE || Cookie session keys etc.
$_SESSION || Contains the seassion variables
*/


// Start new or resume existing session
session_start();

// Set some session variables
$_SESSION["username"] = "Test Username";
$_SESSION["email"] = "test@thismaildonotexist.asdf";
$_SESSION["logged_in"] = true;

// Grab some Server Information to display based on PHP enviroment variables
echo "\n Current running User: " . $_SERVER['USERNAME'] . "\n";
echo "Current Scriptname " . $_SERVER['PHP_SELF'] . "\n";

// Accessing system environment variable
echo 'Current logged in user: ' . $_ENV["USER"] . '!';

// Set a Cookie that is 30 days valid:
$timestamp = time();
$cookie_name = "test_cookie";
$cookie_value = "Time from cookie: " . $timestamp;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // expires in 30 days

?>

<!--Lets create a formular!-->
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Superglobals</title>
</head>

<body>

  <header>
    <h1><?php echo "🌎Welcome to Superglobals🌎"; ?> </h1>
  </header>
  <main>
    <section>
      <?php
      // Retrieve the cookie
      if (isset($_COOKIE["test_cookie"])) {
        $cookie_value = $_COOKIE["test_cookie"];
        echo "Cookie value: " . $cookie_value . "<br>";
      } else {
        echo "Cookie not set.";
      } ?>
    </section>

    <section>
      <?php 
    // Retrieve the session variables
if (isset($_SESSION["username"])) {
  echo "Username: " . $_SESSION["username"] . "<br>";
  echo "Email: " . $_SESSION["email"] . "<br>";
  echo "Logged in: " . ($_SESSION["logged_in"] ? "Yes \n" : "No \n") . "<br>";
} else {
  echo "No session variables set";
}?>
    </section>
    
    <!-- POST REQUEST !-->
    <section class="input-container">
      <form method="post" class="post-formular">
        <label form="name">Your Name:</label>
        <input type="text" id="name" name="name" required>

        <label form="message">Your message:</label>
        <input id="message" name="message" required></input>

        <label form="mood">Your mood:</label>
        <select id="mood" name="mood">
          <option value="happy" selected>😄 Happy</option>
          <option value="neutral">😐 Neutral</option>
          <option value="overthinking">🤔 Overthinking</option>
          <option value="Upset">🎉 Upset</option>
        </select>

        <button type="submit">Add / POST</button>
      </form>
    </section>


    <!-- GET Request !-->
    <section class="get-container">
      <form method="get" class="get-formular">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search" required>

        <button type="submit">Search / GET</button>
      </form>
    </section>


    <section class="formular-container">
      <form method="post" class="file-upload-form" enctype="multipart/form-data">
        <label for="file">Upload a file:</label>
        <input type="file" id="file" name="file" required>

        <button type="submit">Upload file</button>
      </form>
    </section>


    <?php
    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST['name']) && isset($_POST['message']) && isset($_POST['mood'])) {

        // We're posting from the message form
        $_SESSION['post_data'] = array(
          'name' => $_POST['name'],
          'message' => $_POST['message'],
          'mood' => $_POST['mood']
        );

      } elseif (isset($_FILES['file'])) {

        // We're posting from the file upload form
        if ($_FILES['file']['error'] == 0) {
          $file_name = $_FILES['file']['name'];
          $file_tmp = $_FILES['file']['tmp_name'];
          $file_size = $_FILES['file']['size'];
          $file_type = $_FILES['file']['type'];

          // Store the uploaded files in a directory and make it 644 ( rw-r--r--) 
          $upload_dir = 'uploads/';
          if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0644, true);
          }
          $file_path = $upload_dir . $file_name;
          move_uploaded_file($file_tmp, $file_path);

          echo "<p>File uploaded successfully!</p>";
        } else {
          echo "<p>Error uploading file: " . $_FILES['file']['error'] . "</p>";
        }
      }
    }

    // Check if already post data exists in the array and display it
    if (isset($_SESSION['post_data'])) {
      echo "<h2>Your [POST] request:</h2>";
      echo "<p>Name: " . $_SESSION['post_data']['name'] . "</p>";
      echo "<p>Message: " . $_SESSION['post_data']['message'] . "</p>";
      echo "<p>Mood: " . $_SESSION['post_data']['mood'] . "</p>";
    }

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      // Print the user's input
      echo "<h2>Your [GET] request:</h2>";
      echo "<p>Search query: " . $_REQUEST['search'] . "</p>";
    }
    ?>
  </main>
</body>

</html>