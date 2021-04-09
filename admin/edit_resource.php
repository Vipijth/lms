<?php
include '../connection.php';
$title = $_POST['title'];
$category = $_POST['category'];
$amount = $_POST['amount'];
$about = $conn-> real_escape_string($_POST['about']);
$keyword= $_POST['keyword'];
$xid = $_POST['xid'];
if($_POST['instructor']!=null){
$instructor= $_POST['instructor'];
}

$tit1 = $_POST['tit1'];
$tit2= $_POST['tit2'];
$tit3= $_POST['tit3'];


$filetype1= $_POST['filetype1'];
$filetype2= $_POST['filetype2'];
$filetype3= $_POST['filetype3'];
$last_id=$xid;

foreach($keyword as $x => $val) {
    if($val!=null){
        $sql = 'INSERT INTO keyword (keyword,type,name) VALUES 
        ("'.$val.'","Resource","'.$title.'")';
        
        if ($conn->query($sql) === TRUE) {

          ?>

     <?php 
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
      }
      
if($instructor!=0){
    $ctype='resource';
    $sql = 'INSERT INTO instructor (instructorId,resourceId,type) VALUES 
    ("'.$instructor.'","'.$last_id.'","'.$ctype.'")';
    
    if ($conn->query($sql) === TRUE) {
   

    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

}







if($tit1!=null){



    $rand=rand(10000,90000);
    $target_dir = "uploads/Resources/".$title.'/'.$filetype1.'/'.$rand;
    $target_file = $target_dir . basename($_FILES["files1"]["name"]);
    $imagename=$rand.basename($_FILES["files1"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (!file_exists('uploads/Resources/'.$title.'/'.$filetype1.'/')) {
    mkdir('uploads/Resources/'.$title.'/'.$filetype1.'/', 0777, true);
    }
    // Check if image file is a actual image or fake image
    
    
    // Allow certain file formats
    
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["files1"]["tmp_name"], $target_file)) {
          
        //echo "The file ". htmlspecialchars( $rand.basename( $_FILES["image"]["name"])). " has been uploaded.";
       // echo $imagename;
       $sql = 'INSERT INTO resources_files (name,filename, filetype, title,Rid ) VALUES 
       ("'.$title.'","'.$imagename.'","'.$filetype1.'","'.$tit1.'","'.$last_id.'")';
       
       if ($conn->query($sql) === TRUE) {
         echo "New record created successfully";
        // header('Location: resources.php');
       } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
       }
    
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
    
    
    
    }
    


    if($tit2!=null){



        $rand=rand(10000,90000);
        $target_dir = "uploads/Resources/".$title.'/'.$filetype2.'/'.$rand;
        $target_file = $target_dir . basename($_FILES["files2"]["name"]);
        $imagename=$rand.basename($_FILES["files2"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if (!file_exists('uploads/Resources/'.$title.'/'.$filetype2.'/')) {
        mkdir('uploads/Resources/'.$title.'/'.$filetype2.'/', 0777, true);
        }
        // Check if image file is a actual image or fake image
        
        
        // Allow certain file formats
        
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES["files2"]["tmp_name"], $target_file)) {
              
            //echo "The file ". htmlspecialchars( $rand.basename( $_FILES["image"]["name"])). " has been uploaded.";
           // echo $imagename;
           $sql = 'INSERT INTO resources_files (name,filename, filetype, title,Rid ) VALUES 
           ("'.$title.'","'.$imagename.'","'.$filetype2.'","'.$tit2.'","'.$last_id.'")';
           
           if ($conn->query($sql) === TRUE) {
             echo "New record created successfully";
            // header('Location: resources.php');
           } else {
             echo "Error: " . $sql . "<br>" . $conn->error;
           }
        
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
        
        
        
        }
        

        if($tit3!=null){



            $rand=rand(10000,90000);
            $target_dir = "uploads/Resources/".$title.'/'.$filetype3.'/'.$rand;
            $target_file = $target_dir . basename($_FILES["files3"]["name"]);
            $imagename=$rand.basename($_FILES["files3"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if (!file_exists('uploads/Resources/'.$title.'/'.$filetype3.'/')) {
            mkdir('uploads/Resources/'.$title.'/'.$filetype3.'/', 0777, true);
            }
            // Check if image file is a actual image or fake image
            
            
            // Allow certain file formats
            
            
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
              echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
              if (move_uploaded_file($_FILES["files3"]["tmp_name"], $target_file)) {
                  
                //echo "The file ". htmlspecialchars( $rand.basename( $_FILES["image"]["name"])). " has been uploaded.";
               // echo $imagename;
               $sql = 'INSERT INTO resources_files (name,filename, filetype, title ,Rid) VALUES 
               ("'.$title.'","'.$imagename.'","'.$filetype3.'","'.$tit3.'","'.$last_id.'")';
               
               if ($conn->query($sql) === TRUE) {
                 echo "New record created successfully";
                // header('Location: resources.php');
               } else {
                 echo "Error: " . $sql . "<br>" . $conn->error;
               }
            
              } else {
                echo "Sorry, there was an error uploading your file.";
              }
            }
            
            
            
            }
            



echo $title.$category.$amount.$instructor.$xid;  
$target_file = basename($_FILES["image"]["name"]);
if($target_file!=null){
$rand=rand(10000,90000);
$target_dir = "uploads/Resources/".$title.'/image/'.$rand;
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imagename=$rand.basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (!file_exists('uploads/Resources/'.$title.'/image')) {
mkdir('uploads/Resources/'.$title.'/image', 0777, true);
}

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      
    //echo "The file ". htmlspecialchars( $rand.basename( $_FILES["image"]["name"])). " has been uploaded.";
   // echo $imagename;
   $sql = "UPDATE resources SET name='$title' ,  category='$category' , amount='$amount' , image='$imagename', about='$about' WHERE id='$xid'";

   if ($conn->query($sql) === TRUE) {
    header('Location: resource_view.php?name='.$xid);
   } else {
     echo "Error updating record: " . $conn->error;
   }
   

  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
}

else{

    $sql = "UPDATE resources SET name='$title' ,  category='$category' , amount='$amount' , about='$about' WHERE id='$xid'";

    if ($conn->query($sql) === TRUE) {
        header('Location: resource_view.php?name='.$xid);

    } else {
      echo "Error updating record: " . $conn->error;
    }

}



echo "<script> var x=$last_id; </script>";


      

      
      ?>
      <Script>
      
           window.location = "resource_view.php?name="+x;
      </Script>