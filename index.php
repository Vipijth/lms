<?php 
	include("header.php");

    include ("connection.php");
?>
<style>
    
    
    body{overflow-x:hidden;
        height:auto !important;
       
    };
</style>

<div class=bg>
<img src="assets/user/images/slider/close-up-woman-class.jpg" class="img">

<img src="assets/user/images/slider/caucasian-boy-studying-home-by-video-conference-because-covid19-homeschooling.jpg " class="img">

<img src="assets/user/images/slider/close-up-woman-class.jpg" class="img">


<div class="row justify-content-center sldinfo"  >
<div class="col-md-3 sliderinfo">

   <div class="sliderinfolink " >
    <center> 
       <a href="#">Online Tution </a>
    </center>
       </div>
</div>


<div class="col-md-3 sliderinfo">


<div class="sliderinfolink">
<center> 
    <a href="#">Learning Solutions </a>
</center> 
    </div>
</div>


<div class="col-md-3 sliderinfo">

<div class="sliderinfolink">
<center> 
    <a href="#">Digital Curriculum </a>
</center> 
    </div>
</div>
</div>

</div>



      <div class="container-fluid">
         <div class="row justify-content-md-center" style="background-color:#EEEAEA;height:auto">
            <div class="col-md-10">
               <font style="font-size: 22px; color:#707070;text-align: justify;font-family: Segoe UI semibold;">
                  <center>
                     <br>
                     <b>  ABOUT LMS<br><small><i> </i>
                   
                     <br style="line-height:.8">
                   Education for all - is our Motto
                     <br><br style="line-height:.8">
               </font>
               <p style="font-size: 18px; color:#707070;font-family: Segoe UI semibold;" class="mainp">
          
            </center>
               <br style="line-height:1">
               </p>

            </div>
         </div>
         <section name="How It Work">
            <!--<div class="row justify-content-md-center" style="background:white">
               <font style="font-size: 22px; color:#707070;text-align: justify;font-family: Segoe UI semibold;">
                  <center>
                     <br style="line-height:.8">
                     HOW IT WORKS
               </font>
               <br>
               <img src="assets/user/images/divider_2.png" class="img-fluid" alt=""  />
               </center>
               <br>
            </div>-->
            <br>
      <div class="row justify-content-md-center hwrk "> 

      <div class="col-md-12 howworksrow"> 
            <div class="row justify-content-md-center howworksrow ">
            <div class="col-md-4 howworkscol" style="background-image: url('assets/user/images/slider/bg1.png');">
               <div class="howworkscolin">
              
               <big>      <big>Online Tution</big> </big>  
               <br>  <br style="line-height: .7;">
             
                We provide focussed, flexible and quality solutions for learners, teachers and schools in digital and print forma
            
            


          </div>
            </div>
            <div class="col-md-4 howworkscol" style="background-image: url('assets/user/images/slider/school-1782427_1920.jpg');">
           
            <div class="howworkscolin">
              
              <big>      <big>Learning Solutions</big> </big>  
              <br>  <br style="line-height: .7;">
            
               We provide focussed, flexible and quality solutions for learners, teachers and schools in digital and print forma
    
            </div>
        
        </div>
            <div class="col-md-4 howworkscol" style="background-image: url('assets/user/images/slider/bg1.png');">
        
            <div class="howworkscolin">
              
              <big>      <big>Digital Curriculum</big> </big>  
              <br>  <br style="line-height: .7;">
            
               We provide focussed, flexible and quality solutions for learners, teachers and schools in digital and print forma
    
            </div>
            </div>
         </div>

    </div>
	</div>


         </section>
         <section name="Resource">
            <div class="row justify-content-md-center" style="background:white">
                <font style="font-size: 22px; color:#707070;text-align: justify;font-family: Segoe UI semibold;">
                    <center>
                        <br style="line-height:.8">   <br>
                        RESOURCES
                </font>
                <br>
          
                </center>
               <br>
            </div>
            <br>
            <div class="row justify-content-md-center" style="background:white">
               <div class="col-md-10">
                  <div class="row justify-content-md-start" style="background:white">

            <?php
                $resourcesql= "SELECT * FROM resources order by id desc limit 3";
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
                           <br>
                           <center>
                               <br><br>
                               <p class="m-t-30" style="text-align: justify !important; font-size: 12px">

                                   <?php
                                   $ab=strip_tags($about);

                                   echo substr("$ab",0,330).'...'    ?>

                               </p>

                               <div id="coursebottom">
                                 <button id="takecourse">
                                View Resource
                                 </button>
                                 <br>
