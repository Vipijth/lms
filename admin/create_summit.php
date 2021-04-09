<?php
include ("../connection.php");

$title = $_POST['title'];




$startdate= date('Y/m/d');





$rand=rand(10000,90000);
$target_dir = "uploads/Summit/".$rand;
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imagename=$rand.basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (!file_exists('uploads/Summit/')) {
mkdir('uploads/Summit/', 0777, true);
}
// Check if image file is a actual image or fake image


// Allow certain file formats


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      
    //echo "The file ". htmlspecialchars( $rand.basename( $_FILES["image"]["name"])). " has been uploaded.";
   // echo $imagename;
   $sql = 'INSERT INTO summit(title,video,start) VALUES 
   ("'.$title.'","'.$imagename.'","'.$startdate.'")';
   
   if ($conn->query($sql) === TRUE) {
 
     $last_id = $conn->insert_id;
  
     //header('Location: resources.php');
	   
	     header('Location: summit.php?name='.$last_id);
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }

  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}










      
    
