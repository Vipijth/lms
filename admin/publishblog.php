<?php

include ("connection.php");
$id = $_REQUEST['name'];
$sql = "update blogs set publish='1' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {

 header('Location: blog.php');
} else {
    echo "Error  record: " . $conn->error;
}



?>