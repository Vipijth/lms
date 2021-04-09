<?php
@ob_start();
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include("header.php");
include ("connection.php");
$orderid=$_SESSION['orderid'];

    $cartid = $_SESSION['cartid'];
    $am = $_SESSION['am'];

    $userid = $_SESSION['userid'];

    $useremail = $_SESSION['useremail'];
    $cat = $_SESSION['cat'];
$caid = $_SESSION['carid'];
    $stat = '1';
    $d = date("d/m/Y");
    $sub = $_SESSION['sub'];
     $amo = $_SESSION['amo'];
//if( $_SESSION['pay']=='1') {
    foreach ($cartid as $x => $val) {
        if ($val != null) {


               // $_SESSION['pay'] = '';

                $sqls = "UPDATE cart SET cartstatus='0' WHERE id='$caid[$x]'";
                $conn->query($sqls);
                //
            }
        }
   // }


require 'class/SMTP.php';
	 require 'class/Exception.php';
        require 'class/PHPMailer.php';
        $mail = new PHPMailer();
        $mail->IsSMTP();                              //Sets Mailer to send message using SMTP
        $mail->Mailer = "smtp";
       // $mail->SMTPDebug = 2;
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
        $mail->AddAddress($useremail);        //Adds a "To" address

        $mail->IsHTML(true);                            //Sets message type to HTML
        $mail->Subject = 'Welcome To Chrysaellect Meet';
        //Sets the Subject of the message

