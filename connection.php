<?php
$mysqli = new mysqli("localhost","root","","chrysaellect_meet");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chrysaellect_meet";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$mysqli -> close();
?>
