<?php
include ("header.php");
include ("connection.php");
$id = $_GET['rid'];
if(isset($_POST["enrolllog"])) {


$_SESSION['url']='newres.php?rid='.$id;
$url=$_SESSION['url'];


//header('Location: '.$url);
}

if(isset($_POST["enroll"])) {
    $subid = $_POST["subid"];
    $userid = $_POST["userid"];
    $type = $_POST["type"];
    $category = 'free';
    $sqlenroll = 'INSERT INTO user_courses(category, type,subid, userid ) VALUES 
   ("' . $category . '","' . $type . '","' . $subid . '","' . $userid . '")';

    if ($conn->query($sqlenroll) === TRUE) {


    } else {

    }
}

if(isset($_POST["addtocart"])) {
    $subid = $_POST["subid"];
    $subname = $_POST["subname"];
    $userid = $_POST["userid"];
    $useremail = $_POST["useremail"];
    $type = $_POST["subtype"];
    $amount =  $_POST["amount"];
    $sqlenroll = 'INSERT INTO cart(name, courseid,category, cartuser,useremail,amount ) VALUES 
   ("' . $subname . '","' . $subid . '","' . $type . '","' . $userid . '","' . $useremail . '","' . $amount . '")';

    if ($conn->query($sqlenroll) === TRUE) {

        echo "<script> alert('Successfully Added...!');</script>" ;
    } else {

    }
}
?>


<link rel="stylesheet" href="assets/user/css/stick.css" xmlns="http://www.w3.org/1999/html">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'>

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<script  src="assets/user/js/stick.js"></script>
<div class="container-fluid" style="padding-top: 3%">


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

