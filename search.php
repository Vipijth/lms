<?php
include('connection.php');
include('header.php');
//$search=$_POST['search'];
$s=$_GET['search'];
$arr = explode("(", $s, 2);
$first = $arr[0];

?>

<div class="container-fluid" style="padding-top: 170px">



    <section name="courses">
        <div class="row justify-content-md-center" style="background:white" id="courses" >
            <font style="font-size: 18px; color:#0A62A3;text-align: justify;font-family: Segoe UI semibold;">

                    <br style="line-height:.8">
                <?php if($first!='') {?>
                    Search Results For <?php echo '"'.$first.'"' ?>
                <?php } ?>
            </font>


        </div>
        <br>
        <div class="row justify-content-md-center" style="background:white">
            <div class="col-md-10">
                <div class="row justify-content-md-start" style="background:white">
                    <?php
                    $coursesql= "SELECT * FROM course  where name like '$first'  order by id desc " ;;
                    $courseresult = $conn->query($coursesql);
                    if ($courseresult->num_rows > 0) {


                        while($row = $courseresult->fetch_assoc()) {
                            $image=$row['image'];
                            $title=$row['name'];
                            $cat=$row['category'];
                            $about=$row['about'];
                            $amount=$row['category'];
                            $start=$row['startdate'];
                            $rid= $row["id"];
                              $ctype= $row["type"];
                            $time_input = strtotime($start);

                            ?>
                            <div class="col-md-5 col-sm-3 col-lg-3" id="coursecol" style="margin:40px;">
                                <form action="newdes.php" method="get">
                                    <div class="row" id="coursecolin">
                                        <img src="admin/uploads/Courses/<?php echo $title; ?>/image/<?php echo $image; ?>" id="courseimg">
                                    </div>
                                    <div class="row justify-content-start" id="coursebody">
                                        <div class="col-md-9" style="text-transform: capitalize;text-align: left">
                                            <br>

                                            <?php echo strtolower($title); ?>

                                        </div>
                                        <input type="hidden"  name="csid" value="  <?php echo $rid; ?>">
                                        <div class="col-md-2" >
                                            <br style="line-height:.7">
                                      <?php if($ctype=='course'){ ?>
                                            <div id="dates">
                                                <span style="color:#EB4D5E">Starts</span><br>
                                                <span style="color:#707070;font-size:18px;"><?php echo date('d ', $time_input);  ?></span><br>
                                                <span style="color:#707070;font-size:13px;">  <?php echo date('M/Y ', $time_input);  ?></span><br>
                                            </div>
                                            <?php  } ?>
                                        </div>
                                        <table id="category" >
                                            <?php if($cat=='free'){?>
                                                <tr>

                                                    <td style="background:#5FC447"> Free </td>
                                                </tr>
                                            <?php } ?>

                                            <?php if($cat=='paid'){?>
                                                <tr>

                                                    <td style="background:#F69431"> Paid </td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                    <div id="coursecolin2">
                                        <br><br><br>
                                        <center>
                                              <?php
                                                   $ab=strip_tags($about);

                                                   echo substr("$ab",0,390).'...'    ?> <div id="coursebottom">

                                                <button id="takecourse">
                                                    View Course
                                                </button>
                                            </div>
                                        </center>
                                    </div>
                            </div>
                            </form>
                        <?php  }} ?>



                    <?php
                    $coursesql2= "SELECT distinct name FROM keyword  where keyword like '%$first%' and type='Course' order by id desc " ;;
                    $courseresult2 = $conn->query($coursesql2);
                    if ($courseresult2->num_rows > 0) {

                        while($row = $courseresult2->fetch_assoc()) {
                           $rnam= $row['name'];
                            $coursesql3= "SELECT * FROM course  where name like '$rnam'  and DATE(startdate) > CURDATE() and  DATE(enddate) > CURDATE()  order by id desc" ;;
                            $courseresult3 = $conn->query($coursesql3);
                            if ($courseresult3->num_rows > 0) {

                                while($row = $courseresult3->fetch_assoc()) {
                            $image=$row['image'];
                            $title=$row['name'];
                            $cat=$row['category'];
                            $about=$row['about'];
                            $amount=$row['category'];
                            $start=$row['startdate'];
                            $rid= $row["id"];
                            $time_input = strtotime($start);

                            ?>
                            <div class="col-md-5 col-sm-3 col-lg-3" id="coursecol" style="margin: 4%;">
                                <form action="newdes.php" method="get">
                                    <div class="row" id="coursecolin">
                                        <img src="admin/uploads/Courses/<?php echo $title; ?>/image/<?php echo $image; ?>" id="courseimg">
                                    </div>
                                    <div class="row justify-content-start" id="coursebody">
                                        <div class="col-md-9" style="text-transform: capitalize;text-align: left">
                                            <br>

                                            <?php echo strtolower($title); ?>

                                        </div>
                                        <input type="hidden"  name="csid" value="  <?php echo $rid; ?>">
                                        <div class="col-md-2" >
                                            <br style="line-height:.7">

                                            <div id="dates">
                                                <span style="color:#EB4D5E">Starts</span><br>
                                                <span style="color:#707070;font-size:18px;"><?php echo date('d ', $time_input);  ?></span><br>
                                                <span style="color:#707070;font-size:13px;">  <?php echo date('M/Y ', $time_input);  ?></span><br>
                                            </div>

                                        </div>
                                        <table id="category" >
                                            <?php if($cat=='free'){?>
                                                <tr>

                                                    <td style="background:#5FC447"> Free </td>
                                                </tr>
                                            <?php } ?>

                                            <?php if($cat=='paid'){?>
                                                <tr>

                                                    <td style="background:#F69431"> Paid </td>
                                                </tr>
                                            <?php } ?>
                                        </table>
                                    </div>
                                    <div id="coursecolin2">
                                        <br><br><br>
                                        <center>
                                           <?php
                                                   $ab=strip_tags($about);

                                                   echo substr("$ab",0,390).'...'    ?><div id="coursebottom">

                                                <button id="takecourse">
                                                    View Course
                                                </button>
                                            </div>
                                        </center>
                                    </div>
                            </div>
                            </form>
                        <?php  }}}} ?>



                </div>


            </div>
        </div>
    </section>




    <section name="Resource">
        <div class="row justify-content-md-center" style="background:white">

        </div>
        <br>
        <div class="row justify-content-md-center" style="background:white">
            <div class="col-md-10">
                <div class="row justify-content-md-start" style="background:white">

                    <?php
                    $resourcesql= "SELECT * FROM resources  where name like '$first'  order by id desc ";
                    $resourceresult = $conn->query($resourcesql);
                    if ($resourceresult->num_rows > 0) {

                        while($row = $resourceresult->fetch_assoc()) {
                            $image=$row['image'];
                            $title=$row['name'];
                            $cat=$row['category'];
                            $about=$row['about'];
                            $amount=$row['category'];
                            $rid= $row["id"];
                            ?>

                            <div class="col-md-5 col-sm-3 col-lg-3" id="coursecol" style="margin: 4%;">
                                <form action="newres.php" method="get">
                                    <div class="row" id="coursecolin">
                                        <img src="admin/uploads/Resources/<?php echo $title; ?>/image/<?php echo $image; ?>" id="courseimg">
                                    </div>
                                    <div class="row" id="coursebody">
                                        <div class="col" style="text-transform: capitalize">
                                            <br><br>
                                            <center>
                                                <?php echo strtolower($title); ?>
                                            </center>
                                        </div>
                                        <?php if($cat=='free'){?>
                                            <div id="category" style="background:#5FC447">
                                                Free
                                            </div>
                                        <?php } ?>

                                        <?php if($cat=='paid'){?>
                                            <div id="category" style="background:#F69431">
                                                Paid
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div id="coursecolin2">
                                        <br><br><br><br>
                                        <center>
                                            <?php
                                                   $ab=strip_tags($about);

                                                   echo substr("$ab",0,390).'...'    ?>
                                            <div id="coursebottom">
                                                <button id="takecourse">
                                                    Take Resource
                                                </button>
                                                <br>
                                                <input type="hidden"  name="rid" value="  <?php echo $rid; ?>">
                                                <?php

                                                $sqls = "SELECT * FROM resources_files where Rid='$rid' and filetype='video'";
                                                $results = $conn->query($sqls);

                                                if ($results->num_rows > 0) {
                                                    // output data of each row

                                                    ?>
                                                    <i class="fa fa-play" aria-hidden="true" style="color:#EB4D5E" ></i>
                                                <?php } ?>
                                                <?php

                                                $sqlss = "SELECT * FROM resources_files where Rid='$rid' and filetype!='video'";
                                                $resultss = $conn->query($sqlss);

                                                if ($resultss->num_rows > 0) {
                                                    // output data of each row

                                                    ?>

                                                    &nbsp;&nbsp;<i class="fa fa-file-text-o" aria-hidden="true" style="color:#EB4D5E" ></i>
                                                <?php } ?>
                                            </div>
                                        </center>
                                    </div>
                                </form>
                            </div>






                        <?php }} ?>




                    <?php
                    $coursesql2r= "SELECT distinct name FROM keyword  where keyword like '%$first%' and type='Resource' " ;
                    $courseresult2r = $conn->query($coursesql2r);
                    if ($courseresult2r->num_rows > 0) {

                        while($row = $courseresult2r->fetch_assoc()) {
                            $rnam= $row['name'];
                            $coursesql3r= "SELECT * FROM resources  where name like '$rnam'  order by id desc" ;
                            $courseresult3r = $conn->query($coursesql3r);
                            if ($courseresult3r->num_rows > 0) {

                                while($row = $courseresult3r->fetch_assoc()) {
                                    $image=$row['image'];
                                    $title=$row['name'];
                                    $cat=$row['category'];
                                    $about=$row['about'];
                                    $amount=$row['category'];
                                    $rid= $row["id"];
                                    ?>

                                    <div class="col-md-5 col-sm-3 col-lg-3" id="coursecol"  style="margin: 4%;">
                                        <form action="newres.php" method="get">
                                            <div class="row" id="coursecolin">
                                                <img src="admin/uploads/Resources/<?php echo $title; ?>/image/<?php echo $image; ?>" id="courseimg">
                                            </div>
                                            <div class="row" id="coursebody">
                                                <div class="col" style="text-transform: capitalize">
                                                    <br><br>
                                                    <center>
                                                        <?php echo strtolower($title); ?>
                                                    </center>
                                                </div>
                                                <?php if($cat=='free'){?>
                                                    <div id="category" style="background:#5FC447">
                                                        Free
                                                    </div>
                                                <?php } ?>

                                                <?php if($cat=='paid'){?>
                                                    <div id="category" style="background:#F69431">
                                                        Paid
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div id="coursecolin2">
                                                <br><br><br><br>
                                                <center>
                                                 <?php
                                                   $ab=strip_tags($about);

                                                   echo substr("$ab",0,390).'...'    ?>
                                                    <div id="coursebottom">
                                                        <button id="takecourse">
                                                            Take Resource
                                                        </button>
                                                        <br>
                                                        <input type="hidden"  name="rid" value="  <?php echo $rid; ?>">
                                                        <?php

                                                        $sqls3 = "SELECT * FROM resources_files where Rid='$rid' and filetype='video'";
                                                        $results = $conn->query($sqls3);

                                                        if ($results->num_rows > 0) {
                                                            // output data of each row

                                                            ?>
                                                            <i class="fa fa-play" aria-hidden="true" style="color:#EB4D5E" ></i>
                                                        <?php } ?>
                                                        <?php

                                                        $sqlss3 = "SELECT * FROM resources_files where Rid='$rid' and filetype!='video'";
                                                        $resultss3 = $conn->query($sqlss3);

                                                        if ($resultss3->num_rows > 0) {
                                                            // output data of each row

                                                            ?>

                                                            &nbsp;&nbsp;<i class="fa fa-file-text-o" aria-hidden="true" style="color:#EB4D5E" ></i>
                                                        <?php } ?>
                                                    </div>
                                                </center>
                                            </div>
                                        </form>
                                    </div>



                                <?php  }}}} ?>





                </div>


            </div>
        </div>
    </section>



    <br><br>
    <section name="Blogs">
        <div class="row justify-content-md-center" >


        </div>
        <div class="row justify-content-md-center" style="background:#fff">
            <div class="col-md-10">
                <br>	 <br>
                <div class="row " style="background:#fff">
                    <?php
                    $blogsql= "SELECT * FROM blogs  where title like '%$first%' order by id desc ";
                    $blogresult = $conn->query($blogsql);
                    if ($blogresult->num_rows > 0) {

                        while($row = $blogresult->fetch_assoc()) {
                            $image=$row['cover'];
                            $title=$row['title'];

                            $about=$row['about1'];
                            $view=$row['view'];
                            $blid=$row['id'];


                            ?>

                                <div class="col-md-6 col-sm-4 col-lg-4" id="group" style="margin: 5px">
                                <div class="col-md-12"  id="group1">
                                    <img src="admin/uploads/Blogs/<?php echo $title; ?>/images/<?php echo $image?>" style="width:100%;position:absolute;left:-2px;height:220px;">
                                    <div class="col" id="ribbon" style="width:60px">
                                        <img src="assets/user/images/eye.png" style="width:50%;height: 50%;position: absolute;top:6px;left:2px" >
                                        <p style="position: absolute;right:10%;font-size: 10px;top:27%">
                                            <?php echo $view ?>
                                        </p>
                                        
                                    </div>
                                </div>
                                <div class="col-md-10" id="group2" style="padding-top: 10px">
                                    <center>
                                       <font color="white" style="font-size: 18px; font-family: segoe ui semibold"><?php echo $title ?></font><br style="line-height:.6">
                                 <p color="white" style="line-height:1.2;font-family: segoe ui regular;font-size: 13px;color:white"> 
                                 
                                 
                                 
                          <?php
                                   $ab=strip_tags($about);

                                   echo substr("$ab",0,100).'...'    ?>
                                 
                                 
                                 </p> <br><br>
                                        <br style="line-height:1">    <br style="line-height:1">
                                        <form action="blog7.php" method="post">
                                            <input type="hidden" value="<?php echo $id ?>" name="blogId">
                                            <input type="hidden" value="<?php echo $view ?>" name="view">
                                            <button style="border:none;color:#85E961;background:none;bottom:10%;left:38%;position:absolute" > <small>Read More</small> </button>

                                        </form>


                                    </center>
                                    <br>
                                </div>
                            </div>


                        <?php }}?>

                </div>
            </div>
        </div>
    </section>

</div>
<br><br><br><br><br><br>



<?php include ('footer.php');?>
