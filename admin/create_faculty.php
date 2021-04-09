<?php
include '../connection.php';

$title = $_POST['title'];

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$mob = $_POST['mob'];
$about = $conn-> real_escape_string($_POST['about']);
	   $sqlpost="select * from users where email like '$email' ;";
    $resultpost = $conn->query($sqlpost);
    if ($resultpost->num_rows > 0) {
		
	        echo " <script>alert(' Email  Already Exists'); </script> " ;
       // header('Location: login.php');

echo "
     <script>
         setTimeout(function(){
            window.location.href = 'faculty.php';
         }, 1000);
      </script>";
	}
else{ 

//echo $title.'<br>'.$image.''.$fname.''.$lname.''.$about ;
$rand=rand(10000,90000);
$target_dir = "uploads/faculty/".$rand;
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imagename=$rand.basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (!file_exists('uploads/faculty')) {
mkdir('uploads/faculty', 0777, true);
}
// Check if image file is a actual image or fake image


// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
/*if ($_FILES["image"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}*/

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      $cds='1';
    //echo "The file ". htmlspecialchars( $rand.basename( $_FILES["image"]["name"])). " has been uploaded.";
   // echo $imagename;
   $sql = 'INSERT INTO faculty (title,fname, lname, imageName,about,email,mob,verified) VALUES 
   ("'.$title.'","'.$fname.'","'.$lname.'","'.$imagename.'","'.$about.'","'.$email.'","'.$mob.'","'.$cds.'")';
   
   if ($conn->query($sql) === TRUE) {
 
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }

  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}



      $type='faculty';
       $cd='1';
       $sqlf = 'INSERT INTO users(firstname, lastname,email, mob,usertype,password,verified ) VALUES 
   ("' . $fname . '","' . $lname . '","' . $email . '","' . $mob . '","' . $type . '","' . $password . '","' . $cd . '")';



  
     $last_id = $conn->insert_id;
     
        if ($conn->query($sqlf) === TRUE) {
      header('Location: faculty_view.php?name='.$last_id);
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
}

?>