<section class="et-hero-tabs">

    <?php
    $resourcesql= "SELECT * FROM resources where id='$id'";
    $resourceresult = $conn->query($resourcesql);
    $about='';
    $skill1='';
    $skill2='';
    $skill3='';
    $skill4='';
    $title='';
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
    //$st=$row['startdate'];
    $rid=$row['id'];
    ?>

    <div class="row justify-content-md-center" style="background:white;height:auto">
        <div class="col-md-10" style="height:auto;background:white;font-family:Segoe UI semibold;font-size:18px;text-align:left;color:#0A62A3;overflow:hidden" id="resmain">
           
           <br><br> <br> <big><big> <?php echo $title; ?></big></big>
            <div class="row" >

                <div class="col-md-12 col-sm-6 col-lg-6" style="margin:14px;height:auto;">

                    <img src="admin/uploads/Resources/<?php echo $title; ?>/image/<?php echo $image; ?>" style="height:auto;width:100%" id="rsimg">


                </div>
                <div class="col-md-12 col-sm-6 col-lg-5" style="margin:14px;height:500px;font-size: 14px">
                    <center>

                        <img src="assets/user/images/nochat.png" style="height:300px;width:300px" id="nochat">

                        <br><br><br>



                        <?php if($cat=='free'){ ?>
                            <?php
                            if (isset($_SESSION['utype']) && isset($_SESSION['userid']) ) {
                                if($_SESSION['utype']=='teacher') {
                                    ?>

                                    <div  style="border:1px dotted #707070;height:40px;width:180px;padding:10px 10px;color:#0A62A3">
                                        Free Resource
                                    </div>
                                    <div class="row justify-content-md-center">
                                        <?php
                                        $usid=$_SESSION['userid'];
                                        $checksql= "SELECT * FROM user_courses where category='free' and type='resource' and userid='$usid' and subid=$id limit 1";
                                        $checkresult = $conn->query($checksql);
                                        if ($checkresult->num_rows > 0) {
                                            while($row = $checkresult->fetch_assoc()) {?>



                                                <div  class="col-md-5" style="font-size:20px;margin:5px;height:20px;padding:5px 10px;color:#0A62A3;">
                                                    <a href="dashboard.php">

                                                        <button   Style="width:100%;padding:10px 10px;font-size:16px;border:none; background:#0A62A3; color:white;font-family: Segoe UI semibold">
                                                            Go to Dashboard</button>
                                                    </a>
                                                </div>
                                            <?php }}else{?>
                                            <div  class="col-md-6" style="font-size:20px;margin:5px;height:20px;padding:5px 10px;color:#0A62A3;">
                                                <form action="" method="post">
                                                    <input type="hidden" value="<?php echo $id; ?>" name="rid">
                                                    <input type="hidden" value="<?php echo $id; ?>" name="subid">
                                                    <input type="hidden" value="<?php echo $_SESSION['userid']; ?>" name="userid">
                                                    <input type="hidden" value="resource" name="type">

                                                    <button  name="enroll" Style="width:100%;padding:10px 10px;font-size:16px;border:none; background:#0A62A3; color:white;font-family: Segoe UI semibold">
                                                        Enroll now</button>
                                                </form>
                                            </div>

                                        <?php } ?>

                                    </div>
                                 <?php }  if($_SESSION['utype']!='teacher'){ ?>
							<b> Note : </b>	Login As Teacher / Parent to Buy this Resource
								<?php } } else{?>
                                <div  style="border:1px dotted #707070;height:40px;width:180px;padding:10px 10px;color:#0A62A3">
                                    Free Resource
                                </div>
                                <div  style="height:40px;width:180px;padding:6px 10px;color:#0A62A3">
<form action="" method="post">
<input type="hidden" value="<?php echo $id; ?>" name="rid">
                                    <button  name="enrolllog" Style="width:100%;padding:10px 10px;font-size:16px;border:none; background:#0A62A3; color:white;font-family: Segoe UI semibold" onclick="alert('Please Login to Enroll')">
                                        Enroll now</button>
                                        </form>
                                        
                                </div>
                            <?php } ?>

                        <?php } ?>







                        <?php if($cat=='paid'){
                            ?>
                            <?php
                            if (isset($_SESSION['utype']) && isset($_SESSION['userid']) ) {
                                if($_SESSION['utype']=='teacher') {
                                    ?>

                                        <div  class="col-md-5" style="font-size:20px;margin:10px;border:1px dotted #707070;height:50px;padding:5px 10px;color:#0A62A3;">
                                            &#8377;<?php echo $amount ?>
                                        </div>




                                    <div class="row justify-content-md-center">
                                    <?php
                                    $usid3=$_SESSION['userid'];
                                    $checksql3= "SELECT * FROM oc where userid='$usid3' and category='resource'  and courseid='$id' and status='1'";
                                    $checkresult3 = $conn->query($checksql3);
                                    if ($checkresult3->num_rows < 1) {
                                        $usid2=$_SESSION['userid'];

                                        $checksql1= "SELECT * FROM cart where cartuser='$usid2' and category='resource'  and courseid='$id' and cartstatus='1'";
                                        $checkresult1 = $conn->query($checksql1);
                                        if ($checkresult1->num_rows < 1) {
                                            ?>

                                            <div  class="col-md-3" style="font-size:20px;margin:5px;height:20px;padding:5px 10px;color:#0A62A3;">

                                                <form action="" method="post">
                                                    <input type="hidden" value="<?php echo $id; ?>" name="rid">
                                                    <input type="hidden" name="subname" value="<?php echo $title; ?>">
                                                    <input type="hidden" name="useremail" value="<?php echo $_SESSION['useremail']; ?>">
                                                    <input type="hidden" name="userid" value="<?php echo $_SESSION['userid']; ?>">
                                                    <input type="hidden" name="subid" value="<?php echo $id; ?>">
                                                    <input type="hidden" name="subtype" value="resource">
                                                    <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                                                    <button Style="width:100%;padding:10px 10px;font-size:16px;border:none; background:#0A62A3; color:white;font-family: Segoe UI semibold" name="addtocart">
                                                        Add to Cart</button>&nbsp;&nbsp;
                                                </form>
                                            </div>
                                        <?php }else{?>

                                            <div class="col-md-5"  style="margin:5px;height:20px;padding:5px 10px;color:#0A62A3;">
                                                <a href="carts.php">
                                                    <button Style="width:100%;padding:10px 10px;font-size:16px;border:none; background:#0A62A3; color:white;font-family: Segoe UI semibold">
                                                        Go to Cart</button></a>
                                            </div>
                                            <br>
                                        <?php } ?>

                                  <!--      <div class="col-md-4"  style="margin:5px;height:20px;padding:5px 10px;color:#0A62A3;">

                                                    <form action="cart2.php" method="post">
                                                    <input type="hidden" value="<?php echo $id; ?>" name="rid">
                                                    <input type="hidden" name="subname" value="<?php echo $title; ?>">
                                                    <input type="hidden" name="useremail" value="<?php echo $_SESSION['useremail']; ?>">
                                                    <input type="hidden" name="userid" value="<?php echo $_SESSION['userid']; ?>">
                                                    <input type="hidden" name="subid" value="<?php echo $id; ?>">
                                                    <input type="hidden" name="subtype" value="resource">
                                                    <input type="hidden" name="amount" value="<?php echo $amount; ?>">

                                            <button Style="width:100%;padding:10px 1px;font-size:10px;border:none; background:#0A62A3; color:white;font-family: Segoe UI semibold">
                                                Buy Now</button>
                                                </form>
                                        </div>-->

                                        </div>
                                    <?php }else{ ?>

                                        <div class="col-md-3"  style="margin:5px;height:20px;padding:5px 10px;color:#0A62A3;">
                                            <a href="dashboard.php">
                                                <button Style="width:100%;padding:10px 10px;font-size:16px;border:none; background:#0A62A3; color:white;font-family: Segoe UI semibold">
                                                    Go to Dashboard</button></a>
                                        </div>
                                    <?php } ?>
                               <?php }  if($_SESSION['utype']!='teacher'){ ?>
							<b> Note : </b>	Login As Teacher / Parent to Buy this Resource
								<?php } } else{?>
                                <div  style="border:1px dotted #707070;height:40px;width:180px;padding:6px 10px;color:#0A62A3">


                                    <big> &#8377; <?php
                                        echo $amount ?> </big>
                                </div>
                                <div  style="height:40px;width:180px;padding:6px 10px;color:#0A62A3">
<form action="" method="post">
<input type="hidden" value="<?php echo $id; ?>" name="rid">
                                    <button  name="enrolllog" Style="width:100%;padding:10px 10px;font-size:16px;border:none; background:#0A62A3; color:white;font-family: Segoe UI semibold" onclick="alert('Please Login to Enroll')">
                                        Add To Cart</button>
                                        </form>
                                </div>

                            <?php }}} ?>
                </div>
                </center>
            </div> </div>
        </div>
    </div>
    <section id="about">
