<?php
include("header.php");
include ("connection.php");
$xid = $_POST['rid'];
$rcid = $_POST['rcid'];
$id = $_POST['rcid'];
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
    <body style="overflow-x: hidden">
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

        .panel {
            padding: 0 18px;
            display: block;
            background-color: white;
            overflow: hidden;
        }
    </style>
    <style>
        html *
        {


            font-family: segoe ui semibold !important;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            `
            `<?php
            $slidersql= "SELECT * FROM slider";
            $sliderresult = $conn->query($slidersql);
            if ($sliderresult->num_rows > 0) {

                while($row = $sliderresult->fetch_assoc()) {
                    $image=$row['slider'];
                    $title=$row['coupen'];
                    $cat=$row['category'];
                    if($cat=='courses' ){
                        ?>
                        <div class="col-md-12"  id="coursebg" style="background-image:url('admin/uploads/slider/<?php echo $image; ?>' )">

                            <div id="pageimg">
                                <img class="d-block w-100" src="assets/user/images/courseimg.png">
                            </div>
                            <div id="coupon">
                                <center>
                                    <br><br><br>
                                    <font color="#6B4B20">
                                        <?php echo $title; ?>
                                    </font>
                                    <br>
                                    <font color="#EB4D5E">
                                        <small>FOR FIRST TIME USERS</small>
                                    </font>
                                    <br><br style="line-height:.8">
                                    <button id="coupbutton">
                                        Sign In Now !
                                    </button>
                                </center>
                            </div>
                        </div>
                    <?php }} } ?>
        </div>


    </div>



    <div class="row justify-content-md-center" style="background:#455A64;height:110px">

        <!-- <div class="col-md-8" style="height:60px">
             <center>
                <input  class="form-control mr-sm-2" type="search" id="searchcourse" placeholder="&#xF002; Let's find out what you are looking for" aria-label="Search" style="font-family:Segoe UI, FontAwesome">
             </center>
          </div>
          <div class="col-md-5" style="padding:10px 10px;height:35px;background:#EB4C5E;font-family:Segoe UI semibold;color:white">

                <ul id="searchul">
                    <li style="padding: 0px 10px;list-style: none">
                      Top Searches:
                   </li>

                </ul>

          </div>-->

    </div>



    <br><br>
<?php
$resourcesql= "SELECT * FROM course where id='$xid'";
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
    $st=$row['startdate'];
    $rid=$row['id'];
    ?>

    <div class="row justify-content-md-center" style="background:white;height:auto">
        <div class="col-md-10" style="height:auto;background:white;font-family:Segoe UI semibold;font-size:14px;text-align:left;color:#F36978;">
            <big> <?php echo $title; ?></big>
            <div class="row" >

                <div class="col-md-12 col-sm-6 col-lg-5" style="margin:14px;height:auto;">


                    <img src="admin/uploads/Courses/<?php echo $title; ?>/image/<?php echo $image; ?>" style="height:250px;width:100%">


                    <br>
                    <br>
                    <a href="#about">
                        <img src="assets/user/images/aboutbutton.png" style="height:90px">
                    </a>
                    <a href="#instructor">
                        <img src="assets/user/images/instructorbutton.png" style="height:90px">
                    </a>
                    <a href="#syllabus">
                        <img src="assets/user/images/syllabusbutton.png" style="height:90px">
                    </a>
                    <a href="#reviw">
                        <img src="assets/user/images/reviewbutton.png" style="height:90px">
                    </a>
                </div>
                <div class="col-md-12 col-sm-6 col-lg-6" style="margin:14px">
                    <center>

                        <img src="assets/user/images/combo.png" style="height:270px;width:100%">

                        <br><br><br>

                        <?php if($cat=='free'){ ?>
                            <?php
                            if (isset($_SESSION['utype'])) {

                                if($_SESSION['utype']=='teacher') { ?>
                            <?php
                            if (isset($_SESSION['userid'])) {?>

                                <div  style="border:1px dotted #707070;height:40px;width:180px;padding:10px 10px;color:#F36978">
                                    Free Course
                                </div>
                                <div class="row justify-content-md-center">
                                    <?php
                                    $usid=$_SESSION['userid'];
                                    $checksql= "SELECT * FROM user_courses where category='free' and type='course' and userid='$usid' and subid=$xid limit 1";
                                    $checkresult = $conn->query($checksql);
                                    if ($checkresult->num_rows > 0) {
                                        while($row = $checkresult->fetch_assoc()) {?>




                                            <div  class="col-md-3" style="font-size:20px;margin:5px;height:20px;padding:5px 10px;color:#F36978;">
                                                <a href="dashboard.php">

                                                    <button   Style="width:100%;padding:10px 1px;font-size:10px;border:none; background:#EB4C5E; color:white;font-family: Segoe UI semibold">
                                                        Go to Dashboard</button>
                                                </a>
                                            </div>
                                        <?php }}else{?>
                                        <div  class="col-md-3" style="font-size:20px;margin:5px;height:20px;padding:5px 10px;color:#F36978;">
                                            <form action="" method="post">
                                                <input type="hidden" value="<?php echo $xid; ?>" name="rid">
                                                <input type="hidden" value="<?php echo $xid; ?>" name="subid">
                                                <input type="hidden" value="<?php echo $rcid; ?>" name="rcid">
                                                <input type="hidden" value="<?php echo $_SESSION['userid']; ?>" name="userid">

                                                <input type="hidden" value="course" name="type">

                                                <button  name="enroll" Style="width:100%;padding:10px 1px;font-size:10px;border:none; background:#EB4C5E; color:white;font-family: Segoe UI semibold">
                                                    Enroll now</button>
                                            </form>
                                        </div>

                                    <?php } ?>

                                </div>
                            <?php }  else{?>
                                <div  style="border:1px dotted #707070;height:40px;width:180px;padding:10px 10px;color:#F36978">
                                    Free Course
                                </div>
                                <div  style="height:40px;width:180px;padding:6px 10px;color:#F36978">

                                    <button  name="enroll" Style="width:100%;padding:10px 1px;font-size:10px;border:none; background:#EB4C5E; color:white;font-family: Segoe UI semibold" onclick="alert('Please Login to Enroll')">
                                        Enroll now</button>
                                </div>
                            <?php } ?>

                        <?php }}} ?>




                        <?php if($cat=='paid'){ ?>
                            <?php
                            if (isset($_SESSION['utype']) && isset($_SESSION['userid']) ) {
                                if($_SESSION['utype']=='teacher') {
                                    ?>
                            <div class="row">
                                <div  class="col-md-5" style="font-size:20px;margin:10px;border:1px dotted #707070;height:50px;padding:5px 10px;color:#F36978;">
                                    &#8377;<?php echo $amount ?>
                                </div>
                                <div class="col-md-6"  style="margin:10px;border:1px dotted #707070;height:50px;padding:1px 10px;color:#F36978;">
                                    <span style="color:#0A62A3"> Enroll for FREE </span>
                                    <br style="line-height:.8">
                                    Course starts on <?php echo $st ?>
                                </div>
                            </div>

                            <br>
                            <div class="row justify-content-md-center">

                                <?php
  $usid3=$_SESSION['userid'];
                     $checksql3= "SELECT * FROM oc where userid='$usid3' and category='course'  and courseid='$xid' and status='1'";
                     $checkresult3 = $conn->query($checksql3);
                       if ($checkresult3->num_rows < 1) {
                                $usid2=$_SESSION['userid'];
                                $checksql1= "SELECT * FROM cart where cartuser='$usid2' and category='course'  and courseid='$xid'";
                                $checkresult1 = $conn->query($checksql1);
                                if ($checkresult1->num_rows < 1) {
                                    ?>
                                <div  class="col-md-2" style="font-size:20px;margin:5px;height:20px;padding:5px 10px;color:#F36978;">
                                    <form action="" method="post">
                                        <input type="hidden" value="<?php echo $xid; ?>" name="rid">
                                        <input type="hidden" name="subname" value="<?php echo $title; ?>">
                                        <input type="hidden" name="useremail" value="<?php echo $_SESSION['useremail']; ?>">
                                        <input type="hidden" name="userid" value="<?php echo $_SESSION['userid']; ?>">
                                        <input type="hidden" name="subid" value="<?php echo $xid; ?>">
                                        <input type="hidden" name="subtype" value="course">
                                        <input type="hidden" name="rcid" value="<?php echo $rcid  ?>">
                                        <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                                        <button Style="width:100%;padding:10px 1px;font-size:10px;border:none; background:#EB4C5E; color:white;font-family: Segoe UI semibold" name="addtocart">
                                            Add to Cart</button>
                                    </form>
                                </div>

                                <?php }?>
                                <div class="col-md-2"  style="margin:5px;height:20px;padding:5px 10px;color:#F36978;">
                                    <button Style="width:100%;padding:10px 1px;font-size:10px;border:none; background:#EB4C5E; color:white;font-family: Segoe UI semibold">
                                        Buy Now</button>
                                </div>

                            </div>
                        <?php }} } else{?>

                                <div  style="border:1px dotted #707070;height:40px;width:180px;padding:6px 10px;color:#F36978">


                                    <big> &#8377; <?php
                                        echo $amount ?> </big>
                                </div>
                                <div  style="height:40px;width:180px;padding:6px 10px;color:#F36978">

                                    <button  name="Add To Cart" Style="width:100%;padding:10px 1px;font-size:10px;border:none; background:#EB4C5E; color:white;font-family: Segoe UI semibold" onclick="alert('Please Login to Enroll')">
                                        Add To Cart</button>
                                </div>

                            <?php }  }?>

                </div>
                </center>
            </div>
        </div>
    </div>
<section id="about">
    </div>

<?php }} ?>
    <br><br><br><br>





    <div class="row justify-content-md-center" style="background:white">
        <div class="col-md-10">

            <div class="row" style="background:white;font-family:Segoe UI semibold;font-size:22px;text-align:left;color:#707070;">
                About
                <br>
                <br style="line-height:.8">
                <small>
                    <?php echo $about; ?>
                </small>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-md-center" style="background:white">
        <div class="col-md-10">
            <div class="row" style="padding: 5px 30px;background:#0A62A3;font-family:Segoe UI regular;font-size:14px;text-align:left;color:#707070;height:70px">


                <center><br style="line-height:.8">
                    <p style="padding: 7px 15px;background:white;color:#0A62A3;border-radius:15px">
                        Skills You Will Gain
                    </p>
                </center>

                <ul id="searchul">



                    <li style="padding: 15px 15px;color:white;font-size:16px;">
                        <?php echo $skill1; ?>
                    </li>

                    <li style="padding: 15px 15px;color:white;font-size:16px;">
                        <?php echo $skill4; ?>
                    </li>
                    <li style="padding: 15px 15px;color:white;font-size:16px;">
                        <?php echo $skill3; ?>
                    </li>
                    <li style="padding: 15px 15px;color:white;font-size:16px;">
                        <?php echo $skill2; ?>
                    </li>


            </div>
        </div>
    </div>


    <br>
    <br>



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
                                        <form action="course2.php" method="post" >
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
        <br>

        <div class="row justify-content-md-center" >

            <div class="col-md-10 col-sm-10 col-lg-10"  style="background: #707070">
                <iframe name="iframe_a" allowfullscreen="false" style="height:400px;width:100%;"  frameBorder = "0" >

                </iframe>

            </div>

        </div>


        <br>

        <hr/ style="border-bottom:2px solid #0A62A3">
        <span style="color:#0A62A3;font-family:Segoe UI regular;"></span>
        </div>
        </div>

        <br>
        <div class="row   " style="background:white;font-family:Segoe UI regular;font-size:12px;text-align:left;color:#0A62A3;">
            <?php while($row = $rfileresult->fetch_assoc()) {
                $filename=$row['filename'];
                $titles=$row['title']
                ?>
                <div  class="col-md-2 col-lg-2 col-sm-2" style="height:190px;margin:20px;box-shadow:0px 1px 1px 1px #E1D6D6;border-bottom: 6px solid #0A62A3 ">

                    <a href="admin/uploads/Resources/<?php echo $title; ?>/video/<?php echo $filename; ?>" target="iframe_a">
                        <video style="height:150px;width:100%;" >
                            <source id="myVideo" name="myVideo" src="admin/uploads/Resources/<?php echo $title; ?>/video/<?php echo $filename; ?> ">
                        </video>
                    </a>
                    <center>
                        <?php echo $titles; ?>
                    </center>
                </div>



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
                $titles=$row['title']
                ?>
                <div  class="col-md-2 col-lg-2 col-sm-2" style="height:190px;margin:10px;box-shadow:0px 1px 1px 1px #E1D6D6;border-bottom: 6px solid #0A62A3 " data-toggle="tooltip" data-placement="bottom" title="Buy & Unlock">
                    <video style="height:150px;width:100%;"   >
                        <source id="myVideo" name="myVideo" src="admin/uploads/Resources/<?php echo $title; ?>/video/<?php echo $filename; ?> ">
                    </video>

                    <center>
                        <?php echo $titles; ?> <img src="assets/user/images/Iconfeather-lock.png" style="height:15px">
                    </center>
                </div>



            <?php } ?>

        </div>
    <?php } ?><?php } ?>





    <br>
    </div>




