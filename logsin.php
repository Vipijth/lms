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
                      $_SESSION["eca"] = $row["eca"];
                     $_SESSION["lastlog"] =   $lastlog;
					$_SESSION["username"] =  ucfirst($row['firstname']).' '.ucfirst($row['lastname']);
                      $url=$_SESSION['url'];
				  if($url!=''){
              
            unset($_SESSION['url']);
                
                header('Location: '.$url);
          }else{     

                     header('Location: dashboard.html');
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

                  header('Location: facdash.html');
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
     $eca = $_POST["eca"];
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
        $mail->Host = 'mail.chrysaellect.com';        //Sets the SMTP hosts of your Email hosting, this for Godaddy
        $mail->Port = 465;                            //Sets the default SMTP server port
      //  $mail->SMTPAutoTLS = false;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
        $mail->SMTPDebug  = 2;
        $mail->Username = '_mainaccount@chrysaellect.com';                    //Sets SMTP username
        $mail->Password = 'Faridah@2021';                    //Sets SMTP password
        //Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->From = '_mainaccount@chrysaellect.com';                        //Sets the From email address for the message
        $mail->FromName = 'Chrysaellect Meet';
        $admail=$_POST["email"];
        $mail->AddAddress($admail);        //Adds a "To" address

        $mail->IsHTML(true);                            //Sets message type to HTML
        $mail->Subject = 'Welcome To Chrysaellect Meet';
        //Sets the Subject of the message
        $body = '<center>
<table style="width:90%;background:white;height:400px;">
<tr>
<td>
<center>
<img src="http://meet.chrysaellect.com/assets/user/images/logo/logo3.png">
</center>
<table style="width:100%;background:white;height:100px;background:#E8E8E8;color:#707070;font-family:segoe ui regular;font-size:17px;text-align:justify">
<tr>
<td>
 Chrysaellect M.E.E.T is Asia’s first upskilling and learning platform for teachers, educators, parents and edupreneurs who wish to hone their skills and understanding
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
<br>Welcome To Chrysaellect MEET<br><br>
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
<a href="http://meet.chrysaellect.com/privacy.php" target="_blank" style="color:#6C5634;font-family:segoe ui semiblod;text-decoration:none"> Terms & Conditions</a>
</center>
</table>
</center>';
        $mail->Body = $body;
if($type=='teacher'){ 
        if ($mail->Send())                                //Send an Email. Return true on success or false on error
        {
            $sql = 'INSERT INTO users(firstname, lastname,email, mob,usertype,password,code,eca ) VALUES 
   ("' . $name . '","' . $lname . '","' . $email . '","' . $mob . '","' . $type . '","' . $password . '", "' . $rand . '", "' . $eca . '")';

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
        $mails->Host = 'mail.chrysaellect.com';        //Sets the SMTP hosts of your Email hosting, this for Godaddy
        $mails->Port = 465;                            //Sets the default SMTP server port
      //  $mail->SMTPAutoTLS = false;
        $mails->SMTPSecure = 'ssl';
        $mails->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
        $mails->Username = '_mainaccount@chrysaellect.com';                    //Sets SMTP username
        $mails->Password = 'Faridah@2021';                    //Sets SMTP password
        //Sets connection prefix. Options are "", "ssl" or "tls"
        $mails->From = '_mainaccount@chrysaellect.com';                        //Sets the From email address for the message
        $mails->FromName = 'Chrysaellect Meet';
            //Adds a "To" address

        $mails->IsHTML(true);                            //Sets message type to HTML
        $mails->Subject = 'Welcome To Chrysaellect Meet';
			
			       $admail='info@chrysaellect.com';
				    $mails->AddAddress($admail); 
				$mails->Subject = 'New Registration On Chrysaellect Meet';
				 $mails->Body =  '<center>
<table style="width:90%;background:white;height:400px;">
<tr>
<td>
<center>
<img src="http://meet.chrysaellect.com/assets/user/images/logo/logo3.png">
</center>
<table style="width:100%;background:white;height:100px;background:#E8E8E8;color:#707070;font-family:segoe ui regular;font-size:17px;text-align:justify">
<tr>
<td>
 Chrysaellect M.E.E.T is Asia’s first upskilling and learning platform for teachers, educators, parents and edupreneurs who wish to hone their skills and understanding
               about concepts, theories and pedagogies related to early childhood education.  We bring to you the best faculty from across the globe, 
               each having a specialization in an area connected to early learning.
</table>
<br>
<br><center>
<font style="color:#6C5634;font-family:segoe ui regular;font-size:22px">
New Registration,<br><br>
<b>
A new '.$type.' has been registered on Chrysaellect Meet.
 </b>
 <br>

<small><small>

</small></small>
<br>

</font>
<br><br>
<table style="width:100%;color:white;height:50px;background:#F16062;font-family:segoe ui semibold;font-size:19px;text-align:center">
<tr>
<td style="border-right:2px solid white">
<a href="http://meet.chrysaellect.com/admin" target="_blank" style="color:#fff;font-family:segoe ui regular;text-decoration:none">
View Dashboard
<a>
</td>


</table>
<br>

<a href="http://meet.chrysaellect.com/privacy.php" target="_blank" style="color:#6C5634;font-family:segoe ui semiblod;text-decoration:none"> Terms & Conditions</a>
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
        background: #EB4C5E;
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
.hid{
  display: none ;
}
</style>

<script>

    function verify()
    {
      var x=document.getElementById("topic").value;
     if(x!='0'){
         document.getElementById("topic").style.border="1px solid #EB4C5E";
         document.getElementById("name").style.display="block";
         document.getElementById("lname").style.display="block";
         document.getElementById("tel").style.display="block";
         document.getElementById("email").style.display="block";
         document.getElementById("password").style.display="block";
      document.getElementById("cpassword").style.display="block";
     }

        if(x=='school'){
            document.getElementById("topic").style.border="1px solid #EB4C5E";
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
                if(x=='teacher'){
          document.getElementById("code").style.display="block";
      }
      if(x!='teacher'){
          document.getElementById("code").style.display="none";
      }
    }
    
        function check(){
      document.getElementById("check").style.display="none";
      document.getElementById("check2").style.display="inline";
      document.getElementById("code2").style.display="block";
    }
    function check2(){
      document.getElementById("check").style.display="inline";
      document.getElementById("check2").style.display="none";
      document.getElementById("code2").style.display="none";
    }
	
	function cp(){
		var x=document.getElementById("cpassword").value;
		var y=document.getElementById("password").value;
		if(x!==y){
			alert('Passwords are not same');
			document.getElementById("cpassword").value='';
		}
	}
	
	  function codefy(){

    var y=document.getElementById("codein").value;
    if(y=='ECA2021'){
      document.getElementById("codeverify").innerHTML="Verified";
      document.getElementById("codein").disabled=true;
      document.getElementById("codeverify").disabled=true;
      document.getElementById("check2").style.display="none";
      document.getElementById("check3").style.display="inline";
      document.getElementById("eca").value='1';
    }else{
      document.getElementById("codeverify").innerHTML="try again!";
    }
  }

  function login(){
document.getElementById("login").style.display="flex";
document.getElementById("signup").style.display="none";
  }
  function signup(){
document.getElementById("login").style.display="none";
document.getElementById("signup").style.display="flex";
  }
</script>
  


<!-- partial:index.partial.html -->

<div class="container-fluid" style="padding-top: 90px">
<div class="row justify-content-center " >
    <div class="col-sm-11 col-xl-3 col-md-5" style="height:auto;  background:#EB4C5E;margin:10px">
    <div class="row" style="height:60px;padding-top:10px;border-bottom:1px solid white">
       <div class="col" >
           <button type="submit" class="btn btn-primary mb-2" style="background-color: transparent;border:none" onclick="login()">Login</button>
        </div>  
         <div class="col">
             <button type="submit" class="btn btn-primary mb-2" style="background-color: transparent;border:none" onclick="signup()"> Sign Up</button>
          </div>  
    </div>
    <div class="row" style="padding:30px 20px;color:white" id="login" >
    <form class="form-signin" action="" method="post" >
       <div class="form-group">
         <label for="exampleFormControlInput1">Email address</label>
           <input type="email" name="email"  class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
         </div>
         <div class="form-group">
         <label for="psd">Password</label>
           <input type="password" name="password"  class="form-control" id="psd" placeholder="**********">
         </div>
         <div class="form-group" style="padding-left:30% ;">
 
            <button type="submit" name="submit" class="btn btn-primary mb-2" style="border:none;border-radius:8px;padding:5px 30px;background:white;color:#EB4C5E">Login</button>
          
 
         </div>
    </form>
    </div>


    <div class="row" style="padding:30px 20px;color:white;display:none;" id="signup" >
    <form class="form-signin" action="" method="post" >
       <div class="form-group">
        
         <select id="topic" name="topic" onChange="verify()" style="position:absolute;left:6%;width:80%">
                                            <option value="0"> Select an option </option>
                                           <option value="teacher"> Teacher / Parent / Educator</option>
                                           <option value="faculty"> MEET Faculty</option>
                                           <option value="school"> School</option>
                                           </select>
                                           	</div>
<br>


<div class="form-group ">
        
        <input type="text" name="name"  required class="form-control hid" id="name" placeholder="First Name  ">
      </div>
      <div class="form-group ">
        
        <input type="text" name="lname"  class="form-control hid " id="lname" placeholder="Last Name ">
      </div>
    <div class="form-group ">
        
        <input type="text" name="mob"  class="form-control hid" id="tel" placeholder="Contact Number ">
      </div>

         <div class="form-group ">
        
        <input type="email" name="email" required class="form-control hid" id="email" placeholder="Email Address">
      </div>
        <div class="form-group ">
        
           <input type="password" name="password " required class="form-control hid" id="password" placeholder="Password">
         </div>
         <div class="form-group ">
       
           <input type="password" onchange="cp()" name="confirmpassword" required class="form-control hid" id="cpassword" placeholder="Confirm Password">
         </div>

         <div class="form-group" >
  <div id="code" style="display: none;width:100%">
          
          <br style="line-height: .6">
           <Small> Check this box if you are a ECA member  </Small>
          <i class="fa fa-square-o fa-1x" aria-hidden="true" id="check" onclick="check()" ></i>
          <i class="fa fa-check-square-o fa-1x" aria-hidden="true" id="check2" onclick="check2()" style="display: none;"></i>
          <i class="fa fa-check-square-o fa-1x" aria-hidden="true" id="check3" style="display: none;"></i>
         
          
          <div id="code2" style="display: none;">
          <br style="line-height: .4">
        <Small>  <b> Code : </b></Small>
        <input type="text"  id="codein" style="width: 100px;color:#212;height:35px">
          <button type="button" id="codeverify" onclick="codefy()" style="width: 90px;height:30px;color:white; font-family:segoe ui semibold;border-radius:20px;color:#212;border:none;background:gold"> Verify</button>
          </div>        </div>
         </div>


         <div class="form-group" style="padding-left:40% ;">
 
            <button type="submit" name="subm" class="btn btn-primary mb-2" style="border:none;border-radius:8px;padding:5px 20px;background:white;color:#EB4C5E;width:100px">Sign Up</button>
          
 
         </div>
      
    </form>
    </div>
  
  </div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js'></script><script  src="assets/user/js/log.js"></script>