</div>

<?php } ?>


<div class="et-hero-tabs-container">
        <a class="et-hero-tab" href="#tab-es6">About </a>
        <a class="et-hero-tab" href="#tab-flexbox">Skills</a>
         <?php
            $instructorsql= "SELECT * FROM instructor where resourceid='$id'";
            $instructorresult = $conn->query($instructorsql);
            if ($instructorresult->num_rows > 0) {
           
       

                        while($row = $instructorresult->fetch_assoc()) {
                            $instid=$row['instructorId'];
                            $facultysql= "SELECT * FROM faculty where id='$instid'";
                            $facresult = $conn->query($facultysql);
                            if ($facresult->num_rows > 0) { ?>
        <a class="et-hero-tab" href="#tab-react">Faculty</a>
        
        <?php }} } ?>
        <a class="et-hero-tab" href="#tab-angular">Syllabus</a>
        <!--<a class="et-hero-tab" href="#tab-other">Reviews</a>-->
        <span class="et-hero-tab-slider"></span>
    </div>
</section>

<!-- Main -->
<main class="et-main">
    <section class="et-slide" id="tab-es6" style="padding:50px 50px">
        <br><br><br><br><br>

        <h3><?php echo $about ?></h3>
    </section>
    <section class="et-slide" id="tab-flexbox" style="text-align: left !important;">
        <br><br><br>   <br><br>  
