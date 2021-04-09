<?php
include("header.php");
include ("connection.php");
$subid= $_POST['rid'];
$did=$_POST['did'];

$_SESSION['did']=$did;


if(isset($_POST["send"])) {
	
	  // set the timezone first
if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
}

 $date = date("F d Y");
$date1 =  date("H:i a");
	
	$username=$_SESSION['username'];
	$userid=$_SESSION['userid'];
	$courseid=$_POST['subid'];
	$time=$date.' '.$date1;
	$utype=$_SESSION['utype'];
	$question=$conn->real_escape_string($_POST['question']);
	
	try{
		    $sql = 'INSERT INTO discussionchat(discussionid,userid,username,message,utype,senddate) VALUES 
   ("'.$did.'","'.$userid.'","'.$username.'","'.$question.'","'.$utype.'","'.$time.'")';

    if ($conn->query($sql) === TRUE) {
        echo "<script>
alert('Answer Updated successfully');
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

	textarea:focus{
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
	
	
                
                </div>

            </div>
            <?php } } ?>
        </div>  </div>
<br><br>
		 <?php 
	$uid=$_SESSION['userid'];
	 $mydes= "SELECT * FROM discussion where id='$did' ";
                            $desres = $conn->query($mydes);
                            if ($desres->num_rows > 0) {
                         
                            while($row = $desres->fetch_assoc()) {
	
	
	?>
 <div class="row justify-content-center" style="background: #eeeeee;padding-top:60px;height:auto">

	 <div class="col-lg-10" style="text-align:justify;font-family: segoe ui semibold;font-size: 18px;color:#707070; der-bottom: 1px dotted #E000FF;background: white;padding: 20px 20px" >
		<?php echo $row['topic'] ?>
		  <div class="row justify-content-between" style="padding:20px">
			  	 <p style="font-size:14px;color:#0A62A3 ;">
	     <i> 	<?php echo $row['course'] ?></i>
		 </p>
		 <p style="font-size:14px;color:#707070;font-family: segoe ui regular">
			 	<?php 
		if($row['userid']==$_SESSION['userid']){
			echo 'You';
		}
		else{ 
		echo $row['username'];
			 }
			 ?><br>
			<?php echo $row['startdate'] ?>
		 </p>
		 </div>

	 </div>

	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    window.setInterval(function() {
        $("#my_div").load('inp2.php');
    }, 300);
</script>
	 <br><br> <br><br>
	 <div class="row justify-content-center" id="my_div" style="width: 90% ">


</div>
	 
	 
	 
	 
	   <div class="col-lg-9" style="text-align:justify;font-family: segoe ui semibold;font-size: 17px;color:#000;padding:40px 0px" >
		 My Answer <li class="fa fa-comments"></li>
	 </div>	
	<div class="col-lg-8"  >
		<form action="" method="post">
	
			
			<br>
					<textarea required rows="10" placeholder="Type Your Answer Here..." style="width:100%;  resize: none;border:none;padding:10px 20px" maxlength="600" name="question"></textarea>
			

		<br>	<br>	
  <div class="row justify-content-end" >
	  <input type="hidden" value="<?php echo $subid ?> "  name="subid">
<input type="hidden" value="<?php echo $subid ?> "  name="rid">
	  <input type="hidden" value="<?php echo $did ?> "  name="did">
		<button class="button" style="padding:10px 30px" name="send">
		Send <li class="fa fa-paper-plane"></li> </button>
		
		</div>
		</form>
</div>
	</div>
	
	
	<?php }} ?>
	
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