<input type="hidden"  name="rid" value="  <?php echo $rid; ?>">
                                  <?php

                                  $sqls = "SELECT * FROM resources_files where Rid='$rid' and filetype='video'";
                                  $results = $conn->query($sqls);

                                  if ($results->num_rows > 0) {
                                      // output data of each row

                                      ?>
                                      <i class="fa fa-play" aria-hidden="true" style="color:#FDA852" ></i>
                                  <?php } ?>
                                  <?php

                                  $sqlss = "SELECT * FROM resources_files where Rid='$rid' and filetype!='video'";
                                  $resultss = $conn->query($sqlss);

                                  if ($resultss->num_rows > 0) {
                                      // output data of each row

                                      ?>

                                      &nbsp;&nbsp;<i class="fa fa-file" aria-hidden="true" style="color:#FDA852" ></i>
                                  <?php } ?>
                              </div>
                           </center>
                        </div>
                         </form>
                     </div>






<?php }} ?>


                  </div>
                  <br><br>
                  <center>
                      <a href="resource.php">
                      <button style="border: none;width:260px;height:50px; color:white; font-family:segoe ui semibold; background:#FDA852; font-size:15px; padding:10px 10px">
                          <li class="fa fa-search"></li>
                          Explore Now</button>
                      </a>
                  </center>
               </div>
            </div>
         </section>
         <br><br>
         <section name="courses">
            <div class="row justify-content-md-center" style="background:white">
                <font style="font-size: 22px; color:#707070;text-align: justify;font-family: Segoe UI semibold;">
                    <center>
                        <br style="line-height:.8">
                       COURSES
                </font>
                <br>
      
                </center>
               <br>
            </div>
            <br>
            <div class="row justify-content-md-center" style="background:white">
               <div class="col-md-10">
                  <div class="row justify-content-md-start" style="background:white">
                      
                      
                 
            <?php
                $resourcesql= "SELECT * FROM course where type='module' order by id desc limit 3";
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
                         <form action="newdes.php" method="get">
                        <div class="row" id="coursecolin">
                                     <img src="admin/uploads/Courses/<?php echo $title; ?>/image/<?php echo $image; ?>" id="courseimg">
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
                           <br>
                           <center>
                               <br><br>
                               <p class="m-t-30" style="text-align: justify !important; font-size: 12px">

                                   <?php
                                   $ab=strip_tags($about);

                                   echo substr("$ab",0,420).'...'    ?>

                               </p>
  <input type="hidden"  name="csid" value="  <?php echo $rid; ?>">
                               <div id="coursebottom">
                                 <button id="takecourse">
                                View Course
                                 </button>
                                 <br>
                              
                              </div>
                           </center>
                        </div>
                         </form>
                     </div>






<?php }} ?>     
                      
                      
                      
                      
                      <?php
$coursesql= "SELECT * FROM course  where DATE(startdate) > CURDATE() and  DATE(enddate) > CURDATE() and type='course' order by id desc limit 3" ;;
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
        $time_input = strtotime($start);