<div style="width: 100% !important;float: left !important;text-transform:capitalize">
    <h1><small><small><small>Skills You Gain From <?php echo $title ?></small></small></small></h1><br>
    <hr/><br>
    <h3 ><big> Skill 1 : <?php echo $skill1 ?></big></h3><br>   <hr/><br>
    <h3 ><big> Skill 2 : <?php echo $skill2 ?></big></h3><br>   <hr/><br>
    <h3 ><big>Skill 3 : <?php echo $skill3 ?></big></h3><br>   <hr/><br>
    <h3 ><big>Skill 4 : <?php echo $skill4 ?></big></h3><br>   <hr/><br>



</div>
   
    </section>
    
  <?php
            $instructorsql= "SELECT * FROM instructor where resourceid='$id'";
            $instructorresult = $conn->query($instructorsql);
            if ($instructorresult->num_rows > 0) {
           
       ?>
    <section class="et-slide" id="tab-react">
        <br><br><br> <br>  
        <div style="width: 100% !important;">
             <h1><small>Faculty</small></h1><br> <br>
<div class="row"> 
           <?php
    
           
   
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

                                    <div class="col-md-4 col-sm-4 col-lg-3" style="margin:25px;height:auto;box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);">
                                        <div  style="float:left">
                                            <img src="admin/uploads/faculty/<?php echo $fimage; ?>"  style="height:auto;width:100%">
                                       <br><br>   <?php echo $fname ?> <?php echo $lname ?><br><br>
                                        </div>

                                    </div>          
                             
                                    
                                    
                                <?php }} }}?>
</div>

                    </div>

        </div>
        <br><br><br>   <br><br><br> <br><br><br>
    </section>
    <section class="et-slide" id="tab-angular">
        <br><br><br><br><br>

        <div style="width:90%;position:relative; right:0px !important;">

            <?php
            $rfilesql= "SELECT * FROM resources_files where Rid='$id' and filetype='video'";
            $rfileresult = $conn->query($rfilesql);
            if ($rfileresult->num_rows > 0) {

                //

                ?>





                <div class="row justify-content-md-center" style="background:white;font-family:Segoe UI regular;font-size:18px;text-align:left;color:#707070;">
                <div  class="col-md-12">
                <?php   if (isset($_SESSION['userid'])) {?>
                    <?php if($cat=='free'){ ?>
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
                    
                        <div class="row justify-content-md-center" >

                            <div class="col-md-10 col-sm-10 col-lg-10" id="vdotab" style="padding-top:40px">
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
                                <div  class="col-md-6 col-lg-6 " style="height:auto;margin:10px; ">
<form method="post" action="#vdotab" target="#vdotab"> 
                                 
                                   <button name="view"  style="border:none;background:white">
                                            <video style="height:340px;width:100%;" loop autoplay="autoplay"  muted  >
                                            <source id="myVideo" name="myVideo" src="admin/uploads/Resources/<?php echo $names; ?>/video/<?php echo $filename; ?>#t=0,22 ">
                                        </video>
                                   <input type="hidden" value="<?php echo $filename; ?>" name="file">
										<input type="hidden" value="<?php echo $names; ?>" name="names">
								    <input type="hidden" value="<?php echo $id; ?>" name="rid">
								</button>
								   
                                    <center>
                                        <?php echo $titles; ?>
                                    </center>
                                </div>

</form>

                            <?php }?></div>

                    <?php } } if (!isset($_SESSION['userid']) ||$cat=='paid' ){ ?>


                    <div style="float:left">
                        Videos
                    </div>
                    <div style="float:right;padding:5px">
                        <center>
                            <img src="assets/user/images/noeye.png" style="height:15px">
                            <img src="assets/user/images/Iconfeather-lock.png" style="height:15px">
                        </center>
                    </div>

                    <br style="line-height:1">
                    <hr/ style="border-bottom:2px solid #707070">
                    <br>


                    <div class="row " style="background:white;font-family:Segoe UI regular;font-size:12px;text-align:left;color:#0A62A3;">
                        <?php while($row = $rfileresult->fetch_assoc()) {
                            $filename=$row['filename'];
                            $titles=$row['title'];
                                 $names=$row['name']
                            ?>
                            <div  class="col-md-6 col-lg-6 " style="height:auto;margin:10px" data-toggle="tooltip" data-placement="bottom" title="Log In & Unlock">
                                <video style="height:340px;width:100%;" loop autoplay="autoplay"  muted  >
                                    <source id="myVideo" name="myVideo" src="admin/uploads/Resources/<?php echo $names; ?>/video/<?php echo $filename; ?>#t=0,22 ">
                                </video>
<br><br>
                                <center>
                                    <?php echo $titles; ?> <img src="assets/user/images/Iconfeather-lock.png" style="height:15px">
                                </center>
                            </div>



                        <?php } ?>

                    </div>
                <?php } ?><?php } ?>

