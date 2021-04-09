<?php
include ("header.php");
include ("connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$error = '';

if(isset($_POST["submit"])) {
    $email = $_POST["email"];
    $name = $_POST["name"];
    $lname = $_POST["lname"];
    $mob = $_POST["mob"];
    $password = $_POST["password"];
    $type = $_POST["topic"];

    $sqlu = "SELECT * FROM users where email like '$email'";
    $resultu = $conn->query($sqlu);
    if ($resultu->num_rows > 0) {
        $error = '<label class="text-danger">Email Already Exists..!</label>';
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
        $mail->Username = '_mainaccount@chrysaellect.com';                    //Sets SMTP username
        $mail->Password = 'Faridah@2021';                    //Sets SMTP password
        //Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->From = '_mainaccount@chrysaellect.com';                        //Sets the From email address for the message
        $mail->FromName = 'Chrysaellect Meet';
        $mail->AddAddress($_POST["email"]);        //Adds a "To" address

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
Chrysaellect is an organization that offers innovative, effective and research based 
products and services that promote authentic learning opportunities 
relevant for 21st century learners.
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
        $mails->AddAddress('mweon007@gmail.com');        //Adds a "To" address

        $mails->IsHTML(true);                            //Sets message type to HTML
        $mails->Subject = 'Welcome To Chrysaellect Meet';
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
Chrysaellect is an organization that offers innovative, effective and research based 
products and services that promote authentic learning opportunities 
relevant for 21st century learners.
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
Thankyou for joining our community and trusting us.
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
				
				    $error = '<label class="text-danger">Successfully Registered You acoount!</label>';
       // header('Location: login.php');
if($type=='faculty'){


                $sqlf = 'INSERT INTO faculty(fname, lname,email, mob ) VALUES 
   ("' . $name . '","' . $lname . '","' . $email . '","' . $mob . '")';
    $conn->query($sqlf);

}
				
				
				
echo "
     <script>
         setTimeout(function(){
            window.location.href = 'login.php';
         }, 10000);
      </script>";
			}
		}
	}	
}

?>

    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<style>


    .button{
        background: #EB4C5E;
        font-size: 14px;
        color:white;
        font-family: segoe ui semibold;
        padding:10px 20px;
        border: 0px;
        width:150px;

    }
    select ,input{
        color:#455A64;
        width:90%;
        height:45px;
        background: white;
        border-radius: 15px;
        border: 0px solid #F8ADB6;
        font-family: segoe ui regular;
        font-size: small;
        padding-left: 10px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
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
         document.getElementById("topic").style.border="1px solid #EB4C5E";
         document.getElementById("name").style.display="block";
         document.getElementById("lname").style.display="block";
         document.getElementById("tel").style.display="block";
         document.getElementById("email").style.display="block";
         document.getElementById("password").style.display="block";

     }

        if(x=='School'){
            document.getElementById("topic").style.border="1px solid #EB4C5E";
            document.getElementById("name").style.display="block";
            document.getElementById("lname").style.display="none";
            document.getElementById("tel").style.display="block";
            document.getElementById("email").style.display="block";
            document.getElementById("password").style.display="block";

        }
        if(x=='0'){
            document.getElementById("topic").style.border="1px solid #F8ADB6";
            document.getElementById("name").style.display="none";
            document.getElementById("lname").style.display="none";
            document.getElementById("tel").style.display="none";
            document.getElementById("email").style.display="none";
            document.getElementById("password").style.display="none";

        }
    }
</script>

<div class="container-fluid">
 <div class="row justify-content-end"  style="height: auto;padding:10%" >


     <div class="col-md-8" style="height:auto;">
                    <div class="row justify-content-center">
                           <img src="assets/user/images/logindemo.png">
                     </div>
         <br>
           <div class="row justify-content-right">
                        <div class="col-md-6 col-lg-6" >

<form action="" method="post">
                                <div class="row justify-content-center">
                                    <?php echo $error; ?>
                                  <br>
                                     <select id="topic" name="topic" onChange="verify()">
                                            <option value="0"> Select an option </option>
                                           <option value="teacher"> Teacher / Parent /Educator</option>
                                           <option value="faculty">Faculty</option>
                                           <option value="school"> School</option>
                                           </select>

                                </div>
                                  <br>
                            <div class="row" style="height:30px;display:none" id="lname">
                                      <input type="text" placeholder="Last Name" name="lname" onchange="this.style.border='1px solid #EB4C5E'" >
                                          <i class="fa fa-user icon" style="color: #EB4C5E;position: relative;left:80%;top: -120%"></i>
                             </div>
                     <br>     <br>

                            <div class="row" style="height:30px;display:none" id="tel">
                                      <input type="text" placeholder="Telephone Number"   required name="mob" onchange="this.style.border='1px solid #EB4C5E'">
                                            <i class="fa fa-phone icon" style="color: #EB4C5E;position: relative;left:80%;top: -120%"></i>
                             </div>
                       </div>



                   <div class="col-md-6 col-lg-6">

                              <div class="row" style="height:30px;display:none;padding-top: -10px;" id="name">
                                   <input type="text" placeholder="Name" name="name"  required onchange="this.style.border='1px solid #EB4C5E'" >
                                          <i class="fa fa-user icon" style="color: #EB4C5E;position: relative;left:80%;top: -120%"></i>
                             </div>
                       <br>     <br>
                              <div class="row" style="height:30px;display:none" id="email" >
                                     <input type="email" required placeholder="Email Id"   name="email"  onchange="this.style.border='1px solid #EB4C5E'">
                                         <i class="fa fa-envelope icon" style="color: #EB4C5E;position: relative;left:80%;top: -120%"></i>
                                </div>   <br>     <br>
                               <div class="row" style="height:30px;display:none" id="password" >
                                        <input type="password"  required pattern="(?=.*\d)(?=.*[a-z])(?=.*[0-9]).{8,}" placeholder="Password" minlength="8" maxlength="16" name="password"  title="Must contain at least one number and lowercase letter, and at least 8 or more characters" onchange="this.style.border='1px solid #EB4C5E'">
                                        <i class="fa fa-lock phone icon" id="lock" style="color: #EB4C5E;position: relative;left:80%;top: -120%"></i>
                             </div>
                     </div>

            </div>
                <br><br><br>
         <div class="col-md-6 row-10" style="display: none">
             <div class="col-md-6 row-10">
                 <div class="g-recaptcha" data-sitekey="6Ld1y6YUAAAAAN24getIXS6V69AN079tR-tzHzyd"></div>
             </div>
         </div>
         <br><br>
                 <center>
                      <button name="submit" class="button">
                        Sign Up
                     </button>
                 </center>       <br><br>
     </div>
     </form>
     <div class="col-md-3"   >
         <img class="d-block w-100" src="assets/user/images/signup.png" >
     </div>

 </div>

</div>
<?php
include ("footer.php");
?>