<?php
include ("connection.php");
$title =$_POST['title'];
$about1 =$conn-> real_escape_string($_POST['about1']);
$about2 =$conn-> real_escape_string($_POST['about2']);
$author= $conn-> real_escape_string($_POST['author']);
$authordes= $conn-> real_escape_string($_POST['authordesc']);

$xid = $_POST['xid'];


$cover = basename($_FILES["coverImage"]["name"]);
$image1 = basename($_FILES["Image1"]["name"]);
$image2= basename($_FILES["Image2"]["name"]);
$authorImage = basename($_FILES["authorImage"]["name"]);

if($cover==null &&$image2==null &&$image1==null &&$authorImage==null ){
    $sql = "UPDATE blogs SET    author='$author' ,authordetails='$authordes',about1='$about1', about2='$about2' WHERE id='$xid'";

    if ($conn->query($sql) === TRUE) {
        header('Location: blog_view.php?name='.$xid);
    } else {
      echo "Error updating record: " . $conn->error;
    }


}


if($cover!=null){
    $rand=rand(10000,90000);
    $target_dir = "uploads/Blogs/".$title.'/images/'.$rand;
    $target_file = $target_dir . basename($_FILES["coverImage"]["name"]);
    $imagename=$rand.basename($_FILES["coverImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (!file_exists('uploads/Blogs/'.$title.'/images')) {
    mkdir('uploads/Blogs/'.$title.'/images', 0777, true);
    }
    
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["coverImage"]["tmp_name"], $target_file)) {
          
        //echo "The file ". htmlspecialchars( $rand.basename( $_FILES["image"]["name"])). " has been uploaded.";
       // echo $imagename;
       $sql = "UPDATE blogs SET  cover='$imagename', author='$author' ,authordetails='$authordes',about1='$about1', about2='$about2' WHERE id='$xid'";

       if ($conn->query($sql) === TRUE) {
     
       } else {
         echo "Error updating record: " . $conn->error;
       }
       
    
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
    }




    if($image1!=null){
        $rand=rand(10000,90000);
        $target_dir = "uploads/Blogs/".$title.'/images/'.$rand;
        $target_file = $target_dir . basename($_FILES["Image1"]["name"]);
        $imagename=$rand.basename($_FILES["Image1"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if (!file_exists('uploads/Blogs/'.$title.'/images')) {
        mkdir('uploads/Blogs/'.$title.'/images', 0777, true);
        }
        
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES["Image1"]["tmp_name"], $target_file)) {
              
            //echo "The file ". htmlspecialchars( $rand.basename( $_FILES["image"]["name"])). " has been uploaded.";
           // echo $imagename;
           $sql = "UPDATE blogs SET  image1='$imagename', author='$author' ,authordetails='$authordes',about1='$about1', about2='$about2' WHERE id='$xid'";
    
           if ($conn->query($sql) === TRUE) {
        
           } else {
             echo "Error updating record: " . $conn->error;
           }
           
        
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
        }





    if($image2!=null){
        $rand=rand(10000,90000);
        $target_dir = "uploads/Blogs/".$title.'/images/'.$rand;
        $target_file = $target_dir . basename($_FILES["Image2"]["name"]);
        $imagename=$rand.basename($_FILES["Image2"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if (!file_exists('uploads/Blogs/'.$title.'/images')) {
        mkdir('uploads/Blogs/'.$title.'/images', 0777, true);
        }
        
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES["Image2"]["tmp_name"], $target_file)) {
              
            //echo "The file ". htmlspecialchars( $rand.basename( $_FILES["image"]["name"])). " has been uploaded.";
           // echo $imagename;
           $sql = "UPDATE blogs SET  image2='$imagename', author='$author' ,authordetails='$authordes',about1='$about1', about2='$about2' WHERE id='$xid'";
    
           if ($conn->query($sql) === TRUE) {
        
           } else {
             echo "Error updating record: " . $conn->error;
           }
           
        
          } else {
            echo "Sorrys, there was an error uploading your file.";
          }
        }
        }


        
    if($authorImage!=null){
        $rand=rand(10000,90000);
        $target_dir = "uploads/Blogs/".$title.'/images/'.$rand;
        $target_file = $target_dir . basename($_FILES["authorImage"]["name"]);
        $imagename=$rand.basename($_FILES["authorImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if (!file_exists('uploads/Blogs/'.$title.'/images')) {
        mkdir('uploads/Blogs/'.$title.'/images', 0777, true);
        }
        
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES["authorImage"]["tmp_name"], $target_file)) {
              
            //echo "The file ". htmlspecialchars( $rand.basename( $_FILES["image"]["name"])). " has been uploaded.";
           // echo $imagename;
           $sql = "UPDATE blogs SET  authorimage='$imagename', author='$author' ,authordetails='$authordes',about1='$about1', about2='$about2' WHERE id='$xid'";
    
           if ($conn->query($sql) === TRUE) {
          
       
           } else {
             echo "Error updating record: " . $conn->error;
           }
           
        
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
        }

        header('Location: blog_view.php?name='.$xid);
?>