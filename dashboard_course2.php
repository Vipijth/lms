<?php
include("header.php");
include ("connection.php");
$subid= $_POST['rid'];
$xid = $_POST['rid'];
$rcid = $_POST['rcid'];
$id = $_POST['rcid'];
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
                    $start=$row['startdate'];
                    $end=$row['enddate'];
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



    <div class="row justify-content-md-center" style="background:white">
        <div class="col-md-10">
            <button class="accordion">Syllabus</button>
            <div class="panel">
                <div class="row justify-content-md-center">
                    <?php
                    $rcsql= "SELECT * FROM rc where courseId='$xid'";
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

                                    <div class="col-md-2" style="height:60px;margin:20px;overflow: hidden">
                                        <form action="dashboard_course2.php" method="post" >
                                            <input type="hidden" name="rcid" value="<?php echo $recid ?>">
                                            <input type="hidden" name="rid" value="<?php echo $xid ?>">
                                            <?php if($recid==$rcid){ ?>
                                                <button style="height:60px;width:100%;font-family:Segoe UI semibold;font-size:12px;color:#fff;background: #707070;border:none">
                                                    <?php echo $rname ?>
                                                </button>
                                            <?php } ?>
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


    <br>	<br>

    <?php
    $resourcesql= "SELECT * FROM resources where id='$id'";
    $resourceresult = $conn->query($resourcesql);
    if ($resourceresult->num_rows > 0) {

        while($row = $resourceresult->fetch_assoc()) {
            $image=$row['image'];
            $title=$row['name'];
            $cat=$row['category'];
            $about=$row['about'];
            $amount=$row['amount'];
            $skill1=$row['skill1'];
            $skill2=$row['skill2'];
            $skill3=$row['skill3'];
            $skill4=$row['skill4'];
            $rid=$row['id'];
            ?>




            <br>
            <br>



            <div class="row justify-content-md-center" style="background:white;font-family:Segoe UI regular;font-size:16px;text-align:left;color:#0A62A3;">
                <div class="col-md-10">
                    <span style="color:#707070;font-family:Segoe UI semibold;">Instructor</span>
                    <br>	<br>
                    <div class="row" style="background:white;">


                        <br style="line-height:.8">


                        <?php
                        $instructorsql= "SELECT * FROM instructor where resourceid='$id'";
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

                                        <div class="col-md-3 col-sm-3 col-lg-3" style="margin:5px;height:150px">
                                            <div  style="float:left">
                                                <img src="admin/uploads/faculty/<?php echo $fimage; ?>"  style="height:140px;width:180px">
                                            </div>
                                            <div  style="float:right;padding:0%">

                                                <?php echo $fname ?>
                                            </div>
                                        </div>
                                    <?php }} }}?>


                    </div>
                </div>
            </div>


            <br>

            <br>
        <?php }} ?>




    <?php
    $rfilesql= "SELECT * FROM resources_files where Rid='$id' and filetype='video'";
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

            <div class="row justify-content-md-center" >

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

                        </div>

            <br>

      
            <span style="color:#0A62A3;font-family:Segoe UI regular;"></span>
            </div>
            </div>

            <br>
            <div class="row   " style="background:white;font-family:Segoe UI regular;font-size:12px;text-align:left;color:#0A62A3;">
                <?php while($row = $rfileresult->fetch_assoc()) {
                    $filename=$row['filename'];
                    $titles=$row['title'];
					 $names=$row['name']
                    ?>
                                      <div  class="col-md-2 col-lg-2 col-sm-2" style="height:190px;margin:20px;box-shadow:0px 1px 1px 1px #E1D6D6;border-bottom: 6px solid #0A62A3 ">
<form method="post" action="#vdotab" target="#vdotab"> 
                                 
                                   <button name="view"  style="border:none;background:white">
                                        <video style="height:150px;width:100%;" autoplay muted  >
                                            <source id="myVideo" name="myVideo" src="admin/uploads/Resources/<?php echo $names; ?>/video/<?php echo $filename; ?>#t=0,22 ">
                                        </video>
                                   <input type="hidden" value="<?php echo $filename; ?>" name="file">
										<input type="hidden" value="<?php echo $names; ?>" name="names">
								    <input type="hidden" value="<?php echo $subid; ?>" name="rid">
									   <input type="hidden" value="<?php echo $rcid; ?>" name="rcid">
								</button>
								   
                                    <center>
                                        <?php echo $titles; ?>
                                    </center>
                                </div>

</form>



                <?php }?></div>

  

   
	
	<?php } ?>





    <br>
</div>




<?php
$rfilesqls= "SELECT * FROM resources_files where Rid='$id' and filetype='worksheet'";
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
                        <div  class="col-md-2 col-lg-2 col-sm-1" style="height:180px;margin:15px ;box-shadow:0px 1px 1px 1px #E1D6D6;border-bottom: 6px solid #0A62A3">

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
                                        <img src="assets/user/images/audio.png"><br>

                                        <?php echo $titles; ?>&nbsp;<i class="fa fa-download" aria-hidden="true"></i>
                                    </center>
                                <?php }?>
                            </a>
                        </div>



                    <?php }?></div></div></div>




    </div>
<?php } ?>




<?php
$rfilesqlx= "SELECT * FROM resources_files where Rid='$id' and filetype='activity'";
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
                        <div  class="col-md-2 col-lg-2 col-sm-1" style="height:180px;margin:15px ;box-shadow:0px 1px 1px 1px #E1D6D6;border-bottom: 5px solid #0A62A3">

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
                                        <img src="assets/user/images/audio.png"><br>

                                        <?php echo $titles; ?>&nbsp;<i class="fa fa-download" aria-hidden="true"></i>
                                    </center>
                                <?php }?>
                            </a>


                        </div>



                    <?php }?></div></div></div>







 
    </div>
<?php } ?>





<?php
$rfilesqlz= "SELECT * FROM resources_files where Rid='$id' and filetype='article'";
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
                        <div  class="col-md-2 col-lg-2 col-sm-1" style="height:180px;margin:15px ;box-shadow:0px 1px 1px 1px #E1D6D6;border-bottom: 5px solid #0A62A3">

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
                                        <img src="assets/user/images/audio.png"><br>

                                        <?php echo $titles; ?>&nbsp;<i class="fa fa-download" aria-hidden="true"></i>
                                    </center>
                                <?php }?>
                            </a>

                        </div>



                    <?php }?></div></div></div>









    </div>
<?php } ?>



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
