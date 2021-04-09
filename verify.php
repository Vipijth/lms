<?php
//include("header.php");
include ("connection.php");
$id = $_REQUEST['valido'];
$error = '';
$oid=substr($id, 0, -6);  $omail = "";
//echo $oid;
if(isset($_POST["resend"])) {
    $omail = $_POST["resendvalue"];


    $rand = rand(100000, 900000);
    $rand2 = rand(100000, 900000);

    require 'class/class.phpmailer.php';
    $mail = new PHPMailer();
    $mail->IsSMTP();                                //Sets Mailer to send message using SMTP
 $mail->Host = 'mail.chrysaellect.com';       //Sets the SMTP hosts of your Email hosting, this for Godaddy
    $mail->Port = 465;
    //Sets the default SMTP server port
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
    $mail->Username = '_mainaccount@chrysaellect.com';                    //Sets SMTP username
    $mail->Password = 'Faridah@2021';                    //Sets SMTP password
    //Sets connection prefix. Options are "", "ssl" or "tls"
    $mail->From = '_mainaccount@chrysaellect.com';                        //Sets the From email address for the message
    $mail->FromName = 'Chrysaellect Meet';
    $mail->AddAddress($_POST["resendvalue"]);       //Adds a "To" address

    $mail->IsHTML(true);                            //Sets message type to HTML
    $mail->Subject = 'Welcome To Chrysaellect Meet';
    //Sets the Subject of the message
        $body = '<center>
<table style="width:90%;background:white;height:400px;">
<tr>
<td>
<center>
<img src="http://meet.chrysaellect.com/assets/user/images/logo/logo.png">
</center>
<table style="width:100%;background:white;height:100px;background:#E8E8E8;color:#707070;font-family:segoe ui regular;font-size:17px;text-align:center">
<tr>
<td>
 Chrysaellect M.E.E.T is Asia’s first upskilling and learning platform for teachers, educators, parents and edupreneurs who wish to hone their skills and understanding
               about concepts, theories and pedagogies related to early childhood education.  We bring to you the best faculty from across the globe, 
               each having a specialization in an area connected to early learning.
</table>
<br>
<br><center>
<font style="color:#6C5634;font-family:segoe ui regular;font-size:22px">
Congratulations
<b>

 </b>
 <br>
<br>Welcome To Chrysaellect MEET<br><br>
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
    $sql = "UPDATE users SET code='$rand' WHERE email='$oid'";

    if ($conn->query($sql) === TRUE) {
        echo " <script>alert(' New Verification Code Sent Successfully'); </script> " ;

        $error = '<label class="text-success">New Verification Code Sent Successfully </label>';

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    } else {
    //    $error = '<label class="text-danger">Try Again Later..!</label>';
     }
}




if(isset($_POST["submit"])) {
    $code = $_POST["code"];
    $sqlu = "SELECT * FROM users where email like '$oid'";
    $resultu = $conn->query($sqlu);
    if ($resultu->num_rows > 0) {
        while ($row = $resultu->fetch_assoc()) {
          $ccode=  $row["code"];
            $type=  $row["usertype"];
            $verified  =$row["verified"];
            if($verified==1){

                session_start();

          header('Location: logs.php?valido='.$oid);
            }

          if($code==$ccode){
			       if($type=='faculty'){
                  $sqlj = "UPDATE faculty SET verified='1' WHERE email='$oid'";
                  $conn->query($sqlj);
              }
              $sql = "UPDATE users SET verified='1' WHERE email='$oid'";

              if ($conn->query($sql) === TRUE) {
				  
				  
				  


     require 'class/class.phpmailer.php';
    $mail = new PHPMailer();
    $mail->IsSMTP();                                //Sets Mailer to send message using SMTP
 $mail->Host = 'mail.chrysaellect.com';       //Sets the SMTP hosts of your Email hosting, this for Godaddy
    $mail->Port = 465;
    //Sets the default SMTP server port
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
    $mail->Username = '_mainaccount@chrysaellect.com';                    //Sets SMTP username
    $mail->Password = 'Faridah@2021';                    //Sets SMTP password
    //Sets connection prefix. Options are "", "ssl" or "tls"
    $mail->From = '_mainaccount@chrysaellect.com';                        //Sets the From email address for the message
    $mail->FromName = 'Chrysaellect Meet';
      $mail->AddAddress($oid);       //Adds a "To" address

    $mail->IsHTML(true);                            //Sets message type to HTML
    $mail->Subject = 'Welcome To Chrysaellect Meet';
    //Sets the Subject of the message
    $body = '<center>
<table style="width:90%;background:white;height:400px;">
<tr>
<td>
<center>
<img src="http://meet.chrysaellect.com/assets/user/images/logo/logo.png">
</center>
<table style="width:100%;background:white;height:100px;background:#E8E8E8;color:#707070;font-family:segoe ui regular;font-size:17px;text-align:center">
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
'.$oid.'
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
$mail->Send();
echo " <script>alert(' Verified Successfully'); </script> " ;
 echo "
     <script>
         setTimeout(function(){
            window.location.href = 'logs.php';
         }, 1000);
      </script>";
                  session_start();

             header('Location: login.php');

              } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
              }

         
          }
          else{
              $error = '<label class="text-danger">Wrong Verification Code..! </label>';
          }

        }
    }
}
?>
    <!doctype html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Chrysaellect M.E.E.T</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/user/css/bootstrap.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <!-- Custom CSS -->
        <link rel="stylesheet" href="assets/user/css/style.css">
        <link rel="stylesheet" href="assets/user/css/slider.css">
        <link rel="stylesheet" href="assets/user/css/courses.css">
        <link rel="stylesheet" href="assets/user/css/blog.css">
        <link rel="stylesheet" href="assets/user/css/responsive.css">
        <!-- FontAwesome CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    </head>
