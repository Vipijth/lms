<?php
include ("../connection.php");

$title = $_POST['title'];
$category = $_POST['category'];
$amount = $_POST['amount'];
$about = $conn-> real_escape_string($_POST['about']);
$skill= $_POST['skills'];
$keyword= $_POST['keyword'];
$resource= $_POST['resource'];
$startdate= $_POST['startdate'];
$enddate= $_POST['enddate'];
$hours= $_POST['hours'];
$ctype= $_POST['ctype'];
$instructor= $_POST['instructor'];
if($_POST['certified']){
    $cert='1';
}else{
    $cert='0';
}


$rand=rand(10000,90000);
$target_dir = "uploads/Courses/".$title.'/image/'.$rand;
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imagename=$rand.basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (!file_exists('uploads/Courses/'.$title.'/image')) {
mkdir('uploads/Courses/'.$title.'/image', 0777, true);
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
   $sql = 'INSERT INTO course(name, image,category, amount,about,startdate,enddate,skill1,skill2,skill3,skill4,certified,hours,type ) VALUES 
   ("'.$title.'","'.$imagename.'","'.$category.'","'.$amount.'","'.$about.'","'.$startdate.'","'.$enddate.'","'.$skill[0].'","'.$skill[1].'","'.$skill[2].'","'.$skill[3].'","'.$cert.'","'.$hours.'","'.$ctype.'")';
   
   if ($conn->query($sql) === TRUE) {

     $last_id = $conn->insert_id;
  
     //header('Location: resources.php');
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }

  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}






if($instructor!=0){
    $ctype='course';
    $sql = 'INSERT INTO instructor (instructorId,resourceId,type) VALUES 
    ("'.$instructor.'","'.$last_id.'","'.$ctype.'")';

    if ($conn->query($sql) === TRUE) {
      	$dates=date('d-m-Y');
		$notification='You are assigned as a faculty of '.$ctype.' '.$title;
		$ntype='faculty';
       $sqls = 'INSERT INTO faculty_notification (userid,notification,type,dates) VALUES 
    ("'.$instructor.'","'.$notification.'","'.$ntype.'","'.$dates.'")';
		$conn->query($sqls);
        // header('Location: resources.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}



	$dates=date('d-m-Y');
	$notification='New '.$ctype.' '.$title.' Updated' ;
		$ntype='course';
$nid='0';
       $sqlsd = 'INSERT INTO user_notification (userid,notification,type,dates,subid) VALUES 
    ("'.$nid.'","'.$notification.'","'.$ntype.'","'.$dates.'","'.$last_id.'")';
	   if ($conn->query($sqlsd) === TRUE) {
    
     // header('Location: resources.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }


foreach($resource as $x => $val) {

    $sql = 'INSERT INTO rc (resourceId,courseId) VALUES 
    ("'.$val.'","'.$last_id.'")';
    
    if ($conn->query($sql) === TRUE) {

     // header('Location: resources.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }




foreach($keyword as $x => $val) {
    if($val!=null){
        $sql = 'INSERT INTO keyword (keyword,type,name) VALUES 
        ("'.$val.'","Course","'.$title.'")';
        
        if ($conn->query($sql) === TRUE) {
           header('Location: course_view.php?name='.$last_id);
          ?>
     <script>alert(' Course Added Successfully');
       
             setTimeout(function(){
            window.location = "http://meet.chrysaellect.com/admin/course.php;
         }, 1000);
     </script>
     
     <?php 
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
      }
    
