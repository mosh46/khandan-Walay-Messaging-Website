
<?php
$servername = "localhost";
$usernam = "root";
$serverpassword = "";
$dbname = "khandan_waly";

// Create connection
$conn = mysqli_connect($servername, $usernam, $serverpassword, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


?>
