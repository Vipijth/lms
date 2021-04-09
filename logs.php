<?php
include ("header.php");
include ("connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$error='';
if(isset($_POST["submit"])) {
    $postmail = $_POST["email"];
    $postpassword=$_POST["password"];

$sqlpost="select * from users where email like '$postmail' ;";
    $resultpost = $conn->query($sqlpost);
    if ($resultpost->num_rows > 0) {
        while($row = $resultpost->fetch_assoc()) {
          if($postpassword!=$row["password"]){
              echo "<script> alert('Incorrect Password') </script>";
          }
          else{
              if($row["verified"]=='0'){
				if($row['usertype']=='teacher'){ 
                  $rand3 = rand(1000000000, 9000000000);
                  session_start();

                  header('Location: verify.php?valido='.$postmail.'_%44s921&81'.$rand3);
				}
				  else{
					    echo " <script>alert('Your Account Not Activated..Please Contact Admin '); </script> " ;
				  }
              }
              else{
                  $lastlog=date("Y-m-d");
                  session_start();
                    $un= $row["email"];
             $token = uniqid();
            $_SESSION['usernames'] =  $un;
            $_SESSION['token'] = $token;
				     $result_token = mysqli_query($conn, "select count(*) as allcount from user_token where username='".$uname."' ");
            $row_token = mysqli_fetch_assoc($result_token);
            if($row_token['allcount'] > 0){
                mysqli_query($conn,"update user_token set token='".$token."' where username='".$un."'");
            }else{
                mysqli_query($conn,"insert into user_token(username,token) values('".$un."','".$token."')");
}
                 if($row["usertype"]=='teacher'){
                     $_SESSION["useremail"] = $row["email"];
                     $_SESSION["userid"] = $row["id"];
                     $_SESSION["utype"] = 'teacher';
                     $_SESSION["lastlog"] =   $lastlog;
					$_SESSION["username"] =  ucfirst($row['firstname']).' '.ucfirst($row['lastname']);
                      $url=$_SESSION['url'];
				  if($url!=''){
              
            unset($_SESSION['url']);
                
                header('Location: '.$url);
          }else{     

                     header('Location: dashboard.php');
                 }
                 }
                  if($row["usertype"]=='faculty'){
                      $_SESSION["useremail"] = $row["email"];
                      $_SESSION["userid"] = $row["id"];
                      $_SESSION["utype"] ='faculty';
                      $_SESSION["lastlog"] =   $lastlog;
                     
					  	$_SESSION["username"] = ucfirst($row['firstname']).' '.ucfirst($row['lastname']);
					  	            $url=$_SESSION['url'];
				  if($url!=''){
              
            unset($_SESSION['url']);
                
                header('Location: '.$url);
          }else{     

                  header('Location: facdash.php');
                 }
                  }
                  if($row["usertype"]=='school'){
                      $_SESSION["useremail"] = $row["email"];
                      $_SESSION["userid"] = $row["id"];
                      $_SESSION["utype"] ='school';
                      $_SESSION["lastlog"] =   $lastlog;
                    
		  	            $url=$_SESSION['url'];
				  if($url!=''){
              
            unset($_SESSION['url']);
                
                header('Location: '.$url);
          }else{     

                header('Location: school_dashboard.php');
                 }
                  }
              }

          }
        }
    }
    else{
       echo "<script> alert('Account Not Exists') </script>";
    }


}

if(isset($_POST["subm"])) {
    $email = $_POST["email"];
    $name = $_POST["name"];
    $lname = $_POST["lname"];
    $mob = $_POST["mob"];
    $password = $_POST["password"];
    $type = $_POST["topic"];

    $sqlu = "SELECT * FROM users where email like '$email'";
    $resultu = $conn->query($sqlu);
    if ($resultu->num_rows > 0) {
  echo "<script> alert('Email ALready Exists') </script>";
    } else {


        $rand = rand(100000, 900000);
        $rand2 = rand(100000, 900000);
 require 'class/SMTP.php';
	 require 'class/Exception.php';
        require 'class/PHPMailer.php';
        $mail = new PHPMailer();
        $mail->IsSMTP();                              //Sets Mailer to send message using SMTP
        $mail->Mailer = "smtp";
        //$mail->SMTPDebug = 2;
        $mail->Host = 'mail.LMS.com';        //Sets the SMTP hosts of your Email hosting, this for Godaddy
        $mail->Port = 465;                            //Sets the default SMTP server port
      //  $mail->SMTPAutoTLS = false;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
        $mail->Username = '_mainaccount@LMS.com';                    //Sets SMTP username
        $mail->Password = 'Faridah@2021';                    //Sets SMTP password
        //Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->From = '_mainaccount@LMS.com';                        //Sets the From email address for the message
        $mail->FromName = 'LMS Meet';
        $admail=$_POST["email"];
        $mail->AddAddress($admail);        //Adds a "To" address

        $mail->IsHTML(true);                            //Sets message type to HTML
        $mail->Subject = 'Welcome To LMS Meet';
        //Sets the Subject of the message
        $body = '<center>
<table style="width:90%;background:white;height:400px;">
<tr>
<td>
<center>
<img src="http://meet.LMS.com/assets/user/images/logo/logo3.png">
</center>
<table style="width:100%;background:white;height:100px;background:#E8E8E8;color:#707070;font-family:segoe ui regular;font-size:17px;text-align:justify">
<tr>
<td>
 LMS M.E.E.T is Asia’s first upskilling and learning platform for teachers, educators, parents and edupreneurs who wish to hone their skills and understanding
               about concepts, theories and pedagogies related to early childhood education.  We bring to you the best faculty from across the globe, 
               each having a specialization in an area connected to early learning.
</table>
<br>
<br><center>
<font style="color:#6C5634;font-family:segoe ui regular;font-size:22px">
Congratulations,
<b>
'.$_POST['name'].'
 </b>
 <br>
<br>Welcome To LMS MEET<br><br>
<small><small>
Thankyou for joining our community and trusting us.
</small></small>
<br><br><br>
Your Verification Code 
</font>
<br><br>
<table style="width:100%;color:white;height:50px;background:#F16062;font-family:segoe ui semibold;font-size:19px;text-align:center">
<tr>
<td>
'.$rand.'
</table>
<br>
<r>
<a href="http://meet.LMS.com/privacy.php" target="_blank" style="color:#6C5634;font-family:segoe ui semiblod;text-decoration:none"> Terms & Conditions</a>
</center>
</table>
</center>';
        $mail->Body = $body;
if($type=='teacher'){ 
        if ($mail->Send())                                //Send an Email. Return true on success or false on error
        {
            $sql = 'INSERT INTO users(firstname, lastname,email, mob,usertype,password,code ) VALUES 
   ("' . $name . '","' . $lname . '","' . $email . '","' . $mob . '","' . $type . '","' . $password . '", "' . $rand . '")';

            if ($conn->query($sql) === TRUE) {


                $rand3 = rand(1000000000, 9000000000);
                session_start();

             header('Location: verify.php?valido='.$email.'_%44s921&81'.$rand3);

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

       } else {
            $error = '<label class="text-danger">Try Again Later..!</label>';
       }

    }
		else{
			  $sql = 'INSERT INTO users(firstname, lastname,email, mob,usertype,password,code ) VALUES 
   ("' . $name . '","' . $lname . '","' . $email . '","' . $mob . '","' . $type . '","' . $password . '", "' . $rand . '")';
			if ($conn->query($sql) === TRUE) {
			    				   $mails = new PHPMailer();
        $mails->IsSMTP();                              //Sets Mailer to send message using SMTP
        $mails->Mailer = "smtp";
        //$mail->SMTPDebug = 2;
        $mails->Host = 'mail.LMS.com';        //Sets the SMTP hosts of your Email hosting, this for Godaddy
        $mails->Port = 465;                            //Sets the default SMTP server port
      //  $mail->SMTPAutoTLS = false;
        $mails->SMTPSecure = 'ssl';
        $mails->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
        $mails->Username = '_mainaccount@LMS.com';                    //Sets SMTP username
        $mails->Password = 'Faridah@2021';                    //Sets SMTP password
        //Sets connection prefix. Options are "", "ssl" or "tls"
        $mails->From = '_mainaccount@LMS.com';                        //Sets the From email address for the message
        $mails->FromName = 'LMS Meet';
            //Adds a "To" address

        $mails->IsHTML(true);                            //Sets message type to HTML
        $mails->Subject = 'Welcome To LMS Meet';
			
			       $admail='info@LMS.com';
				    $mails->AddAddress($admail); 
				$mails->Subject = 'New Registration On LMS Meet';
				 $mails->Body =  '<center>
<table style="width:90%;background:white;height:400px;">
<tr>
<td>
<center>
<img src="http://meet.LMS.com/assets/user/images/logo/logo3.png">
</center>
<table style="width:100%;background:white;height:100px;background:#E8E8E8;color:#707070;font-family:segoe ui regular;font-size:17px;text-align:justify">
<tr>
<td>
 LMS M.E.E.T is Asia’s first upskilling and learning platform for teachers, educators, parents and edupreneurs who wish to hone their skills and understanding
               about concepts, theories and pedagogies related to early childhood education.  We bring to you the best faculty from across the globe, 
               each having a specialization in an area connected to early learning.
</table>
<br>
<br><center>
<font style="color:#6C5634;font-family:segoe ui regular;font-size:22px">
New Registration,<br><br>
<b>
A new '.$type.' has been registered on LMS Meet.
 </b>
 <br>

<small><small>
Thankyou for joining our community and trusting us.
</small></small>
<br>

</font>
<br><br>
<table style="width:100%;color:white;height:50px;background:#F16062;font-family:segoe ui semibold;font-size:19px;text-align:center">
<tr>
<td style="border-right:2px solid white">
<a href="http://meet.LMS.com/admin" target="_blank" style="color:#fff;font-family:segoe ui regular;text-decoration:none">
View Dashboard
<a>
</td>


</table>
<br>

<a href="http://meet.LMS.com/privacy.php" target="_blank" style="color:#6C5634;font-family:segoe ui semiblod;text-decoration:none"> Terms & Conditions</a>
</center>
</table>
</center>' ;
				$mails->Send();
				
				    
       // header('Location: login.php');
if($type=='faculty'){


                $sqlf = 'INSERT INTO faculty(fname, lname,email, mob ) VALUES 
   ("' . $name . '","' . $lname . '","' . $email . '","' . $mob . '")';
    $conn->query($sqlf);

}
				
				
				
echo "
     <script>
     alert ('Successfully Registered You acoount!');
         setTimeout(function(){
            window.location.href = 'logs.php';
         }, 100);
      </script>";
			}
		}
	}	
}



    ?>

<style>

    select {
        color:#fff;
        width:90%;
        height:45px;
        background: #0A62A3;
        border-radius: 15px;
        border: 0px solid #F8ADB6;
        font-family: segoe ui regular;
        font-size: small;
        padding-left: 10px;
       border:1px solid white;
    }
   input, select:focus{

        outline:none
    }

</style>

<script>

    function verify()
    {
      var x=document.getElementById("topic").value;
     if(x!='0'){
         document.getElementById("topic").style.border="1px solid #0A62A3";
         document.getElementById("name").style.display="block";
         document.getElementById("lname").style.display="block";
         document.getElementById("tel").style.display="block";
         document.getElementById("email").style.display="block";
         document.getElementById("password").style.display="block";
      document.getElementById("cpassword").style.display="block";
     }

        if(x=='school'){
            document.getElementById("topic").style.border="1px solid #0A62A3";
            document.getElementById("name").style.display="block";
         document.getElementById("lname").style.display="none";
            document.getElementById("tel").style.display="block";
            document.getElementById("email").style.display="block";
            document.getElementById("password").style.display="block";
 document.getElementById("cpassword").style.display="block";
        }
        if(x=='0'){
            document.getElementById("topic").style.border="1px solid #F8ADB6";
            document.getElementById("name").style.display="none";
            document.getElementById("lname").style.display="none";
            document.getElementById("tel").style.display="none";
            document.getElementById("email").style.display="none";
            document.getElementById("password").style.display="none";
 document.getElementById("cpassword").style.display="none";
        }
    }
	
	function cp(){
		var x=document.getElementById("cpassword").value;
		var y=document.getElementById("password").value;
		if(x!==y){
			alert('Passwords are not same');
			document.getElementById("cpassword").value='';
		}
	}
</script>
  <link rel="stylesheet" href="assets/user/css/log.css">


<!-- partial:index.partial.html -->

<div class="container-fluid" style="padding-top: 80px">
  <div class="frame" style="background:#0A62A3 !important;height:580px !important;width:360px !important">
    <div class="nav">
      <ul class"links">	
        <li class="signin-active li"><a class="btn" style="color:white;border-bottom:0px solid white"> Log in</a></li>
        <li class="signup-inactive li"><a class="btn" style="color:white;border-bottom:0px solid white"> Sign up </a></li>
      </ul>
    </div>
    <div ng-app ng-init="checked = false">
				        <form class="form-signin" action="" method="post" >
							
          <label for="username">Username</label>
          <input class="form-styling" type="email" required name="email" style="position: relative;left:-5%;width:300px" placeholder=""/><br><br>
          <label for="password">Password</label>
          <input class="form-styling" type="password" required name="password"  style="position: relative;left:-5%;width:300px" placeholder=""/>
   
      
          <div class="btn-animate" style="background: transparent;color:white !important;width:300px">
            <button class="btn-signin" style="color:#0A62A3;width:290px " name="submit"><b>Log in</b></button>
          </div>
				        </form>
        
				        <form class="form-signup" action="" method="post" name="form">
							
			<select id="topic" name="topic" onChange="verify()" style="position:absolute;left:6%;width:80%">
                                            <option value="0"> Select an option </option>
                                           <option value="teacher"> Teacher / Parent / Educator</option>
                                           <option value="faculty"> Faculty</option>
                                           <option value="school"> School</option>
                                           </select>				
			<br>		<br>				
 
          <input class="form-styling" style="display:none;width:300px" required type="text" name="name" placeholder="First Name" id="name"  />
		       <br style="line-height: .4">
							
          <input class="form-styling"  style="display:none;width:300px" type="text" name="lname" id="lname"   placeholder="Last Name"/>	
		        <br style="line-height: .4">
					
          <input class="form-styling" type="text" required  style="display:none;width:300px" name="mob" id="tel"   placeholder="Mobile Number"/>					
							
          <br style="line-height: .4">
          <input class="form-styling" type="text" required name="email" placeholder="Email Id" id="email"  style="display:none;width:300px" />
           <br style="line-height: .4">
          <input class="form-styling" type="password" required name="password" id="password" placeholder="Password"  style="display:none;width:300px" />
        <br style="line-height: .4">
          <input class="form-styling" type="password" required name="confirmpassword" placeholder="Confirm Password" id="cpassword" style="display:none;width:300px" onchange="cp()"/>
          <center><button  class="btn-signup" style="background:white;color:#0A62A3;width:200px;position:absolute;left:19%" name="subm">Sign Up</button> </center>
				        </form>
      
        
      </div>
      <br><br>
      <div class="forgot">
        <a   href="forgot.php" style="color:white" >Forgot your password?</a>
      </div>
      
  
  </div>
    

</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js'></script><script  src="assets/user/js/log.js"></script>
