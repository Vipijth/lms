<?php

include ("connection.php");
$id = $_REQUEST['cid'];

$sql = "DELETE FROM summit WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    $sqlf = "DELETE FROM users WHERE email like '$email'";
    $conn->query($sqlf);
 header('Location: summit.php');
} else {
    echo "Error deleting record: " . $conn->error;
}


?>