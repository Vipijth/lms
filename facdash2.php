<?php
include("header.php");
include ("connection.php");
$subid= $_POST['cid'];
$subname= $_POST['cname'];  $cn=0; 
if(isset($_POST["assess"])) {
    $subid= $_POST['cid'];
    $title = $_POST['title'];

    $rand=rand(10000,90000);
    $target_dir = "admin/uploads/Assessments/".$title.'/'.$rand;
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imagename=$rand.basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (!file_exists('admin/uploads/Assessments/'.$title)) {
        mkdir('admin/uploads/Assessments/'.$title, 0777, true);
    }
// Check if image file is a actual image or fake image


// Allow certain file formats


// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
$facid=$_SESSION['userid'];
            //echo "The file ". htmlspecialchars( $rand.basename( $_FILES["image"]["name"])). " has been uploaded.";
            // echo $imagename;
            $sql = 'INSERT INTO assessment(title, course,file,facultyid,coursename ) VALUES 
   ("'.$title.'","'.$subid.'","'.$imagename.'","'.$facid.'","'.$subname.'")';

            if ($conn->query($sql) === TRUE) {
      	$dates=date('d-m-Y');  
		$notification='New Assessment Updated Successfully On  '.$subname;
		$ntype='assessmnet';
       $sqls = 'INSERT INTO faculty_notification (userid,notification,type,dates) VALUES 
    ("'.$facid.'","'.$notification.'","'.$ntype.'","'.$dates.'")';
		$conn->query($sqls);
			$notification2='New Assessment   On  '.$subname;
			   $sqlss = 'INSERT INTO user_notification (notification,type,dates,subid) VALUES 
    ("'.$notification2.'","'.$ntype.'","'.$dates.'","'.$subid.'")';
		$conn->query($sqlss);
				
                echo "<script>
alert('New Assessment created successfully');
</script>";
                $last_id = $conn->insert_id;

                //header('Location: resources.php');
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


}

?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(function() {
        $('#inp1').on('keypress', function(e) {
            if (e.which == 32){

                return false;
            }
        });
    });
</script>

    <style>
        .accordion {
            background-color: #0A62A3;
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

.input{
    border:1px solid #707070
}
        input:focus{
            outline:none;
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

        select{
            padding:5px 10px;
            font-family: segoe ui semibold;
            font-size:12px;
        }

        input[type=file] {
            padding:5px 10px;
            font-family: segoe ui semibold;
            font-size:12px;
            width:40%;

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
            background-color: #0A62A3;
        }

        .panel {
            padding: 0 18px;
            display: none;
            background-color: white;
            overflow: hidden;
        }
    </style>
    <div class="container-fluid" style="padding-top: 150px;height:auto">



        <div class="row justify-content-center">

            <div class="col-md-12">
                <button class="accordion">View Full Course</button>
                <div class="panel">
<br>
                    <div class="col-md-11 col-lg-11" style="height:auto;box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);margin:10px">


                        <?php
                        $title='';
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
                                $start=$row['startdate'];
                                $end=$row['enddate'];
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
                                        <a href="facdash.php">

                                            <button style=" position:absolute;bottom:3%;right:10%; padding:10px 10px;border:none; background: #0A62A3;color:white;font-family:segoe ui semibold;font-size:12px">
                                                Go to Dashboard
                                            </button>
                                        </a>
                                    </div>

                                </div>
                            <?php } } ?>
                    </div>


                    <br><br>
                  <font style="font-family:segoe ui regular;font-size:29px;color:#707070">
                 Resources
                  </font>
                    <br>
                    <hr/>
                    <br><br>
                    <div class="row justify-content-md-start">

                    <?php
                    $rcsql= "SELECT * FROM rc where courseId='$subid'";
                    $rcresult = $conn->query($rcsql);
                    if ($rcresult->num_rows > 0) {

                        while($row = $rcresult->fetch_assoc()) {
                            $resid=$row['resourceId'];
                            $recsql= "SELECT * FROM resources where id='$resid'";
                            $recresult = $conn->query($recsql);
                            if ($recresult->num_rows > 0) {

                                while($row = $recresult->fetch_assoc()) {
                                    $rname=$row['name'];
                                    $recid=$row['id'];

                                    ?>

                                    <div class="col-md-2" style="height:60px;margin:20px;">
                                        <form action="facdashboard_course.php" method="post">
                                            <input type="hidden" name="rcid" value="<?php echo $recid ?>">
                                            <input type="hidden" name="rid" value="<?php echo $subid ?>">
                                            <button style="height:60px;width:100%;font-family:Segoe UI semibold;font-size:12px;color:#707070;border:1px solid #707070 ">
                                                <?php echo $rname ?>
                                            </button>

                                        </form>
                                    </div>
                                <?php }} }}?>

                </div>
                </div>
            </div>
        </div>


        <br>
        <div class="row justify-content-center">

            <div class="col-md-12">
            <form action="userchat.php" method="post"> 
                   <input type="hidden" value="<?php echo $subid ?>" name="rid">
                <button class="accordion">Discussion</button>
            </form>
                <div class="panel">
 <div class="row justify-content-center" style="background: #eaeaea;padding-top:40px;height:auto">



 
	<!--
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
</div>-->
	 
	 <br>
   
	 
	 
	 

	 
	 
	
	 
	 
	</div>	</div>
	
                </div>
            </div>
        </div>
        <br>
        
        
        <div class="row justify-content-center">
        <div class="col-md-12">
     
        <button class="accordion" >Students List</button>
        
        <div class="panel">    <br>    <br>

        <div class="row  justify-content-center">
        <div class="col-md-9">
        <table class="table" >
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name Name</th>
  
      <th scope="col">Last Name</th>
      <th scope="col">Email Id</th>
    </tr>
  </thead>
  <tbody>
 
  <?php
             
                $rcsqal= "SELECT * FROM oc where  status='1' and courseid like '%$subid'";
                $rcresulta = $conn->query($rcsqal);
                if ($rcresulta->num_rows > 0) {

                   
                    while($row = $rcresulta->fetch_assoc()) {
                        
                        $uzzid=$row['useremail'];
                $rcsqald= "SELECT * FROM users where email like '$uzzid'";
                    $rcresultad = $conn->query($rcsqald);
                    if ($rcresultad->num_rows > 0) {

                        
                        while($row = $rcresultad->fetch_assoc()) {
                            $cn=$cn+1; ?>
    <tr >
      <th scope="row"><?php echo $cn ?></th>
      <td style="color:#707070 !important;text-align:left"><?php echo $row['firstname']?></td>
      <td style="color:#707070 !important;text-align:left"><?php echo $row['lastname']?></td>
      <td style="color:#707070 !important;text-align:left"><?php echo $row['email']?></td>
    </tr>
  <?php }}}} ?>

  <?php
                
                
                $rcsqalz= "SELECT * FROM user_courses where subid like '%$subid' and type='course' ";
                $rcresultaz = $conn->query($rcsqalz);
                if ($rcresultaz->num_rows > 0) {

                  
                    while($row = $rcresultaz->fetch_assoc()) {
                        $uzid =$row['userid'];
                       
                $rcsqalx= "SELECT * FROM users where id=$uzid";
                    $rcresultax = $conn->query($rcsqalx);
                    if ($rcresultax->num_rows > 0) {

                        while($row = $rcresultax->fetch_assoc()) {$cn=$cn+1; ?>
    <tr >
      <th scope="row"><?php echo $cn ?></th>
      <td style="color:#707070 !important;text-align:left"><?php echo $row['firstname']?></td>
      <td style="color:#707070 !important;text-align:left"><?php echo $row['lastname']?></td>
      <td style="color:#707070 !important;text-align:left"><?php echo $row['email']?></td>
    </tr>
  <?php }}}} ?>
  </tbody>
</table>
</div></div>
        </div>
        </div>
        </div>
        <br>
        <div class="row justify-content-center">

            <div class="col-md-12">
                
                <button class="accordion" >Assignments</button>
                <div class="panel">    <br>    <br>
                    <div class="col-lg-6" style=" color: #0A62A3;margin:10px;padding:20px 30px; font-family:segoe ui semibold; font-size:16px; height:auto; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);">

                        <br>
                        Submit Assessment
<form method="post" action=""  enctype="multipart/form-data">
                        <br> <br>
<input type="text" placeholder="Assessment Name" class="input" name="title" id="inp1" required>
    <input type="hidden" value="<?php echo $subid ?>" name="cid">
    <input type="hidden" value="<?php echo $title ?>" name="cname">
                        <input type="file" name="image" title="" required>
                        &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                        <button style="width:90px;height:40px" class="button" name="assess">
                            <li class="fa fa-upload"></li>
                            upload
                        </button> </form>
                    </div>

                    <br><br>
                    <div class="col-lg-12" style=" color: #0A62A3;margin:10px;padding:20px 30px; font-family:segoe ui semibold; font-size:16px; height:auto; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);">

                        <br>
                        Submitted Assessments

                        <br> <br>
<center>
 <table style="width:98%;height:auto;">

        <tr>
            <td style="color:#707070;height:30px;border:1px dashed #707070;">
                Student Name
            </td>
            <td style="color:#707070;height:30px;border:1px dashed #707070;">
                Course Name
            </td>
            <td style="color:#707070;height:30px;border:1px dashed #707070;">
               Asessment Name
            </td>
            <td style="color:#707070;height:30px;border:1px dashed #707070;">
                Submitted Date
            </td>
            <td style="color:#707070;height:30px;border:1px dashed #707070;">
                View File
            </td>
			<td style="color:#707070;height:30px;border:1px dashed #707070;">
               Give Feedback
            </td>
        </tr>
<?php

$userid=$_SESSION['userid'];
$ucsqls= "SELECT * FROM assessment where facultyid='$userid' and course= '$subid'  ";
$ucresultss = $conn->query($ucsqls);
if ($ucresultss->num_rows > 0) {

while($row = $ucresultss->fetch_assoc()) {
    $file=$row['file'];
    $ucsqls1= "SELECT * FROM assessmentfile  where file2 = '$file' and courseid='$subid' ";
    $ucresultss1 = $conn->query($ucsqls1);
    if ($ucresultss1->num_rows > 0) {
        while($row = $ucresultss1->fetch_assoc()) {
?>
        <tr>
            <td style="color:#707070;height:30px">
                <?php echo $row['useremail']?>
            </td>
            <td style="color:#707070;height:30px">
                <?php echo $title?>
            </td>
            <td style="color:#707070;height:30px">
                <?php echo $row['title']?>
            </td>
            <td style="color:#707070;height:30px">
                <?php echo $row['subdate']?>
            </td>
            <td style="color:#707070;height:30px">
                <a href="admin/uploads/Assessments/<?php echo $row['title'].'/'.$row['file']?>" target="_blank">
                <button style="width:130px;height:40px" class="button">

                    <li class="fa fa-download"></li>
                    Download
                </button> </a>
            </td>
			
			<td>
			<form action="feedback.php" method="post">
				<input type="hidden" name="assessid" value="<?php echo $row['id'] ?>">
				<input type="hidden" name="usid" value="<?php echo $row['userid'] ?>">
				<input type="hidden" name="xs" value="<?php echo $row['title'] ?>">
				<input type="hidden" name="cname" value="<?php echo $subname ?>">
					<input type="hidden" name="cid" value="<?php echo $subid ?>">
						<input type="hidden" name="feedback" value="<?php echo $row['feedback'] ?>">
					<input type="hidden" name="mn" value="<?php echo $row['marks'] ?>">
				<input type="hidden" name="name" value="<?php echo $row['useremail'] ?>">
					<input type="hidden" name="marks" value="<?php echo $row['marks'] ?>">
			<!--	<input type="text" style="width:50%;padding:10px 20px" placeholder="Enter the marks"  required  name="mark" value="<?php //echo $row['marks']?> " onchange="vals()" id="mr">-->
				
				
				
				
				   <button style="width:100%;height:40px" class="button" name="marks">

                    <li class="fa fa-medal"></li>
                     Feedback
                </button>
				</form>
			</td>
        </tr>

        <?php }}}} ?>
    </table>

</center>


                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br>
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