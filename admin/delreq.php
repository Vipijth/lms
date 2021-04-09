<?php 
include ("connection.php");
$id=$_POST['oid'];
$omail=$_POST['omail'];
$sqlz = "DELETE FROM users WHERE id='$id'";

if ($conn->query($sqlz) === TRUE) {
 $sqlz = "DELETE FROM faculty WHERE email like'$omail'";
	$conn->query($sqlz);
    header('Location: request.php');
} else {
  echo "Error deleting record: " . $conn->error;
}


?>