<hr/>
            <br><br><br>
            <?php
            $rfilesqls= "SELECT * FROM resources_files where Rid='$id' and filetype='worksheet'";
            $rfileresults = $conn->query($rfilesqls);
            if ($rfileresults->num_rows > 0) {
            ?>

            <div class="row justify-content-md-center" style="background:white;font-family:Segoe UI regular;font-size:18px;text-align:left;color:#707070;">
                <div  class="col-md-12">

                    <?php   if (isset($_SESSION['userid'])) {?>

                    <?php if($cat=='free'){ ?>
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
                <div  class="col-md-12">
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
                                            <img src="assets/user/images/audio.png" style="height:80%"><br>

                                            <?php echo $titles; ?>&nbsp;<i class="fa fa-download" aria-hidden="true"></i>
                                        </center>
                                    <?php }?>
                                </a>

                            </div>



                        <?php }?>


                    </div>

                    <?php }} if (!isset($_SESSION['userid']) ||$cat=='paid' ){?>






                  
                    <?php } ?>
                </div>    </div>
                <?php } ?>


                        <?php
                        $rfilesqlx= "SELECT * FROM resources_files where Rid='$id' and filetype='activity'";
                        $rfileresultx = $conn->query($rfilesqlx);
                        if ($rfileresultx->num_rows > 0) {
                        ?>

                        <div class="row justify-content-md-center" style="background:white;font-family:Segoe UI regular;font-size:18px;text-align:left;color:#707070;">
                            <div  class="col-md-12">


                                <?php   if (isset($_SESSION['userid'])) {?>
                                <?php if($cat=='free'){ ?>
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
                            <div  class="col-md-12">
                                <div class="row">
                                    <?php while($row = $rfileresultx->fetch_assoc()) {
                                        $filename=$row['filename'];
                                        $titles=$row['title']
                                        ?>
                                        <div  class="col-md-2 col-lg-2 col-sm-1" style="height:180px;margin:15px ;box-shadow:0px 1px 1px 1px #E1D6D6;border-bottom: 5px solid #0A62A3">

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



                                    <?php }?></div></div></div>

                    <?php }} if (!isset($_SESSION['userid']) ||$cat=='paid' ){?>






                  
                    <?php } ?>

                    <?php } ?>








        <?php
        $rfilesqlxt= "SELECT * FROM resources_files where Rid='$id' and filetype='article'";
        $rfileresultxt = $conn->query($rfilesqlxt);
        if ($rfileresultxt->num_rows > 0) {
            ?>

            <div class="row justify-content-md-center" style="background:white;font-family:Segoe UI regular;font-size:18px;text-align:left;color:#707070;">
            <div  class="col-md-12">


            <?php   if (isset($_SESSION['userid'])) {?>
                <?php if($cat=='free'){ ?>
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
                        <div  class="col-md-12">
                            <div class="row">
                                <?php while($row = $rfileresultxt->fetch_assoc()) {
                                    $filename=$row['filename'];
                                    $titles=$row['title']
                                    ?>
                                    <div  class="col-md-2 col-lg-2 col-sm-1" style="height:180px;margin:15px ;box-shadow:0px 1px 1px 1px #E1D6D6;border-bottom: 5px solid #0A62A3">

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

                                        <a href="admin/uploads/Resources/<?php echo $title; ?>/article/<?php echo $filename; ?>" target="iframe_a">
                                            <?php if(substr($filename,-3)=='mp3' ){?>
                                                <center>
                                                    <img src="assets/user/images/audio.png"><br>

                                                    <?php echo $titles; ?>&nbsp;<i class="fa fa-download" aria-hidden="true"></i>
                                                </center>
                                            <?php }?>
                                        </a>

                                    </div>



                                <?php }?></div></div></div>

                <?php }} if (!isset($_SESSION['userid']) ||$cat=='paid' ){?>






            <?php } ?>
            </div>
        <?php } ?>


        </div></div></div>









        <br>
        </div>


        </div>
        <br><br><br>   <br><br><br>
    </section>
    
    <?php    $ucsqls= "SELECT * FROM reviews where courseid=$id and type='resource'";
           $ucresultss = $conn->query($ucsqls);
           if ($ucresultss->num_rows >0) {  ?>
  <section class="et-slide" id="tab-s">
          <div class="row justify-content-md-center" style="background:white">
			<div class="col-md-8">
                <br><br>
              <div class="row justify-content-md-center" style="background:white;font-family:Segoe UI regular;font-size:14px;text-align:justify">
				<center>
		
				
				<div id="carousel">
  <div class="btn-bar">
    <div id="buttons"><a id="prev" href="#"><</a><a id="next" href="#">></a> </div></div>
    <div id="slides">
        <ul>
			
				
        <?php

        
while($row = $ucresultss->fetch_assoc()) {	?>
 
 <?php    if($ucresultss->num_rows ==1){  ?>
    
        <li class="slide">
                   <div class="quoteContainer">
                <p class="quote-phrase"><span class="quote-marks">"</span>
                    <?php echo $row['comment'] ?>
                 <span class="quote-marks">"</span>

                </p>
            </div>
            <div class="authorContainer">
                <p class="quote-author"><?php echo $row['username'] ?></p>
            </div>
        </li>   
        <li class="slide">
                   <div class="quoteContainer">
                <p class="quote-phrase"><span class="quote-marks">"</span>
                    <?php echo $row['comment'] ?>
                 <span class="quote-marks">"</span>

                </p>
            </div>
            <div class="authorContainer">
                <p class="quote-author"><?php echo $row['username'] ?></p>
            </div>
        </li> 
        <li class="slide">
                   <div class="quoteContainer">
                <p class="quote-phrase"><span class="quote-marks">"</span>
                    <?php echo $row['comment'] ?>
                 <span class="quote-marks">"</span>

                </p>
            </div>
            <div class="authorContainer">
                <p class="quote-author"><?php echo $row['username'] ?></p>
            </div>
        </li>   
        <?Php }?>
        

        <?php    if($ucresultss->num_rows ==2){  ?>

    <li class="slide">
               <div class="quoteContainer">
            <p class="quote-phrase"><span class="quote-marks">"</span>
                <?php echo $row['comment'] ?>
             <span class="quote-marks">"</span>

            </p>
        </div>
        <div class="authorContainer">
            <p class="quote-author"><?php echo $row['username'] ?></p>
        </div>
    </li> 

    <?Php }?>

    <?php    if($ucresultss->num_rows >2){  ?>
    
    <li class="slide">
               <div class="quoteContainer">
            <p class="quote-phrase"><span class="quote-marks">"</span>
                <?php echo $row['comment'] ?>
             <span class="quote-marks">"</span>

            </p>
        </div>
        <div class="authorContainer">
            <p class="quote-author"><?php echo $row['username'] ?></p>
        </div>
    </li>   

    <?Php }?>

        <?Php }?>
                
       
        </ul>
    </div>	
					
		
		
				<img src="assets/user/images/Gif.gif" style="height:210px">
				 <br><br> <br><br>
				</center>
			  </div>
			 </div>
		   </div>
           <?Php }?>
    </section>


    <style>
	  
