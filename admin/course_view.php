<?php
  session_start();
  if($_SESSION["adminemail"]==null){
  
  
     header('Location: error.php?errors=Please Log In');
  }
	include ("connection.php");
	$id = $_REQUEST['name'];
	include ("header_1.php");
   if(isset($_POST["delete"])) {
      $instid = $_POST["instid"];
      $rcid = $_POST["rcid"];
      $sql = "delete from instructor  WHERE resourceid='$rcid' and instructorId='$instid'";
      $conn->query($sql);
  }
  
  if(isset($_POST["deletekey"])) {
     $instid = $_POST["instid"];
     $rcid = $_POST["rcid"];
     $sql = "delete from keyword  WHERE id='$instid'";
     $conn->query($sql);
  }
    if(isset($_POST["deletefile"])) {
      $instid = $_POST["fileid"];
      $rcid = $_POST["rcid"];
      $sql = "delete from rc where resourceId='$instid' and courseId='$rcid' ";
      $conn->query($sql);
  }
?>

	<!-- Main Content -->
         <?php   $sqls = "SELECT * FROM course where id='$id'";
         
			$results = $conn->query($sqls);
			if ($results->num_rows > 0) {
			 // output data of each row
			 while($row = $results->fetch_assoc()) {
			$name=$row["name"];

			$about=$row["about"];

			$about=$row["about"];
			$category=$row["category"];
			$amount=$row["amount"];
         $amount2=$row["discount"];
			$image=$row["image"];
			$start=$row["startdate"];
			$end=$row["enddate"];
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
                                    <img alt="image" src="uploads/Courses/<?php echo $name;?>/image/<?php echo $image; ?>" class="author-box-picture">
                                    <div class="clearfix"></div>
                                    <div class="author-box-name">
                                       <a href="#">
                                          <?php echo $name; ?>

                                       </a>
                                    </div>
                                    <div class="author-box-job"><?php echo $category; ?></div>
                                 </div>
                                 <div class="text-center">
                                    <div class="author-box-description">
                                    
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="card">
                              <div class="card-header">
                                 <h4>Course Details</h4>
                              </div>
                              <div class="card-body">
                                 <div class="py-4">
                                    <p class="clearfix">
                                       <span class="float-left">
										   Start Date
                                       </span>
                                       <span class="float-right text-muted">
                                       <?php echo $start; ?>
                                       </span>
                                    </p>
                                    <p class="clearfix">
                                       <span class="float-left">
										   End Date
                                       </span>
                                       <span class="float-right text-muted">
                                       <?php echo $end; ?>
                                       </span>
                                    </p>
                                    <p class="clearfix">
                                       <span class="float-left">
										   Amount
                                       </span>
                                       <span class="float-right text-muted">
                                       <?php echo $amount; ?>
                                       </span>
                                    </p>

                                    <?php if($category=='paid'){ ?>
                                    <p class="clearfix">
                                       <span class="float-left">
										   Special Price
                                       </span>
                                       <span class="float-right text-muted">
                                       <?php echo $amount2; ?>
                                       </span>
                                    </p>
                                    <?php } ?>
                                    <p class="clearfix">
                                    
                                      
                                    <?php   
 $sqlzz = "SELECT * FROM instructor where resourceid='$id' and type='course'";
      
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
<form action="" method="post">

<input type="hidden" value="<?php echo $row["id"]; ?>" name="instid">
<input type="hidden" value="<?php echo $id ?>" name="rcid">
<button style="border:none;outline:none;color:blue" onclick="return confirm('Confirm Remove?')" name="delete">
Remove Instructor
</button>
</form>
<hr/>
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
                                          <div class="media-title">
                                             
                                          <?php echo $skill1; ?>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="media">
                                       <div class="media-body">
                                          <div class="media-title"> 
                                             
                                          <?php echo $skill2; ?>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="media">
                                       <div class="media-body">
                                          <div class="media-title">
                                             
                                          <?php echo $skill3; ?>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="media">
                                       <div class="media-body">
                                          <div class="media-title">
                                             
                                          <?php echo $skill4; ?>
                                          </div>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                           </div>

                                     <div class="card">
                              <div class="card-header">
                                 <h4>Keywords</h4>
                              </div>
                              <div class="card-body">
                                 <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                                  
                                 <?php   
    $sqlzz = "SELECT * FROM keyword where name='$name' and type='Course'";
         
         $resultzz = $conn->query($sqlzz);
         if ($resultzz->num_rows > 0) {
          // output data of each row
          while($row = $resultzz->fetch_assoc())
           {?>
                                    <li class="media">
                                       <div class="media-body">
                                          <div class="media-title">  <?php echo $row['keyword']; ?></div>
                                       </div>
                                    </li>
                                    <form action="" method="post">

<input type="hidden" value="<?php echo $row["id"]; ?>" name="instid">
<input type="hidden" value="<?php echo $id ?>" name="rcid">
<button style="border:none;outline:none;color:blue" onclick="return confirm('Confirm Remove?')" name="deletekey">
  Remove Keyword
</button>
  </form><hr/>
                             <?php }}  ?>     
                             
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
									   <div class="section-title">About Course</div>	
                                       <p class="m-t-30">
                                       <?php echo $about; ?>
                                       </p>
                                    
  
                                       <div class="section-title">Resources</div>
                                       <ul>
                                       <?php   $sqlz = "SELECT * FROM rc where courseId=$id";
         
										 $resultz = $conn->query($sqlz);
										 if ($resultz->num_rows > 0) {
										  // output data of each row
										  while($row = $resultz->fetch_assoc()) {
                                  
                                   $rid=$row['resourceId']; 
                               
                                   $sqlzz = "SELECT * FROM resources where id like '$rid'";
         
                                   $resultzz = $conn->query($sqlzz);
                                   if ($resultzz->num_rows > 0) {
                                    // output data of each row
                                    while($rowz = $resultzz->fetch_assoc()) {

                                       
                                   ?>
<li>
<?php echo  $rowz["name"]; ?> </li>

               

<form action="" method="post">

<input type="hidden" value="<?php echo $rowz["id"]; ?>" name="fileid">
<input type="hidden" value="<?php echo $id ?>" name="rcid">
<button style="border:none;outline:none;color:blue" onclick="return confirm('Confirm Remove File?')" name="deletefile">
Remove File
</button>
</form>
<hr/>


                         <?php  }} }} ?>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php } } ?>
               </section>
            </div>

<?php 
	include ("footer_2.php");
?>