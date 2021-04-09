<?php
include ("header.php");
include ("connection.php");

$error='';
if(isset($_POST["submit"])) {
    $postmail = $_POST["email"];
    $sqlpost = "select * from users where email like '$postmail' ;";

    $resultpost = $conn->query($sqlpost);
    if ($resultpost->num_rows > 0) {
        $rand3 = rand(1000000000, 9000000000);


        require 'class/class.phpmailer.php';
        $mail = new PHPMailer();
        $mail->IsSMTP();                                //Sets Mailer to send message using SMTP
   $mail->Host = 'mail.LMS.com';       //Sets the SMTP hosts of your Email hosting, this for Godaddy
        $mail->Port = 465;
        //Sets the default SMTP server port
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
        $mail->Username = '_mainaccount@LMS.com';                    //Sets SMTP username
        $mail->Password = 'Faridah@2021';                    //Sets SMTP password
        //Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->From = '_mainaccount@LMS.com';                        //Sets the From email address for the message
        $mail->FromName = 'LMS Meet';
        $mail->AddAddress($_POST["email"]);        //Adds a "To" address

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

<b>
'.$_POST['mail'].'
 </b>
 <br>
<br>Welcome To LMS MEET<br><br>
<small><small>
Thankyou for joining our community and trusting us.
</small></small>
<br><br><br>
Your New Verification Code 
</font>
<br><br>
<table style="width:100%;color:white;height:50px;background:#F16062;font-family:segoe ui semibold;font-size:19px;text-align:center">
<tr>
<td>
'.$rand3.'
</table>
<br>
<r>
<a href="http://meet.LMS.com/privacy.php" target="_blank" style="color:#6C5634;font-family:segoe ui semiblod;text-decoration:none"> Terms & Conditions</a>
</center>
</table>
</center>';
       
        $mail->Body = $body;

        if ($mail->Send())                                //Send an Email. Return true on success or false on error
        {
            $error = '<label class="text-success">Check " ' . $postmail . ' " To Reset Password</label>';

        } else {
            $error = '<label class="text-danger">Try Again Later..!</label>';
        }

    }
    else{
        echo "<script> alert('Account Not Exists') </script>";
    }
}
?>

    <style>

        .button{
            background: #0A62A3;
            font-size: 14px;
            color:white;
            font-family: segoe ui semibold;
            padding:5px 16px;
            border: 0px;

        }
        select ,input{
            color:#455A64;
            width:90%;
            height:35px;
            background: white;
            border-radius: 15px;
            border: 1px solid #0A62A3;
            font-family: segoe ui regular;
            font-size: small;
            padding-left: 10px;
        }
        input, select:focus{

            outline:none
        }
    </style>




    <div class="container-fluid">
        <div class="row justify-content-end"  style="height: auto;padding:10%" >


            <div class="col-md-7" style="height:auto">
                <div class="row justify-content-center">
                    <img src="assets/user/images/logindemo.png">
                </div>
                <div class="row justify-content-center">

                    <div class="col-md-6 col-lg-6" >

                        <form action="" method="post">
                            <?php echo $error; ?><br>

                            <div class="row justify-content-center">
                                <br>


                            </div>
                            <br>

                            <div class="row" style="height:30px;" id="email" >
                                <input type="email" name="email" placeholder="Email Id"  required onchange="this.style.border='1px solid #EB4C5E'">
                                <i class="fa fa-envelope icon" style="color: #0A62A3;position: relative;left:80%;top: -120%"></i>
                                <br>
                            </div>

                    </div>


                </div>

                <center>
                    <br>

                    <button name="submit" class="button">
                      Reset Password
                    </button> </form>
                </center>       <br>
              <br><br>

            </div>
            <div class="col-md-3"   >
         
            </div>

        </div>

    </div>
<?php
include ("footer.php");
?>