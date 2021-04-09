<?php
include("header.php");
include ("connection.php");
$subid= $_POST['rid'];
if(isset($_POST['comment'])){
		
		
	$subid= $_POST['rid'];
	$about= $_POST['about'];
	$username=$_SESSION['username'];
		$userid=$_SESSION['userid'];
	$ctype="resource";
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
jQuery(document).on('click','#my-video', function(){
        if (this.paused) {
            this.play();
            this.controls = false; 
        } else {
            this.play();
            this.controls = false; 
            
        }
});



$(document).bind("contextmenu",function(ev){
    if(ev.target.nodeName=='VIDEO')
    {
        return false;
    }
});
</script>
<div class="container-fluid" style="padding-top: 150px;height:auto">

    <div class="row justify-content-center">

        <div class="col-md-11 col-lg-11" style="height:auto;box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);margin:10px">

           <?php
           $ucsqls= "SELECT * FROM resources where id='$subid' ";
           $ucresultss = $conn->query($ucsqls);
           if ($ucresultss->num_rows > 0) {

           while($row = $ucresultss->fetch_assoc()) {
           $image=$row['image'];
           $title=$row['name'];
           $cat=$row['category'];
           $about=$row['about'];
           $amount=$row['amount'];
           $rid=$row['id'];
           ?>


            <div class="row justify-content-center">
                <div class="col-md-3 col-lg-3" style="height:220px;padding:10px 10px">
                    <img src="admin/uploads/Resources/<?php echo $title; ?>/image/<?php echo $image; ?>" style="width:100%;height:100%;">

                </div>
                <div class="col-md-3 col-lg-3" style="height:220px;padding:10px 10px">
                    <span style="color:#0A62A3;font-size:20px;     font-family:segoe ui semibold">

               <?php echo $title ?>
                </span>
                </div>

                <div class="col-md-3 col-lg-3" style="height:auto;padding:10px 10px">
                    <table style="width:100%;">


                        <tr>
                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                Videos
                            </td>
                            <td style="padding:10px 10px;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                <?php  $ucsqlss= "SELECT  * FROM resources_files where Rid='$subid' and filetype='video' ";
                                $ucresultsss = $conn->query($ucsqlss);

                                echo $ucresultsss->num_rows ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                Worksheets
                            </td>
                            <td style="padding:10px 10px;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                <?php  $ucsqlss= "SELECT  * FROM resources_files where Rid='$subid' and filetype='worksheet' ";
                                $ucresultsss = $conn->query($ucsqlss);

                                echo $ucresultsss->num_rows ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                Games & Activity Ideas
                            </td>
                            <td style="padding:10px 10px;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                <?php  $ucsqlss= "SELECT  * FROM resources_files where Rid='$subid' and filetype='activity' ";
                                $ucresultsss = $conn->query($ucsqlss);

                                echo $ucresultsss->num_rows ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                Articles
                            </td>
                            <td style="padding:10px 10px;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                <?php  $ucsqlss= "SELECT  * FROM resources_files where Rid='$subid' and filetype='article' ";
                                $ucresultsss = $conn->query($ucsqlss);

                                echo $ucresultsss->num_rows ?>
                            </td>
                        </tr>


                        <?php
                        $instructorsql= "SELECT * FROM instructor where resourceid='$subid'";
                        $instructorresult = $conn->query($instructorsql);
                        if ($instructorresult->num_rows > 0) {

                            while($row = $instructorresult->fetch_assoc()) {
                                $instid=$row['instructorId'];
                                $facultysql= "SELECT * FROM faculty where id='$instid'";
                                $facresult = $conn->query($facultysql);
                                if ($facresult->num_rows > 0) {

                                    while($row = $facresult->fetch_assoc()) {
                                        $fname=$row['fname'];
                                        $lname=$row['lname'];
                                        $fimage=$row['imageName'];
                                        ?>

                                        <tr>
                                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                                Instructor Name
                                            </td>
                                            <td style="padding:10px 10px;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                                <?php echo $fname ?>
                                            </td>

                                        </tr>   <?php }} }}?>


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

        </div>
    </div>

    <br><br>



    <?php
    $rfilesql= "SELECT * FROM resources_files where Rid='$subid' and filetype='video'";
    $rfileresult = $conn->query($rfilesql);
    if ($rfileresult->num_rows > 0) {

    //

    ?>





    <div class="row justify-content-md-center" style="background:white;font-family:Segoe UI regular;font-size:18px;text-align:left;color:#707070;">
        <div  class="col-md-10">

            <div style="float:left">
                Videos
            </div>
            <div style="float:right;padding:5px">
                <center>
                    <img src="assets/user/images/Icon ionic-md-eye.png" style="height:15px">
                    <img src="assets/user/images/Icon feather-unlock.png" style="height:15px">
                </center>
            </div>

            <br style="line-height:1">
            <hr/ style="border-bottom:2px solid #707070">
            <br>

     <div class="col-md-10 col-sm-10 col-lg-10" id="vdotab" style="padding-top:110px">
                               <?php 
							   
							   
if(isset($_POST["view"])) {
		   $namez = $_POST["names"];
	   $file = $_POST["file"];?> 
	   
	
	        <video style="height:auto;width:100%;"  autoplay controls controlsList="nodownload" class="my_video">
                                            <source id="myVideo" name="myVideo"  src="admin/uploads/Resources/<?php echo $namez; ?>/video/<?php echo $file; ?> ">
                                        </video>
	   <?php
	   
}
							   ?>
                            </div>

            <br>

            <span style="color:#0A62A3;font-family:Segoe UI regular;"></span>
        </div>
    </div>

<br>
    <div class="row   " style="background:white;font-family:Segoe UI regular;font-size:12px;text-align:left;color:#0A62A3;">
        <?php while($row = $rfileresult->fetch_assoc()) {
            $filename=$row['filename'];
            $titles=$row['title'];         $names=$row['name']
            ?>
                  <div  class="col-md-3 col-lg-3 col-sm-3" style="height:190px;margin:20px;box-shadow:0px 1px 1px 1px #E1D6D6;border-bottom: 6px solid #0A62A3 ">
<form method="post" action="#vdotab" target="#vdotab"> 
                                 
                                   <button name="view"  style="border:none;background:white">
                                        <video style="height:150px;width:100%;" autoplay muted>
                                            <source id="myVideo" name="myVideo" src="admin/uploads/Resources/<?php echo $names; ?>/video/<?php echo $filename; ?>#t=0,22  ">
                                        </video>
                                   <input type="hidden" value="<?php echo $filename; ?>" name="file">
										<input type="hidden" value="<?php echo $names; ?>" name="names">
								    <input type="hidden" value="<?php echo $subid; ?>" name="rid">
								</button>
								   
                                    <center>
                                        <?php echo $titles; ?>
                                    </center>
                                </div>
</form>

        <?php }}?></div>


    <?php
    $rfilesqls= "SELECT * FROM resources_files where Rid='$subid' and filetype='worksheet'";
    $rfileresults = $conn->query($rfilesqls);
    if ($rfileresults->num_rows > 0) {
    ?>

    <div class="row justify-content-md-center" style="background:white;font-family:Segoe UI regular;font-size:18px;text-align:left;color:#707070;">
        <div  class="col-md-10">

            <div style="float:left">
                Worksheets
            </div>
            <div style="float:right;padding:5px">
                <center>
                    <img src="assets/user/images/Icon ionic-md-eye.png" style="height:15px">
                    <img src="assets/user/images/Icon feather-unlock.png" style="height:15px">
                </center>
            </div>

            <br style="line-height:1">
            <hr/ style="border-bottom:2px solid #707070">





        </div>
    </div>


    <div class="row justify-content-md-center " style="background:white;font-family:Segoe UI regular;font-size:12px;text-align:left;color:#0A62A3;">
        <div  class="col-md-10">
            <div class="row">
                <?php while($row = $rfileresults->fetch_assoc()) {
                    $filename=$row['filename'];
                    $titles=$row['title']
                    ?>
                    <div  class="col-md-3 col-lg-2 col-sm-1" style="height:180px;margin:15px ;box-shadow:0px 1px 1px 1px #E1D6D6;border-bottom: 6px solid #0A62A3">

                        <a href="admin/uploads/Resources/<?php echo $title; ?>/worksheet/<?php echo $filename; ?>" target="iframe_a">
                            <?php if(substr($filename,-3)=='doc' || substr($filename,-4)=='docx'){?>
                                <center>
                                    <img src="assets/user/images/doc.png"><br>

                                    <?php echo $titles; ?>&nbsp;<i class="fa fa-download" aria-hidden="true"></i>
                                </center>
                            <?php }?>
                        </a>
                        <a href="admin/uploads/Resources/<?php echo $title; ?>/worksheet/<?php echo $filename; ?>" target="iframe_a">
                            <?php if(substr($filename,-3)=='ppt' || substr($filename,-4)=='pptx'){?>
                                <center>
                                    <img src="assets/user/images/ppt.png"><br>

                                    <?php echo $titles; ?>&nbsp;<i class="fa fa-download" aria-hidden="true"></i>
                                </center>
                            <?php }?>
                        </a>
                        <a href="admin/uploads/Resources/<?php echo $title; ?>/worksheet/<?php echo $filename; ?>" target="iframe_a">
                            <?php if(substr($filename,-3)=='pdf' ){?>
                                <center>
                                    <img src="assets/user/images/pdf.png"><br>

                                    <?php echo $titles; ?>&nbsp;<i class="fa fa-download" aria-hidden="true"></i>
                                </center>
                            <?php }?>
                        </a>
                        <a href="admin/uploads/Resources/<?php echo $title; ?>/worksheet/<?php echo $filename; ?>" target="iframe_a">
                            <?php if(substr($filename,-3)=='mp3' ){?>
                                <center>
                                    <img src="assets/user/images/audio.png" style="height:80%"><br>

                                    <?php echo $titles; ?>&nbsp;<i class="fa fa-download" aria-hidden="true"></i>
                                </center>
                            <?php }?>
                        </a>

                    </div>



                <?php }}?></div></div></div>



    <br><br>
    <?php
    $rfilesqlx= "SELECT * FROM resources_files where Rid='$subid' and filetype='activity'";
    $rfileresultx = $conn->query($rfilesqlx);
    if ($rfileresultx->num_rows > 0) {
    ?>

    <div class="row justify-content-md-center" style="background:white;font-family:Segoe UI regular;font-size:18px;text-align:left;color:#707070;">
        <div  class="col-md-10">



            <div style="float:left">
                Games and Activity Ideas
            </div>
            <div style="float:right;padding:5px">
                <center>
                    <img src="assets/user/images/Icon ionic-md-eye.png" style="height:15px">
                    <img src="assets/user/images/Icon feather-unlock.png" style="height:15px">
                </center>
            </div>

            <br style="line-height:1">
            <hr/ style="border-bottom:2px solid #707070">





        </div>
    </div>


    <div class="row justify-content-md-center " style="background:white;font-family:Segoe UI regular;font-size:12px;text-align:left;color:#0A62A3;">
        <div  class="col-md-10">
            <div class="row">
                <?php while($row = $rfileresultx->fetch_assoc()) {
                    $filename=$row['filename'];
                    $titles=$row['title']
                    ?>
                    <div  class="col-md-3 col-lg-2 col-sm-1" style="height:180px;margin:15px ;box-shadow:0px 1px 1px 1px #E1D6D6;border-bottom: 5px solid #0A62A3">

                        <a href="admin/uploads/Resources/<?php echo $title; ?>/activity/<?php echo $filename; ?>" target="iframe_a">
                            <?php if(substr($filename,-3)=='doc' || substr($filename,-4)=='docx'){?>
                                <center>
                                    <img src="assets/user/images/doc.png"><br>

                                    <?php echo $titles; ?>&nbsp;<i class="fa fa-download" aria-hidden="true"></i>
                                </center>
                            <?php }?>
                        </a>
                        <a href="admin/uploads/Resources/<?php echo $title; ?>/activity/<?php echo $filename; ?>" target="iframe_a">
                            <?php if(substr($filename,-3)=='ppt' || substr($filename,-4)=='pptx'){?>
                                <center>
                                    <img src="assets/user/images/ppt.png"><br>

                                    <?php echo $titles; ?>&nbsp;<i class="fa fa-download" aria-hidden="true"></i>
                                </center>
                            <?php }?>
                        </a>
                        <a href="admin/uploads/Resources/<?php echo $title; ?>/activity/<?php echo $filename; ?>" target="iframe_a">
                            <?php if(substr($filename,-3)=='pdf' ){?>
                                <center>
                                    <img src="assets/user/images/pdf.png"><br>

                                    <?php echo $titles; ?>&nbsp;<i class="fa fa-download" aria-hidden="true"></i>
                                </center>
                            <?php }?>
                        </a>

                        <a href="admin/uploads/Resources/<?php echo $title; ?>/activity/<?php echo $filename; ?>" target="iframe_a">
                            <?php if(substr($filename,-3)=='mp3' ){?>
                                <center>
                                    <img src="assets/user/images/audio.png"><br>

                                    <?php echo $titles; ?>&nbsp;<i class="fa fa-download" aria-hidden="true"></i>
                                </center>
                            <?php }?>
                        </a>

                    </div>



                <?php } }?></div></div></div>





    <?php
    $rfilesqlz= "SELECT * FROM resources_files where Rid='$subid' and filetype='article'";
    $rfileresultz = $conn->query($rfilesqlz);
    if ($rfileresultz->num_rows > 0) {
    ?>

    <div class="row justify-content-md-center" style="background:white;font-family:Segoe UI regular;font-size:18px;text-align:left;color:#707070;">
        <div  class="col-md-10">


            <div style="float:left">
                Articles
            </div>
            <div style="float:right;padding:5px">
                <center>
                    <img src="assets/user/images/Icon ionic-md-eye.png" style="height:15px">
                    <img src="assets/user/images/Icon feather-unlock.png" style="height:15px">
                </center>
            </div>

            <br style="line-height:1">
            <hr/ style="border-bottom:2px solid #707070">





        </div>
    </div>


    <div class="row justify-content-md-center " style="background:white;font-family:Segoe UI regular;font-size:12px;text-align:left;color:#0A62A3;">
        <div  class="col-md-10">
            <div class="row">
                <?php while($row = $rfileresultz->fetch_assoc()) {
                    $filename=$row['filename'];
                    $titles=$row['title']
                    ?>
                    <div  class="col-md-3 col-lg-2 col-sm-1" style="height:180px;margin:15px ;box-shadow:0px 1px 1px 1px #E1D6D6;border-bottom: 5px solid #0A62A3">

                        <a href="admin/uploads/Resources/<?php echo $title; ?>/article/<?php echo $filename; ?>" target="iframe_a">
                            <?php if(substr($filename,-3)=='doc' || substr($filename,-4)=='docx'){?>
                                <center>
                                    <img src="assets/user/images/doc.png"><br>

                                    <?php echo $titles; ?>&nbsp;<i class="fa fa-download" aria-hidden="true"></i>
                                </center>
                            <?php }?>
                        </a>
                        <a href="admin/uploads/Resources/<?php echo $title; ?>/article/<?php echo $filename; ?>" target="iframe_a">
                            <?php if(substr($filename,-3)=='ppt' || substr($filename,-4)=='pptx'){?>
                                <center>
                                    <img src="assets/user/images/ppt.png"><br>

                                    <?php echo $titles; ?>&nbsp;<i class="fa fa-download" aria-hidden="true"></i>
                                </center>
                            <?php }?>
                        </a>
                        <a href="admin/uploads/Resources/<?php echo $title; ?>/article/<?php echo $filename; ?>" target="iframe_a">
                            <?php if(substr($filename,-3)=='pdf' ){?>
                                <center>
                                    <img src="assets/user/images/pdf.png"><br>

                                    <?php echo $titles; ?>&nbsp;<i class="fa fa-download" aria-hidden="true"></i>
                                </center>
                            <?php }?>
                        </a>
                        <a href="admin/uploads/Resources/<?php echo $title; ?>/worksheet/<?php echo $filename; ?>" target="iframe_a">
                            <?php if(substr($filename,-3)=='mp3' ){?>
                                <center>
                                    <img src="assets/user/images/audio.png"><br>

                                    <?php echo $titles; ?>&nbsp;<i class="fa fa-download" aria-hidden="true"></i>
                                </center>
                            <?php }?>
                        </a>

                    </div>



                <?php }}?></div></div></div>







<br><br>



	<font style="font-family: segoe ui semibold;font-size:20px"> 
	
		&nbsp;&nbsp;Write  Review&nbsp;&nbsp;<li class="fa fa-comments"></li> </font>
	<br>
	<hr/><hr/>	<br>	<br>
<center>
	  <?php
	$ui=$_SESSION['userid'];
           $ucsqls= "SELECT * FROM reviews where userid='$ui'and courseid='$subid' and type='resource' order by id desc limit 1 ";
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

<br>



<?php
include ("footer.php");
?>
