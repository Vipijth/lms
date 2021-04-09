<?php
include("header.php");
include ("connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$subid= $_POST['rid'];
$title='';


if(isset($_POST["delete"])) {
		$courseid=$_POST['sid'];
	$sql="delete from discussion where id='$courseid'";
	    if ($conn->query($sql) === TRUE) {
        echo "<script>
alert('Deleted successfully');
</script>";
    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if(isset($_POST["startdesc"])) {
    $coursename = $_POST['coursename'];
	$username=$_SESSION['username'];
	$userid=$_SESSION['userid'];
	$courseid=$_POST['subid'];
	$time=$_POST['datetime'];
	$utype=$_SESSION['utype'];
	$question=$conn->real_escape_string($_POST['question']);
		$tit=$_POST['tit'];
	try{
		    $sql = 'INSERT INTO discussion(course, courseid,username,userid,startdate,utype,topic,title ) VALUES 
   ("'.$coursename.'","'.$courseid.'","'.$username.'","'.$userid.'","'.$time.'","'.$utype.'","'.$question.'","'.$tit.'")';

    if ($conn->query($sql) === TRUE) {
		
		
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
             //Adds a "To" address

        $mail->IsHTML(true);                            //Sets message type to HTML
        $mail->Subject = 'Welcome To LMS Meet';
		
		
		   $sqlu = "SELECT * FROM instructor where resourceid = $courseid and type='course' ";
    $resultu = $conn->query($sqlu);
    if ($resultu->num_rows > 0) {
		       while($row = $resultu->fetch_assoc()) {
	
				   	   $instid=$row['instructorId'];
				     $sqlus = "SELECT * FROM faculty where id = $instid ";
    $resultus = $conn->query($sqlus);
    if ($resultus->num_rows > 0) {
		       while($row = $resultus->fetch_assoc()) {
				   
				   
		$dates=date('d-m-Y');
		$notification=' New Discussion Started On  '.$coursename;
		$ntype='discussion';
									$facid=$row['id'];
       $sqls = 'INSERT INTO faculty_notification (userid,notification,type,dates) VALUES 
    ("'.$facid.'","'.$notification.'","'.$ntype.'","'.$dates.'")';
		$conn->query($sqls);			   
				   
				   
				   
				   $rem= $row['email'];
	                    
				    $mail->AddAddress($row['email']);
        //Sets the Subject of the message
        $body = '<center>
<table style="width:50%;background:white;height:400px;">
<tr>
<td>
<center>
<img src="http://meet.LMS.com/assets/user/images/logo/logo3.png">
</center>


<center>
<font style="color:#000;font-family:segoe ui regular;font-size:29px">

<b>
 Discussion Form
 </b>
 <br> <br>

<small><small>

<b>

<span style="color:#707070;">
Course Name : 
</span>'.$coursename. '
</b>
</small></small><br><br>
<table style="width:100%;color:#707070;font-family:segoe ui semibold;font-size:19px;text-align:center">
<tr>
<th>
Course Name
</th><th>
Created By
</th><th>
Discussion Link
</th>
</tr>
<tr style="color:black">
<th>
' .$coursename. '
</th><th>
'.$username. '
</th><th>
<A href="">
<button style="height:40px;padding:10px 10px; background: #F16062; color:white;outline:0px; border:0px">
Join Here
</button>
</a>
</th>
</tr>
</table>
<br>

</font>
<br><br>


<table style="width:100%;color:white;height:50px;background:#F16062;font-family:segoe ui semibold;font-size:19px;text-align:center">
<tr>
<td style="border-right:2px solid white">
<a href="http://meet.LMS.com/" target="_blank" style="color:#fff;font-family:segoe ui regular;text-decoration:none">
View Dashboard
<a>
</td>

</table>
<br>

<a href="http://meet.LMS.com/privacy.php" target="_blank" style="color:#6C5634;font-family:segoe ui semiblod;text-decoration:none"> Terms & Conditions</a>
</center>
</table>
</center>';
        $mail->Body = $body;
		$mail->Send();
	}}}}
		
		
			   $sqlu1 = "SELECT * FROM user_courses where subid = $courseid and type='course' and userid !=$userid ";
    $resultu1 = $conn->query($sqlu1);
    if ($resultu1->num_rows > 0) {
		       while($row = $resultu1->fetch_assoc()) {
	
				   	   $instid=$row['userid'];
				     $sqlus = "SELECT * FROM users where id = $instid  and id != $userid   ";
    $resultus = $conn->query($sqlus);
    if ($resultus->num_rows > 0) {
		       while($row = $resultus->fetch_assoc()) {
				   $rem= $row['email'];
	
				    $mail->AddAddress($row['email']);
        //Sets the Subject of the message
        $body = '<center>
<table style="width:50%;background:white;height:400px;">
<tr>
<td>
<center>
<img src="http://meet.LMS.com/assets/user/images/logo/logo3.png">
</center>


<center>
<font style="color:#000;font-family:segoe ui regular;font-size:29px">

<b>
 Discussion Form
 </b>
 <br> <br>

<small><small>

<b>

<span style="color:#707070;">
Course Name : 
</span>'.$coursename. '
</b>
</small></small><br><br>
<table style="width:100%;color:#707070;font-family:segoe ui semibold;font-size:19px;text-align:center">
<tr>
<th>
Course Name
</th><th>
Created By
</th><th>
Discussion Link
</th>
</tr>
<tr style="color:black">
<th>
' .$coursename. '
</th><th>
'.$username. '
</th><th>
<A href="">
<button style="height:40px;padding:10px 10px; background: #F16062; color:white;outline:0px; border:0px">
Join Here
</button>
</a>
</th>
</tr>
</table>
<br>

</font>
<br><br>


<table style="width:100%;color:white;height:50px;background:#F16062;font-family:segoe ui semibold;font-size:19px;text-align:center">
<tr>
<td style="border-right:2px solid white">
<a href="http://meet.LMS.com/" target="_blank" style="color:#fff;font-family:segoe ui regular;text-decoration:none">
View Dashboard
<a>
</td>

</table>
<br>

<a href="http://meet.LMS.com/privacy.php" target="_blank" style="color:#6C5634;font-family:segoe ui semiblod;text-decoration:none"> Terms & Conditions</a>
</center>
</table>
</center>';
        $mail->Body = $body;
		$mail->Send();
	}}}}
			   
			   
			   

		
		
				
		
	
				   	   $instid=$row['userid'];
				     $sqlus = "SELECT * FROM users where id = $userid ";
    $resultus = $conn->query($sqlus);
    if ($resultus->num_rows > 0) {
		       while($row = $resultus->fetch_assoc()) {
				   $rem= $row['email'];
	
				    $mail->AddAddress($row['email']);
        //Sets the Subject of the message
        $body = '<center>
<table style="width:50%;background:white;height:400px;">
<tr>
<td>
<center>
<img src="http://meet.LMS.com/assets/user/images/logo/logo3.png">
</center>


<center>
<font style="color:#000;font-family:segoe ui regular;font-size:29px">

<b>
 Discussion Form
 </b>
 <br> <br>

<small><small>
Your Discussion Has Been Started <br> <br>
<b>

<span style="color:#707070;">
Course Name : 
</span>'.$coursename. '
</b>
</small></small><br><br>
<table style="width:100%;color:#707070;font-family:segoe ui semibold;font-size:19px;text-align:center">
<tr>
<th>
Course Name
</th><th>
Created By
</th><th>
Discussion Link
</th>
</tr>
<tr style="color:black">
<th>
' .$coursename. '
</th><th>
'.$username. '
</th><th>
<A href="">
<button style="height:40px;padding:10px 10px; background: #F16062; color:white;outline:0px; border:0px">
Join Here
</button>
</a>
</th>
</tr>
</table>
<br>

</font>
<br><br>


<table style="width:100%;color:white;height:50px;background:#F16062;font-family:segoe ui semibold;font-size:19px;text-align:center">
<tr>
<td style="border-right:2px solid white">
<a href="http://meet.LMS.com/" target="_blank" style="color:#fff;font-family:segoe ui regular;text-decoration:none">
View Dashboard
<a>
</td>

</table>
<br>

<a href="http://meet.LMS.com/privacy.php" target="_blank" style="color:#6C5634;font-family:segoe ui semiblod;text-decoration:none"> Terms & Conditions</a>
</center>
</table>
</center>';
        $mail->Body = $body;
		//$mail->Send();
	}}
			

	
				   	  
				     $sqlus = "SELECT * FROM oc where courseid = $courseid and status='1' ";
    $resultus = $conn->query($sqlus);
    if ($resultus->num_rows > 0) {
		       while($row = $resultus->fetch_assoc()) {
				   $rem= $row['useremail'];
	
				    $mail->AddAddress($row['useremail']);
        //Sets the Subject of the message
        $body = '<center>
<table style="width:50%;background:white;height:400px;">
<tr>
<td>
<center>
<img src="http://meet.LMS.com/assets/user/images/logo/logo3.png">
</center>


<center>
<font style="color:#000;font-family:segoe ui regular;font-size:29px">

<b>
 Discussion Form
 </b>
 <br> <br>

<small><small>
Your Discussion Has Been Started <br> <br>
<b>

<span style="color:#707070;">
Course Name : 
</span>'.$coursename. '
</b>
</small></small><br><br>
<table style="width:100%;color:#707070;font-family:segoe ui semibold;font-size:19px;text-align:center">
<tr>
<th>
Course Name
</th><th>
Created By
</th><th>
Discussion Link
</th>
</tr>
<tr style="color:black">
<th>
' .$coursename. '
</th><th>
'.$username. '
</th><th>
<A href="">
<button style="height:40px;padding:10px 10px; background: #F16062; color:white;outline:0px; border:0px">
Join Here
</button>
</a>
</th>
</tr>
</table>
<br>

</font>
<br><br>


<table style="width:100%;color:white;height:50px;background:#F16062;font-family:segoe ui semibold;font-size:19px;text-align:center">
<tr>
<td style="border-right:2px solid white">
<a href="http://meet.LMS.com/" target="_blank" style="color:#fff;font-family:segoe ui regular;text-decoration:none">
View Dashboard
<a>
</td>

</table>
<br>

<a href="http://meet.LMS.com/privacy.php" target="_blank" style="color:#6C5634;font-family:segoe ui semiblod;text-decoration:none"> Terms & Conditions</a>
</center>
</table>
</center>';
        $mail->Body = $body;
		$mail->Send();
	}}
		
		
        echo "<script>
alert('Question Updated successfully');
</script>";
    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
	}
	catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
}
?>
<style>
    body{
        -webkit-user-select: text;
        -webkit-touch-callout: text;
        -moz-user-select: text;
        -ms-user-select: text;
        user-select: text;
    }
</style>
<style>
    .accordion {
        background-color: #EB4C5E;
        color: #fff;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
        font-family: Segoe ui Semibold;
    }
    .accordion:after {
        content: '\002B';
        color: #fff;
        font-weight: bold;
        float: right;
        margin-left: 5px;
        font-size: 15px;
        font-family: Segoe ui Semibold;
    }

    .active:after {
        content: "\2212";
    }

    .active, .accordion:hover {
        background-color: #EB4C5E;
    }

	input,textarea:focus{
		outline:none;
	}
    .panel {
        padding: 0 18px;
        display: block;
        background-color: white;
        overflow: hidden;
    }
	
	    .button{

        background:#0A62A3;
        color:white;
        font-family: segoe ui semibold;
        font-size:14px;
        border:none;
        margin:10px;
        padding:10px 10px;

    }
    .button:focus{

        outline:none
    }
</style>


<div class="container-fluid" style="padding-top: 150px;height:auto">

    <div class="row justify-content-center">

        <div class="col-md-11 col-lg-11" style="height:auto;box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);margin:10px">

            <?php
            $ucsqls= "SELECT * FROM course where id='$subid' ";
            $ucresultss = $conn->query($ucsqls);
            if ($ucresultss->num_rows > 0) {

            while($row = $ucresultss->fetch_assoc()) {
            $image=$row['image'];
            $title=$row['name'];
            $cat=$row['category'];
            $about=$row['about'];
            $amount=$row['amount'];
            $rid=$row['id'];
          $t=strtotime($row['startdate']);
                    $start= date('d-m-Y',$t);
                    $s=strtotime($row['enddate']);
                    $end = date('d-m-Y',$s);
				   $ctype=$row['type'];
            ?>


            <div class="row justify-content-center">
                <div class="col-md-3 col-lg-3" style="height:220px;padding:10px 10px">
                    <img src="admin/uploads/Courses/<?php echo $title; ?>/image/<?php echo $image; ?>" style="width:100%;height:100%;">

                </div>
                <div class="col-md-3 col-lg-3" style="height:220px;padding:10px 10px">
                    <span style="color:#0A62A3;font-size:20px;     font-family:segoe ui semibold">

               <?php echo $title ?>
                </span>
                    <br><br>  <br><br>
                    <span style="color:#707070;font-size:12px; font-family:segoe ui semibold">
                        Start Date :
                    </span>
                    <span style="color:#0A62A3;font-size:18px;     font-family:segoe ui semibold">

               <?php echo $start ?>
                </span>
                    <br>
                    <span style="color:#707070;font-size:12px; font-family:segoe ui semibold">
                       &nbsp; End Date :
                    </span>
                    <span style="color:#0A62A3;font-size:18px;     font-family:segoe ui semibold">

               <?php echo $end ?>
                </span>
                    <br>
                </div>

                <div class="col-md-3 col-lg-3" style="height:auto;padding:10px 10px">
                    <table style="width:100%;">



                        <tr>
                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                Videos
                            </td>
                            <?php $rcsqls= "SELECT * FROM rc where courseId='$subid' ";
                            $rcresultss = $conn->query($rcsqls);
                            if ($rcresultss->num_rows > 0) {
                            $a=0;
                            while($row = $rcresultss->fetch_assoc()) {
                            $rcd=  $row['resourceId']?>


                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                <?php  $ucsqlsxs= "SELECT  * FROM resources_files where Rid='$rcd' and filetype='video' ";
                                $ucresultssxs = $conn->query($ucsqlsxs);
                                $r=$ucresultssxs->num_rows +$ucresultssxs->num_rows ;
                                $a=$a+$ucresultssxs->num_rows ;                }
                                echo $a ;    ?>
                            </td>
                        </tr>

                        <?php } ?>


                        <tr>
                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                Worksheets
                            </td>
                            <?php $rcsqls1= "SELECT * FROM rc where courseId='$subid' ";
                            $rcresultss1 = $conn->query($rcsqls1);
                            if ($rcresultss1->num_rows > 0) {
                            $a=0;
                            while($row = $rcresultss1->fetch_assoc()) {
                            $rcd=  $row['resourceId']?>


                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                <?php  $ucsqlsxs= "SELECT  * FROM resources_files where Rid='$rcd' and filetype='worksheet' ";
                                $ucresultssxs = $conn->query($ucsqlsxs);
                                $r=$ucresultssxs->num_rows +$ucresultssxs->num_rows ;
                                $a=$a+$ucresultssxs->num_rows ;                }
                                echo $a ;    ?>
                            </td>
                        </tr>

                    <?php } ?>


                        <tr>
                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                Games & Activity Ideas
                            </td>
                            <?php $rcsqls2= "SELECT * FROM rc where courseId='$subid' ";
                            $rcresultss2 = $conn->query($rcsqls2);
                            if ($rcresultss2->num_rows > 0) {
                            $a=0;
                            while($row = $rcresultss2->fetch_assoc()) {
                            $rcd=  $row['resourceId']?>


                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                <?php  $ucsqlsxs= "SELECT  * FROM resources_files where Rid='$rcd' and filetype='activity' ";
                                $ucresultssxs = $conn->query($ucsqlsxs);
                                $r=$ucresultssxs->num_rows +$ucresultssxs->num_rows ;
                                $a=$a+$ucresultssxs->num_rows ;                }
                                echo $a ;    ?>
                            </td>
                        </tr>

                    <?php } ?>




                        <tr>
                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                Games & Activity Ideas
                            </td>
                            <?php $rcsqls3= "SELECT * FROM rc where courseId='$subid' ";
                            $rcresultss3 = $conn->query($rcsqls3);
                            if ($rcresultss3->num_rows > 0) {
                            $a=0;
                            while($row = $rcresultss3->fetch_assoc()) {
                            $rcd=  $row['resourceId']?>


                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                <?php  $ucsqlsxs= "SELECT  * FROM resources_files where Rid='$rcd' and filetype='article' ";
                                $ucresultssxs = $conn->query($ucsqlsxs);
                                $r=$ucresultssxs->num_rows +$ucresultssxs->num_rows ;
                                $a=$a+$ucresultssxs->num_rows ;                }
                                echo $a ;    ?>
                            </td>
                        </tr>

                    <?php } ?>


                    </table>
                </div>
				

				             <div class="col-md-3 col-lg-3" style="height:auto;padding:10px 10px">
	
	
                    <a href="dashboard.php">

                        <button style=" position:absolute;bottom:3%;right:10%; padding:10px 10px;border:none; background: #0A62A3;color:white;font-family:segoe ui semibold;font-size:12px">
                            Go to Dashboard
                        </button>
                    </a>
                </div>

            </div>
            <?php } } ?>
        </div>  </div>
<br><br>
 <div class="row justify-content-center" style="background: #eaeaea;padding-top:40px;height:auto">
	
	<div class="col-lg-8"  >
		<form action="" method="post">
			<div style="background:red;margin:20px" >
				<input type="text" placeholder="Enter Title Here..." name="tit" style="border-bottom:1px solid #eaeaea;padding:10px 20px;width:96.6%;background:white;position: absolute;left:-2.9px" maxlength="100"> </div>
			
			<br><br>
					<textarea required rows="10" placeholder="Type Your Question Here..." style="width:100%;  resize: none;border:none;padding:10px 20px" maxlength="600" name="question"></textarea>

	
			<br>	<br>	
  <div class="row justify-content-end" >
<input type="hidden" value="<?php echo $subid ?> "  name="subid">
<input type="hidden" value="<?php echo $subid ?> "  name="rid">
	
	  <?php  
	 
	  // set the timezone first
if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
}

// then use the date functions, not the other way around
$date = date("F d Y");
$date1 =  date("H:i a");


	  ?>
	    <input type="hidden"  value="<?php echo $date.' '.$date1 ?>" name="datetime"> 
	  <input type="hidden"  value="<?php echo $title ?>" name="coursename">
		<button class="button" name="startdesc">
			
		Start Discussion </button>
		
		
		</div>
			
		</form>
</div>
	
	 <br>	 <br>
	 
	 
	 	 <?php 
	$uid=$_SESSION['userid'];
	 $mydes= "SELECT * FROM discussion where courseid='$subid' and userid='$uid'  order by id desc ";
                            $desres = $conn->query($mydes);
                            if ($desres->num_rows > 0) {
								
								?></div>
	 	 <div class="row  justify-content-center">
	 	   <div class="col-lg-9" style="text-align:justify;font-family: segoe ui semibold;font-size: 17px;color:#0A62A3;padding:40px 0px" >
	  My Questions  <li class="fa fa-comments"></li>
	 </div>	 
	 
	 
	 <?php 

                            while($row = $desres->fetch_assoc()) {
	
	
	?>
	 
	 
	 <div class="col-lg-9" style="text-align:justify;font-family: segoe ui semibold;font-size: 20px;color:#707070; der-bottom: 1px dotted #E000FF;background: white;padding: 20px 20px;margin: 10px" ><?php echo $row['title'] ?>
		 <br><br>
		<small><?php echo $row['topic'] ?> </small>
		  <form action="group_discussion.php" method="post">
		  <div class="row justify-content-between" style="padding:20px">
			  	 <p style="font-size:14px;color:#0A62A3 ;">
	     <i> <?php echo $row['course'] ?></i>
					 <br>
					  
						 
						 <input type="hidden" value="<?php echo $subid ?>"  name="rid">
					 
					 	 <input type="hidden" value="<?php echo $row['id'] ?>"  name="did">
					 <button href="group_discussion.php" style="background: none;color:blue;border:none;">
						 View Discussion <li class="fa fa-comments"></li>
					 </button>
						
		 </p>
		 <p style="font-size:14px;color:#707070;font-family: segoe ui regular">
			 <?php echo 'You' ?><br>
		<?php echo $row['startdate'] ?>
		 </p>
		 </div>
 </form>
	<!--	 <form action="" method="post">
		 		 <input type="hidden" value="<?php echo $row['id'] ?>"  name="sid">
			  <input type="hidden" value="<?php echo $subid ?>"  name="rid">
					 <button href="group_discussion.php" style="background: none;color:red;border:none;font-size:14px;" name="delete" onClick="return confirm('Do You Want To Delete?')" disabled>
						Edit Question <li class="fa fa-pencil"></li>
					 </button>
						
		 
		 </form>-->
	 </div>
	 
	 
		 <?php 
	
			   }}
	
	?>
	 
	 
	</div>
	 	</div>
	 
	 
	 
	 	 <?php 
	$uid=$_SESSION['userid'];
	 $mydes= "SELECT * FROM discussion where courseid='$subid' and userid!='$uid'  order by id desc ";
                            $desres = $conn->query($mydes);
                            if ($desres->num_rows > 0) {?>
	 
	 
	 <div class="row  justify-content-center" style="background:#eaeaea ">
	 	   <div class="col-lg-9" style="text-align:justify;font-family: segoe ui semibold;font-size: 17px;color:#000;padding:40px 0px" >
	  Other Discussions On <?php echo $title ?>  <li class="fa fa-comments"></li>
	 </div>
	 
	 
	 
	 
	 
		 
	 <?php 
	
                         
                            while($row = $desres->fetch_assoc()) {
	
	
	?>
	 
	 	 <div class="col-lg-9" style="text-align:justify;font-family: segoe ui semibold;font-size: 18px;color:#707070; border-bottom: 1px dotted #000;padding: 20px 20px;margin: 10px" >
		 <?php echo $row['topic'] ?>
			 	  <form action="group_discussion.php" method="post">
		  <div class="row justify-content-between" style="padding:20px">
			  	 <p style="font-size:14px;color:#0A62A3 ;">
	     <i> <?php echo $row['course'] ?></i>
					 <br>
					  
						 
						 <input type="hidden" value="<?php echo $subid ?>"  name="rid">
					  	 <input type="hidden" value="<?php echo $row['id'] ?>"  name="did">
					 <button href="group_discussion.php" style="background: none;color:blue;border:none;">
						 View Discussion <li class="fa fa-comments"></li>
					 </button>
						
		 </p>
		 <p style="font-size:14px;color:#707070;font-family: segoe ui regular">
			 <?php echo $row['username'] ?><br>
		<?php echo $row['startdate'] ?>
		 </p>
		 </div>
			 </form>

	 </div>
	 	 <?php 
	
			   }}
	
	?>
	 
	</div>
	 
	 
	</div>
	
	
	
	
    </div>
    <br><br><br>



</div>

<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
</script>

<?php
include ("footer.php");
?>