foreach($cartid as $x => $val) {
                    if($val!=null){ 
						
						
		$dates=date('d-m-Y');
		$notification='You Successfully Purchased New '.$cat[$x].' '.$sub[$x] ;
		$ntype='purchased';

       $sqlsd = 'INSERT INTO user_notification (userid,notification,type,dates) VALUES 
    ("'.$userid.'","'.$notification.'","'.$ntype.'","'.$dates.'")';
	   if ($conn->query($sqlsd) === TRUE) {
      echo "New ins created successfully";
     // header('Location: resources.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
					
						
						
						
        $body = '<center>
<table style="width:50%;background:white;height:400px;">
<tr>
<td>
<center>
<img src="http://meet.chrysaellect.com/assets/user/images/logo/logo3.png">
</center>

<table style="width:100%;background:white;height:100px;background:#E8E8E8;color:#707070;font-family:segoe ui regular;font-size:17px;text-align:center">
<tr>
<td>
 Chrysaellect M.E.E.T is Asia’s first upskilling and learning platform for teachers, educators, parents and edupreneurs who wish to hone their skills and understanding
               about concepts, theories and pedagogies related to early childhood education.  We bring to you the best faculty from across the globe, 
               each having a specialization in an area connected to early learning.
</table>
<center>


<font style="color:#000;font-family:segoe ui regular;font-size:16px">
<Span style="color:#6C5634 ; font-size:16px">
Thankyou for joining our community and trusting us.

</span>
<b>

 </b>
 <br> <br>

<small><small>
<b>
<span style="color:#707070;">
Order Id : 
</span>'.$orderid.'
</b>
</small></small><br><br>
<table style="width:100%;color:#707070;font-family:segoe ui semibold;font-size:18px;text-align:center">
<tr>
<th>
Items (Course / Resource / Module)
</th><th>
Qty
</th><th>
Price
</th>
</tr>
<tr style="color:black">
<th>
'. $sub[$x] .'
</th><th>
1
</th>'. $amo[$x] .'<th>

</th>
</tr>
</table>
<br>

</font>
<br><br>


<table style="width:100%;color:white;height:50px;background:#F16062;font-family:segoe ui semibold;font-size:19px;text-align:center">
<tr>
<td style="border-right:2px solid white">
<a href="http://meet.chrysaellect.com/dashboard.php" target="_blank" style="color:#fff;font-family:segoe ui regular;text-decoration:none">
View Dashboard
<a>
</td>

</table>
<br>

<a href="http://meet.chrysaellect.com/privacy.php" target="_blank" style="color:#6C5634;font-family:segoe ui semiblod;text-decoration:none"> Terms & Conditions</a>
</center>
</table>
</center>' ;
        $mail->Body = $body;

        if ($mail->Send())                                //Send an Email. Return true on success or false on error
        {
          

		}

        else {
            $error = '<label class="text-danger">Try Again Later..!</label>';
       }
					}}


?>

<div class="row " style="height:100px;">

</div>
<div class="row justify-content-md-center ">

    <div class="col-md-7" style="background:#eee;height:auto"  >

        <font style="color:red; font-size:45px; font-family:Segoe UI semibold">
            &nbsp;&nbsp;Shopping Cart

        </font>
        <br><br style="line-height:.8">

        <hr/ style="  border-top: 1px solid #afafaf;">
        <div class="row justify-content-md-center ">
            <table style="height:auto; width:100% ;">
                <tr  style="border-bottom:2px solid #afafaf">
                    <td style="width:10%;height:40px;">

                    </td>

                    <td style="width:25%;height:40px;">
                        <font style="color:green; font-size:20px; font-family:Segoe UI semibold">
                            &nbsp;&nbsp;Course/ Module
                    </td>

                    <td style="width:35%;height:40px;">
                        <font style="color:green; font-size:20px; font-family:Segoe UI semibold">
                            &nbsp;&nbsp;Product Name
                        </font>
                    </td>

                    <td style="width:20%;height:40px;">
                        <font style="color:green; font-size:20px; font-family:Segoe UI semibold">
                          Order Id
                        </font>
                    </td>

                    <td style="width:10%;height:40px;">

                    </td>

                </tr>
                <?php foreach($cartid as $x => $val) {
                    if($val!=null){ ?>
                <tr>


                    <td style="width:10%;height:40px;">


                    </td>
                    <td style="width:25%;height:40px;">
                        <font style="color:#707070; font-size:18px;font-family:Segoe UI semibold">
<?php echo $cat[$x]?>
                        </font>


                    </td>
                    <td style="width:35%;height:40px;">
                        <font style="color:#707070; font-size:18px;font-family:Segoe UI semibold; text-transform:capitalize">
                            <?php echo $sub[$x]?>
                        </font>
                    </td>
                    <td style="width:20%;height:40px;">
                        <font style="color:#707070; font-size:18px;font-family:Segoe UI semibold; text-transform:capitalize">
                            <?php echo $orderid?>
                        </font>
                    </td>
                    <td style="width:10%;height:40px;">
                        <center>


                        </center>
                    </td>

                </tr>
                <?php }} ?>

            </table>


        </div>
    </div>



    <div class="col-md-4" style="background:#eee;height:auto"  >

        <br><br> <br><br>
        <div class="row justify-content-md-center ">
            <div class="col-md-9" style="height:auto;background:white;border-radius:20px;box-shadow:2px 2px 2px 3px #afafaf;padding-right:16px"  >

                <font style="color:#707070; font-size:25px;font-family:Segoe UI semibold">

                    <br style="line-height:.8">
                    <span style="color:green;font-size: 22px">

                    <i class="fa fa-check-circle"></i>
                    PAYMENT SUCCESS FULL

                    </span>
                    <br style="line-height:.8">
                <!--  <span style="color:red;font-size: 22px">

                    <i class="fa fa-times-circle"></i>
                   PAYMENT FAILED

                    </span>-->
                    <br style="line-height:.8">
                    Product Order ID
                    <center>
                        <hr/ style="  border-top: 1px solid #afafaf;width:92%">
                    </center>
                    <small><small>

                            <?php echo $orderid?>
                        </small></small>

                    <br style="line-height:.3">

                    Total Amount

                    <center>
                        <hr/ style="  border-top: 1px solid #afafaf;width:92%">
                    </center>

                    <small><small>

                            &#8377;      <?php echo $am?>
                        </small></small>
                    <br style="line-height:.7">

                    <br style="line-height:.2">

<a href="dashboard.php">
    Go to Dashboard </a>

            </div></div>
        <br><br>
        </div>
    </div></div>









<?php
include ("footer.php");

?>

