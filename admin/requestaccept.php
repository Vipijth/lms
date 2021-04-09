<?php 
include ('connection.php');

$omail=$_POST['oemail'];
$oid=$_POST['oid'];
 $sql = "UPDATE users SET verified='1' WHERE id='$oid'";

              if ($conn->query($sql) === TRUE) {
				  
				$sqls = "UPDATE faculty SET verified='1' WHERE email like '$omail'";  
				  $conn->query($sqls);
echo " <script>alert(' Account Approved Successfully'); </script> " ;



    require '../class/class.phpmailer.php';
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
    $mail->AddAddress($omail);        //Adds a "To" address

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
'.$omail.'
 </b>
 <br>
<br>Welcome To Chrysaellect MEET<br><br>
<small><small>
Thankyou for joining our community and trusting us.
</small></small>
<br>

</font>
<br><br>
<table style="width:100%;color:white;height:50px;background:#F16062;font-family:segoe ui semibold;font-size:19px;text-align:center">
<tr>
<td style="border-right:2px solid white">
<a href="http://meet.chrysaellect.com/" target="_blank" style="color:#fff;font-family:segoe ui regular;text-decoration:none">
View Account
<a>
</td>
<td style="border-right:2px solid white">
<a href="http://meet.chrysaellect.com/resource.php" target="_blank" style="color:#fff;font-family:segoe ui regular;text-decoration:none">
View Resources
<a>
</td>
<td >
<a href="http://meet.chrysaellect.com/course.php" target="_blank" style="color:#fff;font-family:segoe ui regular;text-decoration:none">
View Courses
<a>
</td>
</table>
<br>

<a href="http://meet.chrysaellect.com/privacy.php" target="_blank" style="color:#6C5634;font-family:segoe ui semiblod;text-decoration:none"> Terms & Conditions</a>
</center>
</table>
</center>' ;
    $mail->Body = $body;
if($mail->Send()){ session_start();

           echo "
     <script>
         setTimeout(function(){
            window.location.href = 'request.php';
         }, 100);
      </script>";
                 

              } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
              }




}


?>