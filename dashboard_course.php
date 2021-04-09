<?php
include("header.php");
include ("connection.php");
$subid= $_POST['rid'];
if(isset($_POST['comment'])){
		
		
	$subid= $_POST['rid'];
	$about= $_POST['about'];
	$username=$_SESSION['username'];
		$userid=$_SESSION['userid'];
	$ctype="course";
$sl="delete  from reviews where userid='$userid' and courseid='$subid' and type='$ctype'";
if ($conn->query($sl) === TRUE) {
}
else{
	echo "Error: " . $sl . "<br>" . $conn->error;
}
	$sqls="insert into reviews (username,userid,courseid,type,comment ) values('$username','$userid','$subid','$ctype','$about')" ;
	
	    if ($conn->query($sqls) === TRUE) {
		
		echo "<script> alert('Updated Successfully') </script>";
	}
else{
	echo "Error: " . $sqls . "<br>" . $conn->error;
}	
	
	
}
?>
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
        display: block;
        background-color: white;
        overflow: hidden;
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
                    	<?php if($ctype=='course') {  ?>
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
                	<?php }  ?>
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
			<?php if($ctype=='course') {  ?>
                   <form action="userchat.php" method="post"> 
                   <input type="hidden" value="<?php echo $subid ?>" name="rid">
                        <button style=" position:absolute;bottom:3%;right:50%; padding:10px 10px;border:none; background: #0A62A3;color:white;font-family:segoe ui semibold;font-size:12px">
                         Discussions <i class="fa fa-question-circle"></i>
                        </button>
                    </form>
              
				<?php } ?>
	
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

    <div class="row justify-content-center">

        <div class="col-md-10">
            <button class="accordion">Syllabus</button>
            <div class="panel">
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
                                        <form action="dashboard_course2.php" method="post">
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
    
    
    <br><br>
    
    
    
	    <div class="row justify-content-center">

        <div class="col-md-11">
            <button class="accordion">My Assessment</button>
            <div class="panel">	<br><br>
                <div class="row justify-content-md-start">
				
					
					    <table style="width:98%;height:auto;">

        <tr>
            
            <td style="color:#707070;height:30px;border:1px dashed #707070;">
               Asessment Name
            </td>
            <td style="color:#707070;height:30px;border:1px dashed #707070;">
                Submitted Date
            </td>
            <td style="color:#707070;height:30px;border:1px dashed #707070;">
                Marks (Out of 100)
            </td>
			<td style="color:#707070;height:30px;border:1px dashed #707070;width:40%">
                Feedback
            </td>
        </tr>
					
                    <?php
                    $rcsql= "SELECT * FROM assessmentfile where courseid='$subid'";
                    $rcresult = $conn->query($rcsql);
                    if ($rcresult->num_rows > 0) {

                        while($row = $rcresult->fetch_assoc()) {
                           

                                    ?>
      <tr>
            
            <td style="color:#000;height:30px;border:1px dashed #707070;font-size:14px ">
             <?php echo $row['title'] ?>
            </td>
            <td style="color:#000;height:30px;border:1px dashed #707070;font-size:14px">
               <?php echo $row['subdate'] ?>
            </td>
            <td style="color:#000;height:30px;border:1px dashed #707070;font-size:14px">
               <?php echo $row['marks'] ?>
            </td>
			<td style="color:#000;height:auto;border:1px dashed #707070;width:40%;font-size:14px">
              <?php echo $row['feedback'] ?>
            </td>
        </tr>
                          
                                <?php }}?>
    </table>
                </div>



            </div>
        </div>
		
    </div>
    
    <br>


  <br><br>
	<font style="font-family: segoe ui semibold;font-size:20px"> 
	
		&nbsp;&nbsp;Write  Review&nbsp;&nbsp;<li class="fa fa-comments"></li> </font>
	<br>
	<hr/><hr/>	<br>	<br>
<center>
	  <?php
	$ui=$_SESSION['userid'];
           $ucsqls= "SELECT * FROM reviews where userid='$ui'and courseid='$subid' and type='course' order by id desc limit 1 ";
           $ucresultss = $conn->query($ucsqls);
           if ($ucresultss->num_rows > 0) { 
	while($row = $ucresultss->fetch_assoc()) {
	?>
<div class="col-md-10">
	

	
	
	
	<form action="" method="post">  
	<input type="hidden" name="rid" value="<?php echo $subid ?>">
	<textarea name="about" maxlength="270" required  style="width: 100%;height: 300px;resize: none; box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);border:none;padding:20px 20px" placeholder="Your Comment"><?php echo $row['comment']?></textarea>
		<br>	<br>
		
	<button name="comment" style="background:none;padding:10px 20px;position:absolute;left:20px;width:160px;font-family:segoe ui semibold;background:#0A62A3;color:white;font-size:16px;border:none">Submit</button>
		</form>
	
	</div>
	
	
</center>
	<?php }} else{?>
	
	
	<div class="col-md-10">
	

	
	
	
	<form action="" method="post">  
	<input type="hidden" name="rid" value="<?php echo $subid ?>">
	<textarea name="about" required  style="width: 100%;height: 300px;resize: none; box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);border:none;padding:20px 20px" placeholder="Your Comment"><?php echo $row['comment']?></textarea>
		<br>	<br>
		
	<button name="comment" style="background:none;padding:10px 20px;position:absolute;left:20px;width:160px;font-family:segoe ui semibold;background:#0A62A3;color:white;font-size:16px;border:none">Submit</button>
		</form>
	
	</div>
	
	<?php }?>

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