#carousel {
position: relative;
width:100%;
margin:0 auto;
}

#slides {
overflow: hidden;
position: relative;
width: 100%;
height: auto;
}

#slides ul {
list-style: none;
width:100%;
height:auto;
margin: 0;
padding: 0;
position: relative;
}

 #slides li {
width:100%;
height:auto;
float:left;
text-align: center;
position: relative;
font-family:lato, sans-serif;
}
/* Styling for prev and next buttons */
.btn-bar{
    max-width: 346px;
    margin: 0 auto;
    display: block;
    position: relative;
    top: 40px;
    width: 100%;
}

 #buttons {
padding:0 0 5px 0;
float:right;
}

#buttons a {
text-align:center;
display:block;
font-size:50px;
float:left;
outline:0;
margin:0 60px;
color:#827D7D;
text-decoration:none;
display:block;
padding:9px;
width:35px;
}

a#prev:hover, a#next:hover {
color:#FFF;
text-shadow:.5px 0px #b14943;  
}

.quote-phrase, .quote-author {
font-family:segoe ui semibold;
font-weight:300;
display: table-cell;
vertical-align: middle;
padding: 15px 20px;
	color: #000;
font-family:segoe ui semibold;
}

.quote-phrase {
height: auto;
font-size:16px;
color:#000;
font-style:italic;
text-shadow:.5px 0px #b14943;  
}

