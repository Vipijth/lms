
<?php
include '../connection.php';
$title = $_POST['title'];
$category = $_POST['category'];
$amount = $_POST['amount'];
$about = $conn-> real_escape_string($_POST['about']);
$instructor= $_POST['instructor'];
$keyword= $_POST['keyword'];
$skill= $_POST['skills'];
$tit = $_POST['tit'];
$tit1 = $_POST['tit1'];
$tit2= $_POST['tit2'];
//$tit3= $_POST['tit3'];


$filetype = $_POST['filetype'];
$filetype1= $_POST['filetype1'];
$filetype2= $_POST['filetype2'];
//$filetype3= $_POST['filetype3'];



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

// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      

   $sql = 'INSERT INTO resources(name, image,category, amount,about ,skill1,skill2,skill3,skill4) VALUES 
   ("'.$title.'","'.$imagename.'","'.$category.'","'.$amount.'","'.$about.'","'.$skill[0].'","'.$skill[1].'","'.$skill[2].'","'.$skill[3].'")';
   
   if ($conn->query($sql) === TRUE) {

     $last_id = $conn->insert_id;
  

   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }

  } else {

  }
}








if($tit!=null){



$rand=rand(10000,90000);
$target_dir = "uploads/Resources/".$title.'/'.$filetype.'/'.$rand;
$target_file = $target_dir . basename($_FILES["files"]["name"]);
$imagename=$rand.basename($_FILES["files"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (!file_exists('uploads/Resources/'.$title.'/'.$filetype.'/')) {
mkdir('uploads/Resources/'.$title.'/'.$filetype.'/', 0777, true);
}




if ($uploadOk == 0) {

// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["files"]["tmp_name"], $target_file)) {

   $sql = 'INSERT INTO resources_files (name,filename, filetype, title,Rid ) VALUES 
   ("'.$title.'","'.$imagename.'","'.$filetype.'","'.$tit.'" ,"'.$last_id.'")';
   
   if ($conn->query($sql) === TRUE) {

   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }

  } else {

  }
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

    
    

    if ($uploadOk == 0) {


    } else {
      if (move_uploaded_file($_FILES["files1"]["tmp_name"], $target_file)) {
          
        //echo "The file ". htmlspecialchars( $rand.basename( $_FILES["image"]["name"])). " has been uploaded.";
       // echo $imagename;
       $sql = 'INSERT INTO resources_files (name,filename, filetype, title,Rid ) VALUES 
       ("'.$title.'","'.$imagename.'","'.$filetype1.'","'.$tit1.'","'.$last_id.'")';
       
       if ($conn->query($sql) === TRUE) {
     
   
       } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
       }
    
      } else {
   
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
 
        

        if ($uploadOk == 0) {
  
        } else {
          if (move_uploaded_file($_FILES["files2"]["tmp_name"], $target_file)) {
              
       
           $sql = 'INSERT INTO resources_files (name,filename, filetype, title,Rid ) VALUES 
           ("'.$title.'","'.$imagename.'","'.$filetype2.'","'.$tit2.'","'.$last_id.'")';
           
           if ($conn->query($sql) === TRUE) {
     
      
           } else {
             echo "Error: " . $sql . "<br>" . $conn->error;
           }
        
          } else {

          }
        }
        
        
        
        }
        
/*
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
          
            if ($uploadOk == 0) {
  
            // if everything is ok, try to upload file
            } else {
              if (move_uploaded_file($_FILES["files3"]["tmp_name"], $target_file)) {
                  
            
               $sql = 'INSERT INTO resources_files (name,filename, filetype, title ,Rid) VALUES 
               ("'.$title.'","'.$imagename.'","'.$filetype3.'","'.$tit3.'","'.$last_id.'")';
               
               if ($conn->query($sql) === TRUE) {
    
       
               } else {
                 echo "Error: " . $sql . "<br>" . $conn->error;
               }
            
              } else {
           
              }
            }
            
            
            
            }
            

*/



if($instructor!=0){
    $ctype='resource';
    $sql = 'INSERT INTO instructor (instructorId,resourceId,type) VALUES 
    ("'.$instructor.'","'.$last_id.'","'.$ctype.'")';
    
    if ($conn->query($sql) === TRUE) {
		$dates=date('d-m-Y');
		$notification='You are assigned as a faculty of  Resource  '.$title;
		$ntype='faculty';
       $sqls = 'INSERT INTO faculty_notification (userid,notification,type,dates) VALUES 
    ("'.$instructor.'","'.$notification.'","'.$ntype.'","'.$dates.'")';
		$conn->query($sqls);

    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

}



	$dates=date('d-m-Y');
		$notification='New  Resource '.$title.' Updated' ;
		$ntype='resource';
$nid='0';
       $sqlsd = 'INSERT INTO user_notification (userid,notification,type,dates,subid) VALUES 
    ("'.$nid.'","'.$notification.'","'.$ntype.'","'.$dates.'","'.$last_id.'")';
	   if ($conn->query($sqlsd) === TRUE) {
  
     // header('Location: resources.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }


echo "<script> var x=$last_id; </script>";

foreach($keyword as $x => $val) {
    if($val!=null){
        $sql = 'INSERT INTO keyword (keyword,type,name) VALUES 
        ("'.$val.'","Resource","'.$title.'")';
        
        if ($conn->query($sql) === TRUE) {
  header('Location: course_view.php?name='.$last_id);
          ?>

     <?php 
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
      }
      
      

      
      ?>
      <Script>
      
           window.location = "resource_view.php?name="+x;
      </Script>