<body style="overflow-x: hidden">
<style>
    #mydiv {
        position: fixed;
        z-index: 1;
        background-color: transparent;
        text-align: center;
        top:50%;
        right:10%;
    }
    #mydivheader {
        padding: 10px;
        cursor: move;
        z-index: 1;
        background-color: transparent;
        border:none;
        height:100px;
    }
</style>

<script>
    //Make the DIV element draggagle:
    dragElement(document.getElementById("mydiv"));

    function dragElement(elmnt) {
        var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
        if (document.getElementById(elmnt.id + "header")) {
            /* if present, the header is where you move the DIV from:*/
            document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
        } else {
            /* otherwise, move the DIV from anywhere inside the DIV:*/
            elmnt.onmousedown = dragMouseDown;
        }

        function dragMouseDown(e) {
            e = e || window.event;
            e.preventDefault();
            // get the mouse cursor position at startup:
            pos3 = e.clientX;
            pos4 = e.clientY;
            document.onmouseup = closeDragElement;
            // call a function whenever the cursor moves:
            document.onmousemove = elementDrag;
        }

        function elementDrag(e) {
            e = e || window.event;
            e.preventDefault();
            // calculate the new cursor position:
            pos1 = pos3 - e.clientX;
            pos2 = pos4 - e.clientY;
            pos3 = e.clientX;
            pos4 = e.clientY;
            // set the element's new position:
            elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
            elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
        }

        function closeDragElement() {
            /* stop moving when mouse button is released:*/
            document.onmouseup = null;
            document.onmousemove = null;
        }
    }
</script>
<div class="container-fluid">
    <div class="modal fade" id="myModal" role="dialog" >
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light" style="background:#EB4C5E;height:60px;width:100%;position:fixed;z-index:1;">
            <a class="navbar-brand" href="index.php">
                <img src="assets/user/images/logo/logo.png" width="110" id="brands" height="110" class="img-fluid" alt="" style="position: relative; top:22px;left:2px;"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php" id="m1" onClick="m1()" >Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="resource.php" id="m2" >Resources</a>
                    </li>
                    <li class="nav-item" >
                        <a class="nav-link" href="course.php" id="m3">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="m4">Summit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog6.php" id="m5">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="faculty.php" id="m6">Faculty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ftr" id="m7">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <input  class="form-control mr-sm-2" type="search" placeholder="&nbsp;&nbsp; &#xF002; Let's find out what you are looking for" aria-label="Search" style="font-family:Segoe UI,  FontAwesome">
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="login.php" id="m9"> LogIn</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
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
                document.getElementById("email").style.display="block";
                document.getElementById("password").style.display="block";

            }

            if(x=='School'){
                document.getElementById("topic").style.border="1px solid #EB4C5E";
                document.getElementById("email").style.display="block";
                document.getElementById("password").style.display="block";

            }
            if(x=='0'){
                document.getElementById("topic").style.border="1px solid #F8ADB6";
                document.getElementById("email").style.display="none";
                document.getElementById("password").style.display="none";

            }
        }
    </script>

    <div class="container-fluid">
        <div class="row justify-content-end"  style="height: auto;padding:10%" >


            <div class="col-md-7" style="height:auto">
                <div class="row justify-content-center">
                    <img src="assets/user/images/logindemo.png">
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-6" >

<form action="" method="post">
    <?php echo $error; ?>
    <br>

                        <div class="row" style="height:30px;" id="email" >
                            <input type="text" name="code" required  pattern="[0-9]{6}" placeholder="6 Digit Verification Code" minlength="6"  maxlength="6" onchange="this.style.border='1px solid #EB4C5E'">
                            <i class="fa fa-key icon" style="color: #EB4C5E;position: relative;left:80%;top: -120%"></i>
                        </div>   <br>

                    </div>



                </div>
                <br>
                <center>
                    <button name="submit" class="button">
                     Verify Now
                    </button>
                    <br>
                    <br>


                    </form>

                <form action="" method="post">
                    <input type="hidden" value="<?php echo $oid ?> " name="resendvalue">
                    <button name="resend" style=" background:none; color:#a71d2a; text-decoration: underline" class="button">
                        Resend Code Again.
                    </button>
                </form>
                </center>
                <br>

            </div>
            <div class="col-md-3"   >
                <img class="d-block w-100" src="assets/user/images/signup.png" >
            </div>

        </div>

    </div>
<?php
include ("footer.php");
?>