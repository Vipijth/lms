<?php
include ("header.php");
include ("connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$useremail=$_SESSION['useremail'];
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
        $mail->FromName = 'Chrysaellect Meet';                    //Sets the From email address for the message
   
        $mail->AddAddress($useremail);        //Adds a "To" address

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
'.$_SESSION['username'].'
 </b>
 <br>
<br>Welcome To Chrysaellect MEET Summit<br><br>
<small><small>
Thankyou for joining our community and trusting us.
</small></small>
<br><br><br>
You Successfully Enrolled Summit Paid Plan
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
        if ($mail->Send())                                //Send an Email. Return true on success or false on error
        {
        }

$userid=$_SESSION['userid'];
$orderid=$_SESSION['summitorder'];
$amount=$_SESSION['summitamount'];

$rcsql= "SELECT * FROM summitusers where userid='$userid'";
$rcresult = $conn->query($rcsql);
if ($rcresult->num_rows <1) {
    header('Location:summithome.php');

}







$ntype='summit';
$dates=date('d/m/Y');

$userid=$_SESSION['userid'];
$notification="Chrysaellect MEET Summit Paid Plan Enrolled Successfully";
$sqln='insert into user_notification (userid,type,notification,dates)values  ("'.$userid.'","'.$ntype.'","'.$notification.'","'.$dates.'")';
if($conn->query($sqln)==true){

}else{
    echo "Error: " . $sqln . "<br>" . $conn->error; 
}



?>


<style>
input{display:none}
</style>

<div class="container-fluid" style="padding-top:120px">

    <div class="row justify-content-center" >



    <!--<div class="col-lg-10" style="font-family:segoe ui semibold; font-size:18px;color:#707070;text-align:justify">
  

    <big>About Crysaellect MEET Summit</big>
    <br>  <hr/>
    Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have
     scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.
    

     <br>  <br>
    </div>-->
    
        

<center>
<br>  <br>
<big><big><big>
 Payement Successfully Complted .  <li class="fa fa-check"></li> </big> <br> <br> <A href="summit.php">
 
 
 Click Here To Go to Summit</a>

</big></big>
</center>


             
    </div>


</div>




<?php include('footer.php'); ?>