.quote-marks {
font-size:30px;
padding:0 3px 3px;
position:inherit;
}

.quote-author {
font-style:normal;
font-size:20px;
color:#b14943;
font-weight:400;
height: 30px;
}

.quoteContainer, .authorContainer {
display: table;
width: 100%;
}</style>	
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script>
	  $(document).ready(function () {
    //rotation speed and timer
    var speed = 5000;
    
    var run = setInterval(rotate, speed);
    var slides = $('.slide');
    var container = $('#slides ul');
    var elm = container.find(':first-child').prop("tagName");
    var item_width = container.width();
    var previous = 'prev'; //id of previous button
    var next = 'next'; //id of next button
    slides.width(item_width); //set the slides to the correct pixel width
    container.parent().width(item_width);
    container.width(slides.length * item_width); //set the slides container to the correct total width
    container.find(elm + ':first').before(container.find(elm + ':last'));
    resetSlides();
    
    
    //if user clicked on prev button
    
    $('#buttons a').click(function (e) {
        //slide the item
        
        if (container.is(':animated')) {
            return false;
        }
        if (e.target.id == previous) {
            container.stop().animate({
                'left': 0
            }, 1500, function () {
                container.find(elm + ':first').before(container.find(elm + ':last'));
                resetSlides();
            });
        }
        
        if (e.target.id == next) {
            container.stop().animate({
                'left': item_width * -2
            }, 1500, function () {
                container.find(elm + ':last').after(container.find(elm + ':first'));
                resetSlides();
            });
        }
        
        //cancel the link behavior            
        return false;
        
    });
    
    //if mouse hover, pause the auto rotation, otherwise rotate it    
    container.parent().mouseenter(function () {
        clearInterval(run);
    }).mouseleave(function () {
        run = setInterval(rotate, speed);
    });
    
    
    function resetSlides() {
        //and adjust the container so current is in the frame
        container.css({
            'left': -1 * item_width
        });
    }
    
});
//a simple function to click next link
//a timer will call this function, and the rotation will begin

function rotate() {
    $('#next').click();
}
	  </script>
					
<!--
    <section class="et-slide" id="tab-other">
        <h1>Other</h1>
        <h3>something about other</h3>
    </section>

    -->



</main>

</div>









<?php

include ("footer.php");
?>
