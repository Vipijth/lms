<?php
  session_start();
  if($_SESSION["adminemail"]==null){
  
  
     header('Location: error.php?errors=Please Log In');
  }
	include ("connection.php");
	$id = $_REQUEST['name'];
	include ("header_1.php");

?>

	<!-- Main Content -->

            <?php   $sql = "SELECT * FROM resources where id='$id'";
         
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
         $name=$row["name"];
         
         $about=$row["about"];
         
         $about=$row["about"];
         $category=$row["category"];
         $amount=$row["amount"];
         $image=$row["image"];
 
         $skill1=$row["skill1"];
         $skill2=$row["skill2"];
         $skill3=$row["skill3"];
         $skill4=$row["skill4"];
         ?>
            <div class="main-content">
               <section class="section">
                  <div class="section-body">
                     <div class="row mt-sm-4">
                        <div class="col-12 col-md-12 col-lg-4">
                           <div class="card author-box">
                              <div class="card-body">
                                 <div class="author-box-center">
                                    <img alt="image" src="uploads/Resources/<?php echo $name;?>/image/<?php echo $image;?>" class="author-box-picture">
                                    <div class="clearfix"></div>
                                    <div class="author-box-name">
                                       <a href="#">  <?php echo $name; ?></a>
                                    </div>
                                    <div class="author-box-job">  <?php echo $category; ?></div>
                                 </div>
                                 <div class="text-center">
                                    <div class="author-box-description">
                                    
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="card">
                              <div class="card-header">
                                 <h4>Resource Details</h4>
                              </div>
                              <div class="card-body">
                                 <div class="py-4">
                                  
                                    <p class="clearfix">
                                       <span class="float-left">
										   Amount
                                       </span>
                                       <span class="float-right text-muted">
                                       <?php echo $amount; ?>
                                       </span>
                                    </p>
									<p class="clearfix">
                                    
                                      
                                       <?php   
    $sqlzz = "SELECT * FROM instructor where resourceid='$id'";
         
         $resultzz = $conn->query($sqlzz);
         if ($resultzz->num_rows > 0) {
          // output data of each row
          while($row = $resultzz->fetch_assoc())
           {
              $iid= $row["instructorId"];
            $sqlzzz = "SELECT * FROM faculty where id='$iid'";
         
            $resultzzz = $conn->query($sqlzzz);
            if ($resultzzz->num_rows > 0) {
             // output data of each row
             while($row = $resultzzz->fetch_assoc())
              { 
              ?>



   <span class="float-left">
										   Instructor Name
                                       </span>
<span class="float-right text-muted">  <?php echo $row["fname"]; ?></span><br>
                                        <?php }} }}?>
                                       
                                    </p> 
                                 </div>
                              </div>
                           </div>
                           <div class="card">
                              <div class="card-header">
                                 <h4>Skills</h4>
                              </div>
                              <div class="card-body">
                                 <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                                    <li class="media">
                                       <div class="media-body">
                                          <div class="media-title">  <?php echo $skill1; ?></div>
                                       </div>
                                    </li>
                                    <li class="media">
                                       <div class="media-body">
                                          <div class="media-title">  <?php echo $skill2; ?></div>
                                       </div>
                                    </li>
                                    <li class="media">
                                       <div class="media-body">
                                          <div class="media-title">  <?php echo $skill3; ?></div>
                                       </div>
                                    </li>
                                    <li class="media">
                                       <div class="media-body">
                                          <div class="media-title">  <?php echo $skill4; ?></div>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-8">
                           <div class="card">
                              <div class="padding-20">
                                 <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                    <li class="nav-item">
                                       <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                                          aria-selected="true">About</a>
                                    </li>
                                 </ul>
                                 <div class="tab-content tab-bordered" id="myTab3Content">
                                    <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
									   <div class="section-title">About Resource</div>	
                                       <p class="m-t-30">

                                       <?php echo $about; ?>
                                       </p>
                                     
                                       <div class="section-title">Education Documents</div>
                                       <ul>
                                       <?php   $sqlz = "SELECT * FROM resources_files where Rid='$id'";
         
										 $resultz = $conn->query($sqlz);
										 if ($resultz->num_rows > 0) {
										  // output data of each row
										  while($row = $resultz->fetch_assoc()) {?>
                                          <li>  
									      <?php echo  $row["filetype"]; ?></li>
                                        <?php }} ?>
                                       </ul>

                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
            </div>
            <?php }} ?>
<?php 
	include ("footer_2.php");
?>