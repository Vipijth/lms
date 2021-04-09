<?php
	include ("connection.php");

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$password=$_POST['password'];
$accesss=$_POST['access'];
$access='0';
$slider='0';

$resources='0';
$course='0';
$blogs='0';
$faculty='0';

	   $sqlpost="select * from admin where email like '$email' ;";
    $resultpost = $conn->query($sqlpost);
    if ($resultpost->num_rows > 0) {
		
	        echo " <script>alert(' Email  Already Exists'); </script> " ;
       // header('Location: login.php');

echo "
     <script>
         setTimeout(function(){
            window.location.href = 'access_control.php';
         }, 1000);
      </script>";
	}
else{ 


$count=0;
$dates=date('d-m-Y');

foreach($accesss as $x => $val) {
$count=$count+1;
  if($val=='slider'){
	$slider='1';
}
    if($val=='resources'){
	$resources='1';
}
if($val=='course'){
	$course='1';
}
  if($val=='blogs'){
	$blogs='1';
}
  if($val=='faculty'){
	$faculty='1';
}


	
	
	if($val=='access'){
	$access='1';
$slider='1';
$resources='1';
$course='1';$blogs='1';

$faculty='1';
		
}
	
  }
$ac='0';

$sql = 'INSERT INTO admin (first_name,last_name,email,password,slider,resources,course,blogs,faculty,count) VALUES 
    ("'.$fname.'","'.$lname.'","'.$email.'","'.$password.'","'.$slider.'","'.$resources.'","'.$course.'","'.$blogs.'","'.$faculty.'","'.$count.'")';
    
    if ($conn->query($sql) === TRUE) {

     header('Location: access_control.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>