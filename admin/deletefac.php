<?php

include ("connection.php");
$id = $_REQUEST['name'];
$email = $_REQUEST['id'];
$sql = "DELETE FROM faculty WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    $sqlf = "DELETE FROM users WHERE email like '$email'";
    $conn->query($sqlf);
    //header('Location: course.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

$sqlz = "DELETE FROM rc WHERE courseId='$id'";

if ($conn->query($sqlz) === TRUE) {

    header('Location: faculty.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

?>