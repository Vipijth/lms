<?php

include ("connection.php");
$id = $_REQUEST['name'];
$sql = "DELETE FROM blogs WHERE id='$id'";

if ($conn->query($sql) === TRUE) {

    //header('Location: course.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

$sqlz = "DELETE FROM rc WHERE courseId='$id'";

if ($conn->query($sqlz) === TRUE) {

    header('Location: blog.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

?>