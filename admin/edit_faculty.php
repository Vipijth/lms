<?php
include '../connection.php';
$title = $_POST['title'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$about = $conn-> real_escape_string($_POST['about']);

$xid = $_POST['xid'];

$email = $_POST['email'];
$mob = $_POST['mob'];
$password = $_POST['password'];
$last_id=$xid;


$omail = $_POST['omail'];
            


$target_file = basename($_FILES["image"]["name"]);
if($target_file!=null){
$rand=rand(10000,90000);
    $target_dir = "uploads/faculty/".$rand;
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imagename=$rand.basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (!file_exists('uploads/faculty')) {
mkdir('uploads/faculty', 0777, true);
}

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      
    //echo "The file ". htmlspecialchars( $rand.basename( $_FILES["image"]["name"])). " has been uploaded.";
   // echo $imagename;
   $sql = "UPDATE faculty SET title='$title' ,  lname='$lname' ,fname='$fname', imageName='$imagename', about='$about' ,email='$email',mob='$mob'  WHERE id='$xid'";
   $sq2l = "UPDATE users SET  lastname='$lname' ,firstname='$fname',email='$email',mob='$mob',password='$password'  WHERE email like '$omail' ";

   if ($conn->query($sql) === TRUE) {
       
       $conn->query($sq2l);
    header('Location: faculty_view.php?name='.$xid);
    
   } else {
     echo "Error updating record: " . $conn->error;
   }
   

  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
}

else{

    $sql = "UPDATE faculty SET title='$title' ,  lname='$lname' ,fname='$fname',  about='$about' ,email='$email',mob='$mob'  WHERE id='$xid'";
   $sq2l = "UPDATE users SET  lastname='$lname' ,firstname='$fname',email='$email',mob='$mob',password='$password'  WHERE email like '$omail' ";



    if ($conn->query($sql) === TRUE) {
          
            if ($conn->query($sq2l) === TRUE) {
           
       
    } else {
      echo "Error updating record: " . $conn->error;
    }

          
          
        header('Location: faculty_view.php?name='.$xid);
    } else {
      echo "Error updating record: " . $conn->error;
    }

}