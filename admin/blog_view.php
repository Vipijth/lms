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
            <?php   $sql = "SELECT * FROM blogs where id='$id'";
         
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
         $name=$row["title"];
         
         $about2=$row["about2"];
         
         $about1=$row["about1"];
         $authorImage=$row["authorimage"];
         $cover=$row["cover"];
         $image1=$row["image1"];
         $image2=$row["image2"];
         $author=$row["author"];
         $authordet=$row["authordetails"];
         ?>
            <div class="main-content">
               <section class="section">
                  <div class="section-body">
                     <div class="row mt-sm-4">
                        <div class="col-12 col-md-12 col-lg-4">
                           <div class="card author-box">
                              <div class="card-body">
                                 <div class="author-box-center">
                                    <img alt="image" src="uploads/Blogs/<?php echo $name;?>/images/<?php echo $authorImage; ?>" class="author-box-picture">
                                    <div class="clearfix"></div>
                                    <div class="author-box-name">
                                       <a href="#">      <?php echo $name; ?></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="card">
                              <div class="card-header">
                                 <h4>Author Details</h4>
                              </div>
                              <div class="card-body">
                                 <div class="py-4">
                                
									<p class="clearfix">
                                       <span class="float-left">
										   Author Name
                                       </span>
                                       <span class="float-right text-muted">
                                       <?php echo $author; ?>
                                       </span>
                                    </p> 
                                 </div>
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
									   <div class="section-title">Blog Info</div>	
                                       <p class="m-t-30">
                                       <?php echo $about1; ?>
                                       </p>
                                      
                                       <p>
                                       <?php echo $about2; ?>
                                       </p>
									   <div class="section-title">About Author</div>	
                                       <p class="m-t-30">
                                       <?php echo $authordet; ?>
                                       </p>
                                       <ul id="aniimated-thumbnials" class="list-unstyled row clearfix">
                                          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
											 
												  <img class="img-responsive thumbnail" src="uploads/Blogs/<?php echo $name;?>/images/<?php echo $cover; ?>" alt="">
											 
                                    	  </div>
								
										  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">

												  <img class="img-responsive thumbnail" src="uploads/Blogs/<?php echo $name;?>/images/<?php echo $image1; ?>" alt="">
											
                                    	  </div>
										  
										  <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
										
                                   <img class="img-responsive thumbnail" src="uploads/Blogs/<?php echo $name;?>/images/<?php echo $image2; ?>" alt="">
                                 
                                      
                                    	  </div> 
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <?php }} ?>
                        </div>
                     </div>
                  </div>
               </section>
            </div>

<?php 
	include ("footer_2.php");
?>