<?php
$rfilesqls= "SELECT * FROM resources_files where Rid='$id' and filetype='worksheet'";
$rfileresults = $conn->query($rfilesqls);
if ($rfileresults->num_rows > 0) {
    ?>

    <div class="row justify-content-md-center" style="background:white;font-family:Segoe UI regular;font-size:18px;text-align:left;color:#707070;">
    <div  class="col-md-10">


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

        <?php }} if (!isset($_SESSION['userid']) ||$cat=='paid' ){?>
        <div style="float:left">
            Worksheets
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
    <?php } ?>
    </div>
<?php } ?>




<?php
$rfilesqlx= "SELECT * FROM resources_files where Rid='$id' and filetype='activity'";
$rfileresultx = $conn->query($rfilesqlx);
if ($rfileresultx->num_rows > 0) {
    ?>

    <div class="row justify-content-md-center" style="background:white;font-family:Segoe UI regular;font-size:18px;text-align:left;color:#707070;">
    <div  class="col-md-10">


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

        <?php }} if (!isset($_SESSION['userid']) ||$cat=='paid' ){?>
        <div style="float:left">
            Games and Activity Ideas
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
    <?php } ?>
    </div>
<?php } ?>





<?php
$rfilesqlz= "SELECT * FROM resources_files where Rid='$id' and filetype='article'";
$rfileresultz = $conn->query($rfilesqlz);
if ($rfileresultz->num_rows > 0) {
    ?>

    <div class="row justify-content-md-center" style="background:white;font-family:Segoe UI regular;font-size:18px;text-align:left;color:#707070;">
    <div  class="col-md-10">


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


        <?php }} if (!isset($_SESSION['userid']) ||$cat=='paid' ){?>


        <div style="float:left">
            Articles
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
    <?php } ?>
    </div>
<?php } ?>



    <div class="row justify-content-md-center" style="background:white">
        <div class="col-md-8">
            <div class="row justify-content-md-center" style="background:white;font-family:Segoe UI regular;font-size:14px;text-align:justify">
                <center>	<br>	<br>
                    <img src="assets/user/images/newtesti.png" style="height:180px">
                    <br><br>
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                    sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
                    sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                    no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                    sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                    At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
                    sanctus est Lorem ipsum dolor sit amet.


                    <br><br>

                    <span style="Segoe UI semibold;"><b>Name of the person</b> </span>
                    <br><br>
                    <img src="assets/user/images/Gif.gif" style="height:210px;">
                    <br><br> <br><br>
                </center>
            </div>
        </div>
    </div>





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