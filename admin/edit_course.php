<?php
       session_start();
	   if($_SESSION["adminemail"]==null){
	   
	   
		   header('Location: error.php?errors=Please Log In');
	   }

	include ("connection.php");
	$cid = $_REQUEST['name'];
	$cname = $_REQUEST['id'];
	$skill1= $_POST['skill1'];
	$skill2= $_POST['skill2'];
	$skill3= $_POST['skill3'];
	$skill4= $_POST['skill4'];
	$title = $_POST['title'];
$category = $_POST['category'];
$keyword= $_POST['keyword'];
$amount = $_POST['amount'];
$spamount = $_POST['spamount'];
$about = $conn-> real_escape_string($_POST['about']);
$xid = $_POST['xid'];
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];
if($_POST['instructor']!=null){
  $instructor= $_POST['instructor'];
  }
if($_POST['resource']!=null){
$resource= $_POST['resource'];

    $sql = 'INSERT INTO rc (resourceId,courseId) VALUES 
    ("'.$resource.'","'.$xid.'")';
    
    if ($conn->query($sql) === TRUE) {

     // header('Location: resources.php');
    }
}



$last_id=$xid;

foreach($keyword as $x => $val) {
  if($val!=null){
      $sql = 'INSERT INTO keyword (keyword,type,name) VALUES 
      ("'.$val.'","Course","'.$title.'")';
      
      if ($conn->query($sql) === TRUE) {

        ?>

   <?php 
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }
    }
    
if($instructor!=0){
  $ctype='course';
  $sql = 'INSERT INTO instructor (instructorId,resourceId,type) VALUES 
  ("'.$instructor.'","'.$last_id.'","'.$ctype.'")';
  
  if ($conn->query($sql) === TRUE) {
 

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

}

    


    

            


$target_file = basename($_FILES["image"]["name"]);
if($target_file!=null){
$rand=rand(10000,90000);
$target_dir = "uploads/Courses/".$title.'/image/'.$rand;
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imagename=$rand.basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (!file_exists('uploads/Courses/'.$title.'/image')) {
mkdir('uploads/Courses/'.$title.'/image', 0777, true);
}

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      
    //echo "The file ". htmlspecialchars( $rand.basename( $_FILES["image"]["name"])). " has been uploaded.";
   // echo $imagename;
   $sql = "UPDATE course SET name='$title' ,  category='$category' ,startdate='$startdate',enddate='$enddate' ,  amount='$amount' , image='$imagename', about='$about',skill1='$skill1', skill2='$skill2' ,skill3 ='$skill3' ,skill4='$skill4',discount='$spamount' WHERE id='$xid'";

   if ($conn->query($sql) === TRUE) {
    header('Location: course_view.php?name='.$xid);
   } else {
     echo "Error updating record: " . $conn->error;
   }
   

  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
}

else{

    $sql = "UPDATE course SET name='$title' ,  category='$category' ,startdate='$startdate',enddate='$enddate', amount='$amount' , about='$about',skill1='$skill1', skill2='$skill2' ,skill3 ='$skill3' ,skill4='$skill4',discount='$spamount' WHERE id='$xid'";

    if ($conn->query($sql) === TRUE) {
        header('Location: course_view.php?name='.$xid);
    } else {
      echo "Error updating record: " . $conn->error;
    }

}

?>

