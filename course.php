<?php 
	include("header.php");
include ("connection.php");
?>

	<div class="container-fluid">
         <div class="row">

              <?php
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

             
            <!--   <div id="coupon">
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
               </div>-->
            </div>
            <?php }} } ?>
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
        <br><br>  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
</head>
<body>
 
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">All</a></li>
    <li><a href="#tabs-2">Courses</a></li>
    <li><a href="#tabs-3">Modules</a></li>
  </ul>
  <div id="tabs-1">




<div class="row"> 
  <?php
				   
				   $coursesql="";
                   $coursesql= "SELECT * FROM course where type='module' order by id desc ";
				  
                   $courseresult = $conn->query($coursesql);
                   if ($courseresult->num_rows > 0) {
$count=0;
                       while($row = $courseresult->fetch_assoc()) {
                           $image=$row['image'];
                           $title=$row['name'];
                           $cat=$row['category'];
                           $about=$row['about'];
                           $amount=$row['category'];
                           $start=$row['startdate'];
                           $time_input = strtotime($start);
                           $rid= $row["id"];
                           $count=$count+1;
                           $csid=$row['type'];
                           ?>

                           <div class="col-md-5 col-sm-3 col-lg-3" id="coursecol" style="margin: 4%;">
                               <form action="newdes.php" method="GET">
                                   <div class="row" id="coursecolin">
                                       <img src="admin/uploads/Courses/<?php echo $title; ?>/image/<?php echo $image; ?>" id="courseimg">
                                   </div>
                                   <div class="row justify-content-start" id="coursebody">
                                       <div class="col-md-9" style="text-transform: capitalize;text-align: left">
                                           <br>

                                           <?php echo strtolower($title); ?>

                                       </div>
                                       <input type="hidden"  name="csid" value="  <?php echo $rid; ?>">
									   
									    <?php if($csid=='course'){ ?>
                                       <div class="col-md-2" >
                                           <br style="line-height:.7">

                                           <div id="dates">
                                               <span style="color:#EB4D5E">Starts</span><br>
                                               <span style="color:#707070;font-size:18px;"><?php echo date('d ', $time_input);  ?></span><br>
                                               <span style="color:#707070;font-size:13px;">  <?php echo date('M/Y ', $time_input);  ?></span><br>
                                           </div>

                                       </div> <?php } ?>
                                       <?php if($count<5) { ?>
                                       <table id="category" >
                                           <?php if($cat=='free'){?>
                                               <tr>
                                                   <td style="background:#16B4F2">New</td>
                                                   <td style="background:#5FC447"> Free </td>
                                               </tr>
                                           <?php } ?>

                                           <?php if($cat=='paid'){?>
                                               <tr>
                                                   <td style="background:#16B4F2">New</td>
                                                   <td style="background:#F69431"> Paid </td>
                                               </tr>
                                           <?php } ?>
                                       </table>
                                       <?php }else {  ?>

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
                                       <?php } ?>
                                   </div>
                                   <div id="coursecolin2">
                                       <br><br><br>
                                       <center>
                                           <p class="m-t-30" style="text-align: justify !important; font-size: 12px">

                                               <?php
                                               $ab=strip_tags($about);

                                               echo substr("$ab",0,380).'...'    ?>
                                           </p>

                                           <div id="coursebottom">
                                               <?php if($csid=='course'){ ?>
                                                   <button id="takecourse">
                                                       View Course
                                                   </button>
                                               <?php } else{ ?>
                                                   <button id="takecourse">
                                                       View Module
                                                   </button>
                                               <?php } ?>

                                           </div>
                                       </center>
                                   </div>
                           </div>
                           </form>
                       <?php  }} ?>
                 


  <?php
				   
				
                   


                   
                   $coursesql= "SELECT * FROM course where DATE(startdate) > CURDATE() and  DATE(enddate) > CURDATE() and type='course' order by id desc ";
				  
                   $courseresult = $conn->query($coursesql);
                   if ($courseresult->num_rows > 0) {
$count=0;
                       while($row = $courseresult->fetch_assoc()) {
                           $image=$row['image'];
                           $title=$row['name'];
                           $cat=$row['category'];
                           $about=$row['about'];
                           $amount=$row['category'];
                           $start=$row['startdate'];
                           $time_input = strtotime($start);
                           $rid= $row["id"];
                           $count=$count+1;
                           $csid=$row['type'];
                           ?>

                           <div class="col-md-5 col-sm-3 col-lg-3" id="coursecol" style="margin: 4%;">
                               <form action="newdes.php" method="GET">
                                   <div class="row" id="coursecolin">
                                       <img src="admin/uploads/Courses/<?php echo $title; ?>/image/<?php echo $image; ?>" id="courseimg">
                                   </div>
                                   <div class="row justify-content-start" id="coursebody">
                                       <div class="col-md-9" style="text-transform: capitalize;text-align: left">
                                           <br>

                                           <?php echo strtolower($title); ?>

                                       </div>
                                       <input type="hidden"  name="csid" value="  <?php echo $rid; ?>">
									   
									    <?php if($csid=='course'){ ?>
                                       <div class="col-md-2" >
                                           <br style="line-height:.7">

                                           <div id="dates">
                                               <span style="color:#EB4D5E">Starts</span><br>
                                               <span style="color:#707070;font-size:18px;"><?php echo date('d ', $time_input);  ?></span><br>
                                               <span style="color:#707070;font-size:13px;">  <?php echo date('M/Y ', $time_input);  ?></span><br>
                                           </div>

                                       </div> <?php } ?>
                                       <?php if($count<5) { ?>
                                       <table id="category" >
                                           <?php if($cat=='free'){?>
                                               <tr>
                                                   <td style="background:#16B4F2">New</td>
                                                   <td style="background:#5FC447"> Free </td>
                                               </tr>
                                           <?php } ?>

                                           <?php if($cat=='paid'){?>
                                               <tr>
                                                   <td style="background:#16B4F2">New</td>
                                                   <td style="background:#F69431"> Paid </td>
                                               </tr>
                                           <?php } ?>
                                       </table>
                                       <?php }else {  ?>

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
                                       <?php } ?>
                                   </div>
                                   <div id="coursecolin2">
                                       <br><br><br>
                                       <center>
                                           <p class="m-t-30" style="text-align: justify !important; font-size: 12px">

                                               <?php
                                               $ab=strip_tags($about);

                                               echo substr("$ab",0,380).'...'    ?>
                                           </p>

                                           <div id="coursebottom">
                                               <?php if($csid=='course'){ ?>
                                                   <button id="takecourse">
                                                       View Course
                                                   </button>
                                               <?php } else{ ?>
                                                   <button id="takecourse">
                                                       View Module
                                                   </button>
                                               <?php } ?>

                                           </div>
                                       </center>
                                   </div>
                           </div>
                           </form>
                       <?php  }} ?>
                       </div>
  </div>
  <div id="tabs-2">
  <div class="row"> 
  <?php
				   
				   $coursesql="";
                   $coursesql= "SELECT * FROM course where DATE(startdate) > CURDATE() and  DATE(enddate) > CURDATE()  and type='course' order by id desc ";
				  
                   $courseresult = $conn->query($coursesql);
                   if ($courseresult->num_rows > 0) {
$count=0;
                       while($row = $courseresult->fetch_assoc()) {
                           $image=$row['image'];
                           $title=$row['name'];
                           $cat=$row['category'];
                           $about=$row['about'];
                           $amount=$row['category'];
                           $start=$row['startdate'];
                           $time_input = strtotime($start);
                           $rid= $row["id"];
                           $count=$count+1;
                           $csid=$row['type'];
                           ?>

                           <div class="col-md-5 col-sm-3 col-lg-3" id="coursecol" style="margin: 4%;">
                               <form action="newdes.php" method="GET">
                                   <div class="row" id="coursecolin">
                                       <img src="admin/uploads/Courses/<?php echo $title; ?>/image/<?php echo $image; ?>" id="courseimg">
                                   </div>
                                   <div class="row justify-content-start" id="coursebody">
                                       <div class="col-md-9" style="text-transform: capitalize;text-align: left">
                                           <br>

                                           <?php echo strtolower($title); ?>

                                       </div>
                                       <input type="hidden"  name="csid" value="  <?php echo $rid; ?>">
									   
									    <?php if($csid=='course'){ ?>
                                       <div class="col-md-2" >
                                           <br style="line-height:.7">

                                           <div id="dates">
                                               <span style="color:#EB4D5E">Starts</span><br>
                                               <span style="color:#707070;font-size:18px;"><?php echo date('d ', $time_input);  ?></span><br>
                                               <span style="color:#707070;font-size:13px;">  <?php echo date('M/Y ', $time_input);  ?></span><br>
                                           </div>

                                       </div> <?php } ?>
                                       <?php if($count<5) { ?>
                                       <table id="category" >
                                           <?php if($cat=='free'){?>
                                               <tr>
                                                   <td style="background:#16B4F2">New</td>
                                                   <td style="background:#5FC447"> Free </td>
                                               </tr>
                                           <?php } ?>

                                           <?php if($cat=='paid'){?>
                                               <tr>
                                                   <td style="background:#16B4F2">New</td>
                                                   <td style="background:#F69431"> Paid </td>
                                               </tr>
                                           <?php } ?>
                                       </table>
                                       <?php }else {  ?>

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
                                       <?php } ?>
                                   </div>
                                   <div id="coursecolin2">
                                       <br><br><br>
                                       <center>
                                           <p class="m-t-30" style="text-align: justify !important; font-size: 12px">

                                               <?php
                                               $ab=strip_tags($about);

                                               echo substr("$ab",0,380).'...'    ?>
                                           </p>

                                           <div id="coursebottom">
                                               <?php if($csid=='course'){ ?>
                                                   <button id="takecourse">
                                                       View Course
                                                   </button>
                                               <?php } else{ ?>
                                                   <button id="takecourse">
                                                       View Module
                                                   </button>
                                               <?php } ?>

                                           </div>
                                       </center>
                                   </div>
                           </div>
                           </form>
                       <?php  }} ?>
                       </div>
  
  
  </div>
  <div id="tabs-3">
  <div class="row"> 
  <?php
				   
				   $coursesql="";
                   $coursesql= "SELECT * FROM course where type='module' order by id desc ";
				  
                   $courseresult = $conn->query($coursesql);
                   if ($courseresult->num_rows > 0) {
$count=0;
                       while($row = $courseresult->fetch_assoc()) {
                           $image=$row['image'];
                           $title=$row['name'];
                           $cat=$row['category'];
                           $about=$row['about'];
                           $amount=$row['category'];
                           $start=$row['startdate'];
                           $time_input = strtotime($start);
                           $rid= $row["id"];
                           $count=$count+1;
                           $csid=$row['type'];
                           ?>

                           <div class="col-md-5 col-sm-3 col-lg-3" id="coursecol" style="margin: 4%;">
                               <form action="newdes.php" method="GET">
                                   <div class="row" id="coursecolin">
                                       <img src="admin/uploads/Courses/<?php echo $title; ?>/image/<?php echo $image; ?>" id="courseimg">
                                   </div>
                                   <div class="row justify-content-start" id="coursebody">
                                       <div class="col-md-9" style="text-transform: capitalize;text-align: left">
                                           <br>

                                           <?php echo strtolower($title); ?>

                                       </div>
                                       <input type="hidden"  name="csid" value="  <?php echo $rid; ?>">
									   
									    <?php if($csid=='course'){ ?>
                                       <div class="col-md-2" >
                                           <br style="line-height:.7">

                                           <div id="dates">
                                               <span style="color:#EB4D5E">Starts</span><br>
                                               <span style="color:#707070;font-size:18px;"><?php echo date('d ', $time_input);  ?></span><br>
                                               <span style="color:#707070;font-size:13px;">  <?php echo date('M/Y ', $time_input);  ?></span><br>
                                           </div>

                                       </div> <?php } ?>
                                       <?php if($count<5) { ?>
                                       <table id="category" >
                                           <?php if($cat=='free'){?>
                                               <tr>
                                                   <td style="background:#16B4F2">New</td>
                                                   <td style="background:#5FC447"> Free </td>
                                               </tr>
                                           <?php } ?>

                                           <?php if($cat=='paid'){?>
                                               <tr>
                                                   <td style="background:#16B4F2">New</td>
                                                   <td style="background:#F69431"> Paid </td>
                                               </tr>
                                           <?php } ?>
                                       </table>
                                       <?php }else {  ?>

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
                                       <?php } ?>
                                   </div>
                                   <div id="coursecolin2">
                                       <br><br><br>
                                       <center>
                                           <p class="m-t-30" style="text-align: justify !important; font-size: 12px">

                                               <?php
                                               $ab=strip_tags($about);

                                               echo substr("$ab",0,380).'...'    ?>
                                           </p>

                                           <div id="coursebottom">
                                               <?php if($csid=='course'){ ?>
                                                   <button id="takecourse">
                                                       View Course
                                                   </button>
                                               <?php } else{ ?>
                                                   <button id="takecourse">
                                                       View Module
                                                   </button>
                                               <?php } ?>

                                           </div>
                                       </center>
                                   </div>
                           </div>
                           </form>
                       <?php  }} ?>
                       </div>
  
  </div>
</div>
 
         <br>
     <!--    <div class="row justify-content-md-center" style="background:white">

            <div class="col-md-8">
               <div class="row justify-content-md-center" style="background:white;font-family:Segoe UI regular;font-size:14px;text-align:justify">
                  <center><br><br><br><br>
                     <img src="assets/user/images/newtesti.png" style="height:180px" alt="">
                     <br><br>
                     Lorem ipsum dolor sit amet, consetetur sadipscing elitr, 
                     sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
                     sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                     no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                     sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                     At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata 
                     sanctus est Lorem ipsum dolor sit amet.
                     <br><br>
                     <span style="Segoe UI semibold"><b>Name of the person</b> </span>
                     <br><br>
                     <img src="assets/user/images/Gif.gif" style="height:210px" alt="">
                     <br><br> <br><br>
                  </center>
               </div>
            </div>
         </div>-->
      </div>

<?php 
	include ("footer.php");
?>