$csid=$row['type'];
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
                                    <span style="color:#FDA852">Starts</span><br>
                                    <span style="color:#707070;font-size:18px;"><?php echo date('d ', $time_input);  ?></span><br>
                                    <span style="color:#707070;font-size:13px;">  <?php echo date('M/Y ', $time_input);  ?></span><br>
                                 </div>

                           </div>
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
                  <br><br>
                  <center>
                     <a href="course.php">



                      <button style="border: none;width:260px;height:50px; color:white; font-family:segoe ui semibold; background:#FDA852; font-size:15px; padding:10px 10px">
        <li class="fa fa-search"></li>
                          Explore Now</button>
                     </a>
                  </center>
               </div>
            </div>
         </section>
         <br><br>
         <!--<section name="plans">
            <div class="row justify-content-md-center" style="background:white">
                <font style="font-size: 22px; color:#707070;text-align: justify;font-family: Segoe UI semibold;">
                    <center>
                        <br style="line-height:.8">
                        CHOOSE YOUR LEARNING JOURNEY
                </font>
                <br>
                <img src="assets/user/images/divider.png" class="img-fluid" alt=""  />
                </center>
               <br>
            </div>
            <br>
            <div class="row justify-content-md-center" >
               <div class="col-md-7" style="width: 100%;border-radius: 50px;box-shadow: 1px 1px 1px 1px #afafaf; height:70px;background:#707070;">
                  <center>

                     <p id="blackp">
                        <i>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. </i>
                     </p>
                  </center>
               </div>
            </div>
            <br><br>
           <div class="row justify-content-md-center"  >
               <div class="col-md-10">
                  <div class="row " >


                          <table class="price-table" style="  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);" >
                              <tbody>
                              <tr>
                                  <td class="price-blank"></td>
                                  <td class="price-blank"></td>
                                <td class="price-table-popular">Most popular</td> 
                                  <td class="price-blank"></td>
                              </tr>
                              <tr class="price-table-head">
                                  <td style="text-align: left"> The Platter</td>
                                  <td>
                                      Free
                                      <br><small style="font-size: 12px; font-weight: 400;">Starter plan</small> 
                                  </td>
                                  <td>
                                      Module
                                     <br><small style="font-size: 12px; font-weight: 400;">Longer data retention</small> 
                                  </td>
                                  <td class="green-width">
                                      Course
                                   <br><small style="font-size: 12px; font-weight: 400;">Our complete solution</small> 
                                  </td>
                              </tr>
                              <tr>
                                  <td></td>
                                  <td class="price">
                                      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                           viewBox="0 0 60 75" style="enable-background:new 0 0 60 75;" xml:space="preserve" height="80px" width="80px">
							<path d="M3.9,23.2v9.7C3.9,33.5,4.4,34,5,34h2.8v32.8c0,0.6,0.5,1.1,1.1,1.1h16c0,0,0,0,0,0h10.1c0,0,0,0,0,0h16
							c0.6,0,1.1-0.5,1.1-1.1V34H55c0.6,0,1.1-0.5,1.1-1.1v-9.7c0-0.6-0.5-1.1-1.1-1.1H41.9c2.1-1,3.6-2.4,4.1-4c0.7-2-0.2-4.2-2.4-5.8
							c-1.2-0.9-2.5-1.2-3.9-0.9c-4,0.9-7.9,6.6-9.7,9.6c-1.8-3-5.6-8.7-9.7-9.6c-1.4-0.3-2.8,0-3.9,0.9c-2.2,1.7-3.1,3.8-2.4,5.8
							c0.5,1.6,2,3,4.1,4H5C4.4,22,3.9,22.5,3.9,23.2z M10.1,34h13.7v31.6H10.1V34z M26.1,65.6V32.8c0,0,0,0,0,0s0,0,0,0v-8.5h7.8v41.3
							H26.1z M49.9,65.6H36.2V34h13.7V65.6z M53.9,31.7h-2.8H36.2v-7.4h17.7V31.7z M40.2,13.5c0.2,0,0.4-0.1,0.6-0.1c0.5,0,1,0.2,1.5,0.5
							c1,0.7,2.1,1.9,1.6,3.3c-0.7,2.1-4.7,4.4-11.8,4.7C33.8,18.9,37.2,14.2,40.2,13.5z M16.2,17.3c-0.5-1.4,0.6-2.6,1.6-3.3
							c0.5-0.4,0.9-0.5,1.5-0.5c0.2,0,0.4,0,0.6,0.1c2.9,0.6,6.3,5.4,8.2,8.5C20.9,21.6,16.9,19.4,16.2,17.3z M6.2,24.3h17.7v7.4H8.9H6.2
							V24.3z"/>
						  </svg>
                                      <br>Free
                                      <br>
                                      <a href="#">Get started</a>
                                  </td>
                                  <td class="price">
                                      <svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                           viewBox="0 0 64 80" style="enable-background:new 0 0 64 80;" xml:space="preserve" height="80px" width="80px">
								<g>
                                    <path d="M55,36h-7v-8c0-2.2-1.8-4-4-4s-4,1.8-4,4v11.7l-1.2-1.4c-1.3-1.8-3.8-2.1-5.6-0.8s-2.1,3.8-0.8,5.6
										c0.1,0.1,0.2,0.2,0.2,0.3l7.5,9l0,0c0.4,1.4,1.4,2.5,2.8,3.1V61c0,0.6,0.4,1,1,1h14c0.6,0,1-0.4,1-1v-5.4c1.8-0.8,3-2.6,3-4.6v-8
										C62,39.1,58.9,36,55,36z M33.8,40.7c0-0.5,0.3-1,0.7-1.4c0.9-0.7,2.1-0.6,2.8,0.2l2.7,3.2V49l-5.8-6.9
										C33.9,41.8,33.7,41.3,33.8,40.7z M57,60H45v-4h12V60z M60,51c0,1.7-1.3,3-3,3H45c-1.7,0-3-1.3-3-3V28c0-1.1,0.9-2,2-2s2,0.9,2,2v13
										h2v-3h3v3h2v-3h2c0.3,0,0.7,0,1,0.1V42h2v-3c1.3,0.9,2,2.4,2,4V51z"/>
                                    <path d="M37.4,23.9l5-2c0.5-0.2,0.8-0.8,0.6-1.3c-0.1-0.3-0.3-0.5-0.6-0.6l-5-2C37.3,18,37.1,18,37,18H5c-1.7,0-3,1.3-3,3
										s1.3,3,3,3h32C37.1,24,37.3,24,37.4,23.9z M35,22H8v-2h27V22z M39.3,21L37,21.9v-1.8L39.3,21z M4,21c0-0.6,0.4-1,1-1h1v2H5
										C4.4,22,4,21.6,4,21z"/>
                                    <path d="M12,55V26h-2v29c0,1.7,1.3,3,3,3l0,0h28v-2H13C12.4,56,12,55.6,12,55z"/>
                                    <path d="M12,5c0-0.6,0.4-1,1-1h28v7c0,1.7,1.3,3,3,3h6v20h2V13c0-0.2-0.1-0.5-0.3-0.7l-9-10C42.6,2.1,42.3,2,42,2H13
										c-1.7,0-3,1.3-3,3v11h2V5z M43,11V5.6l5.7,6.4H44C43.4,12,43,11.6,43,11z"/>
                                    <rect x="16" y="8" width="2" height="2"/>
                                    <rect x="20" y="8" width="8" height="2"/>
                                    <rect x="16" y="12" width="12" height="2"/>
                                    <rect x="16" y="27" width="20" height="2"/>
                                    <rect x="16" y="33" width="20" height="2"/>
                                    <rect x="16" y="39" width="14" height="2"/>
                                    <rect x="16" y="45" width="8" height="2"/>
                                </g>
						  </svg>
                                   <br>&euro;9/mo
                                      <br>
                                      <a href="#">Get started</a>
                                  </td>
                                  <td class="price">
                                      <svg version="1.1" id="Layer_3" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:svg="http://www.w3.org/2000/svg"
                                           xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 125"
                                           style="enable-background:new 0 0 100 125;" xml:space="preserve" height="80px" width="80px">
							<g transform="translate(0,-952.36218)">
                                <path d="M50,964.9c-18.2,0-33,14.8-33,33c0,6.7,2,12.9,5.5,18.1l-17.1,24.7c-0.6,0.9-0.4,2.2,0.5,2.8c0.5,0.3,1,0.4,1.6,0.3
									l13.2-2.6l3.5,12.2c0.3,1.1,1.4,1.7,2.5,1.4c0.5-0.1,0.9-0.4,1.2-0.9l15.2-23.8c2.3,0.5,4.6,0.8,7.1,0.8c2.4,0,4.8-0.3,7.1-0.8
									l15.3,23.8c0.6,0.9,1.8,1.2,2.8,0.6c0.4-0.3,0.7-0.7,0.9-1.2l3.5-12.2l13.2,2.6c1.1,0.2,2.1-0.5,2.4-1.5c0.1-0.5,0-1.1-0.3-1.6
									l-17.1-24.7c3.4-5.2,5.5-11.4,5.5-18.1C83,979.7,68.2,964.9,50,964.9z M50,968.9c16,0,29,13,29,29c0,16-13,29-29,29s-29-13-29-29
									C21,981.9,34,968.9,50,968.9z M49.8,979c-0.7,0.1-1.3,0.5-1.6,1.1l-4.8,9.6l-10.7,1.5c-1.1,0.2-1.9,1.2-1.7,2.3
									c0.1,0.4,0.3,0.8,0.6,1.1l7.7,7.5l-1.8,10.6c-0.2,1.1,0.5,2.1,1.6,2.3c0,0,0.1,0,0.1,0c0.4,0,0.8,0,1.2-0.2l9.6-5l9.6,5
									c1,0.5,2.2,0.2,2.7-0.8c0.2-0.4,0.3-0.8,0.2-1.3l-1.8-10.6l7.8-7.5c0.8-0.8,0.8-2,0-2.8c-0.3-0.3-0.7-0.5-1.1-0.6l-10.7-1.5
									l-4.8-9.6C51.4,979.3,50.6,978.9,49.8,979z M50,985.4l3.4,6.9c0.3,0.6,0.9,1,1.5,1.1l7.7,1.1l-5.6,5.4c-0.5,0.5-0.7,1.1-0.6,1.8
									l1.3,7.6l-6.9-3.6c-0.6-0.3-1.3-0.3-1.9,0l-6.9,3.6l1.3-7.6c0.1-0.7-0.1-1.3-0.6-1.8l-5.6-5.4l7.7-1.1c0.7-0.1,1.2-0.5,1.5-1.1
									L50,985.4z M25,1019.4c3.7,4.3,8.5,7.6,13.9,9.6l-12.2,19.1l-2.8-9.7c-0.3-1-1.3-1.6-2.3-1.4l-10.1,2L25,1019.4z M75,1019.4
									l13.5,19.6l-10.1-2c-1-0.2-2.1,0.4-2.3,1.4l-2.8,9.7L61.1,1029C66.5,1027.1,71.3,1023.7,75,1019.4L75,1019.4z"/>
                            </g>
						  </svg>
                                      <br>&euro;39/mo
                                      <br>
                                      <a href="#">Get started</a>
                                  </td>
                              </tr>
                              <tr>
                                  <td style="text-align: left">
                                      Access to all free content units
                                  </td>
                                  <td><i class="fa fa-check"></i></td>
                                  <td><i class="fa fa-check"></i></td>
                                  <td><i class="fa fa-check"></i></td>
                              </tr>
                              <tr>
                                  <td style="text-align: left">
                                      Access to limited worksheets
                                  </td>
                                  <td><i class="fa fa-check"></i></td>
                                  <td><i class="fa fa-check"></i></td>
                                  <td><i class="fa fa-check"></i></td>
                              </tr>
                              <tr>
                                  <td style="text-align: left">
                                      Access to limited printable games and flash cards
                                  </td>
                                  <td><i class="fa fa-check"></i></td>
                                  <td><i class="fa fa-check"></i></td>
                                  <td><i class="fa fa-check"></i></td>
                              </tr>
                              <tr>
                                  <td style="text-align: left">
                                      Access to curated learning modules
                                  </td>
                                  <td><i class="fa fa-times"></i></td>
                                  <td><i class="fa fa-check"></i></td>
                                  <td><i class="fa fa-check"></i></td>
                              </tr>
                              <tr>
                                  <td style="text-align: left">
                                      Placement opportunities
                                  </td>
                                  <td><i class="fa fa-times"></i></td>
                                  <td><i class="fa fa-check"></i></td>
                                  <td><i class="fa fa-check"></i></td>
                              </tr>
                              <tr>
                                  <td style="text-align: left">
                                      Access to curated learning courses
                                  </td>
                                  <td><i class="fa fa-times"></i></td>
                                  <td><i class="fa fa-times"></i></td>
                                  <td><i class="fa fa-check"></i></td>
                              </tr>
                              <tr>
                                  <td style="text-align: left">
                                      Access to all printable games, flashcards and   worksheets related to the course
                                  </td>
                                  <td><i class="fa fa-times"></i></td>
                                  <td><i class="fa fa-times"></i></td>
                                  <td><i class="fa fa-check"></i></td>
                              </tr>
                              <tr>
                                  <td style="text-align: left">
                                      Access to academic reading
                                  </td>
                                  <td><i class="fa fa-times"></i></td>
                                  <td><i class="fa fa-times"></i></td>
                                  <td><i class="fa fa-check"></i></td>
                              </tr>
                              <tr>
                                  <td style="text-align: left">

                                  Reflection chats with faculty
                                  </td>
                                  <td><i class="fa fa-times"></i></td>
                                  <td><i class="fa fa-times"></i></td>
                                  <td><i class="fa fa-check"></i></td>
                              </tr>
                              <tr>
                                  <td style="text-align: left">

                                  Assignments
                                  </td>
                                  <td><i class="fa fa-times"></i></td>
                                  <td><i class="fa fa-times"></i></td>
                                  <td><i class="fa fa-check"></i></td>
                              </tr>
                              <tr>
                                  <td style="text-align: left">

                                  Certification
                                  </td>
                                  <td><i class="fa fa-times"></i></td>
                                  <td><i class="fa fa-times"></i></td>
                                  <td><i class="fa fa-check"></i></td>
                              </tr>
                              <tr>
                                  <td style="text-align: left">

                                  Opportunity to be guest blogger
                                  </td>
                                  <td><i class="fa fa-times"></i></td>
                                  <td><i class="fa fa-times"></i></td>
                                  <td><i class="fa fa-check"></i></td>
                              </tr>
                            <tr>
                                 <td></td>
                                 <td class="price">
                                    <a href="#">Get started</a>
                                 </td>
                                 <td class="price">
                                    <a href="#">Get started</a>
                                 </td>
                                 <td class="price">
                                    <a href="#">Get started</a>
                                 </td>
                              </tr>
                              </tbody>
                          </table>

           </div>
                  <br>
                  <center> 
                     <font style="font-size: 22px; color:#707070;text-align: justify;font-family: Segoe UI semibold;">
                    <i>  (Mentoring Early Childhood Educators & Teachers) </i>
                     </font>
                  </center>
               </div>
            </div>
         </section>-->
         <br><br>
         <section name="Blogs">
            <div class="row justify-content-md-center" style="background:#EEEAEA">
                <font style="font-size: 22px; color:#707070;text-align: justify;font-family: Segoe UI semibold;">
                    <center>
                        <br style="line-height:.8">
                        BLOG
                </font>
                <br>
    
                </center>
               <br>	<br>
            </div>
            <div class="row justify-content-md-center" style="background:#EEEAEA">
               <div class="col-md-10">
                  <br>	 <br>
                  <div class="row " style="background:#EEEAEA">
<?php
$blogsql= "SELECT * FROM blogs order by id desc limit 3";
$blogresult = $conn->query($blogsql);
if ($blogresult->num_rows > 0) {

    while($row = $blogresult->fetch_assoc()) {
        $image=$row['cover'];
        $title=$row['title'];

        $about=$row['about1'];
        $view=$row['view'];
        $blid=$row['id'];


        ?>

                     <div class="col-md-6 col-sm-3 col-lg-4" id="group">
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

                                   echo substr("$ab",0,110).'...'    ?>
                                 
                                 
                                 </p> <br><br>

                                 <form action="blog7.php" method="post">
                                     <input type="hidden" value="<?php echo $blid ?>" name="blogId">
                                     <input type="hidden" value="<?php echo $view ?>" name="view">
                                     <button style="border:none;color:#85E961;background:none;bottom:5%;left:38%;position:absolute" > <small>Read More</small> </button>

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
<?php 
	include ("footer.php");
?>