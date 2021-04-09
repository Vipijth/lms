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
        if($cat=='resources' ){
            ?>
            <div class="col-md-12"  id="coursebg" style="background-image:url('admin/uploads/slider/<?php echo $image; ?>' )">


            </div>
        <?php }}} ?>
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
         <div class="row justify-content-md-center" style="background:white">
            <div class="col-md-10">
               <div class="row justify-content-md-center" style="background:white">


                   <div class="row justify-content-md-start" style="background:white">

                       <?php
                       $resourcesql= "SELECT * FROM resources";
                       $resourceresult = $conn->query($resourcesql);
                       if ($resourceresult->num_rows > 0) {

                           while($row = $resourceresult->fetch_assoc()) {
                               $image=$row['image'];
                               $title=$row['name'];
                               $cat=$row['category'];
                               $about=$row['about'];
                               $amount=$row['amount'];
                               $rid=$row['id'];
                               ?>

                               <div class="col-md-5 col-sm-3 col-lg-3" id="coursecol">
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
                                           <br><br><br>
                                           <center>          <p class="m-t-30" style="text-align: justify !important; font-size: 12px">

                                                   <?php
                                                   $ab=strip_tags($about);

                                                   echo substr("$ab",0,390).'...'    ?>
                                               </p>

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
                                                       <i class="fa fa-play" aria-hidden="true" style="color:#0A62A3" ></i>
                                                   <?php } ?>
                                                   <?php

                                                   $sqlss = "SELECT * FROM resources_files where Rid='$rid' and filetype!='video'";
                                                   $resultss = $conn->query($sqlss);

                                                   if ($resultss->num_rows > 0) {
                                                       // output data of each row

                                                       ?>

                                                       &nbsp;&nbsp;<i class="fa fa-file" aria-hidden="true" style="color:#0A62A3" ></i>
                                                   <?php } ?>
                                               </div>
                                           </center>
                                       </div>
                                   </form>
                               </div>
                           <?php }} ?>


                       <br><br>
            </div>
         </div>
         </section>
         <br>
  
      </div>

<?php 
	include ("footer.php");
?>