<?php

include ("connection.php");
 $id = $_REQUEST['name'];
 $title = $_REQUEST['id'];

$sql = "DELETE FROM resources WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
 
    //header('Location: course.php');
} else {
  echo "Error deleting record: " . $conn->error;
}

$sqlz = "DELETE FROM rc WHERE resourceId='$id'";

if ($conn->query($sqlz) === TRUE) {
 
    //header('Location: course.php');
} else {
  echo "Error deleting record: " . $conn->error;
}

$sqlt = "DELETE FROM resources_files WHERE Rid='$id'";

if ($conn->query($sqlt) === TRUE) {
 
    //header('Location: course.php');
} else {
  echo "Error deleting record: " . $conn->error;
}


$sqlc = "DELETE FROM instructor WHERE resourceid='$id'";

if ($conn->query($sqlc) === TRUE) {
 
   header('Location: resources.php');
} else {
  echo "Error deleting record: " . $conn->error;
}
?>