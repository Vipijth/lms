<?php
       session_start();
	   if($_SESSION["adminemail"]==null){
	   
	   
		   header('Location: error.php?errors=Please Log In');
	   }

include '../connection.php';
include ("header_1.php");
$cid = $_REQUEST['name'];
$cname = $_REQUEST['id'];
?>

   <style>
textarea:focus{outline :none; border:none;}

</style>

   <script>
	   
	
	   function pay(){
		 if( document.getElementById("category").value=="free"){
			  document.getElementById("amount").style.display="none";
			  document.getElementById("am").value="0";
		 }
		 
		   if( document.getElementById("category").value=="paid"){
			  document.getElementById("amount").style.display="flex";
              document.getElementById("am").value="";
		 }
		 
		 
	   }
		  function keyword(){
		  document.getElementById("key").style.display="flex";
		  }
			   function fileValidation() {
 
				   var fileInput =
					   document.getElementById('image-upload');
 
				   var filePath = fileInput.value;
 
				   // Allowing file type
				   var allowedExtensions =
						   /(\.jpg|\.jpeg|\.png|\.gif)$/i;
 
				   if (!allowedExtensions.exec(filePath)) {
					   alert('Invalid file type');
					   fileInput.value = '';
					   return false;
				   }
				   else
				   {
 
					   // Image preview
					   if (fileInput.files && fileInput.files[0]) {
						   var reader = new FileReader();
						   reader.onload = function(e) {
							   document.getElementById(
								   'image-preview').style.backgroundImage  =
								   'url('+ e.target.result
								   + ') ';
						   };
 
						   reader.readAsDataURL(fileInput.files[0]);
					   }
				   }
			   }
 
 
		   </script>


      <div class="loader"></div>
      <div id="app">
         <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
          
			<?php include 'header.php'; ?>
			<?php include 'sidebar.php'; ?>
            <!-- Main Content -->
       
			<div class="main-content">
               <section class="section">
                  <div class="row ">
        
                  </div>
				  <div class="row">
					<div class="col-12">
					   <div class="card">
						  <div class="card-header">
							 <h4>Edit Courses</h4>
						  </div>

						        <form action="edit_course.php" method="post" enctype="multipart/form-data">
                          
            <?php   $sq = "SELECT * FROM course where id='$cid'";
         
         $resut = $conn->query($sq);
         if ($resut->num_rows > 0) {
          // output data of each row
          while($row = $resut->fetch_assoc()) {
              $name=$row["name"];
              $image=$row["image"];
              ?>
						  <div class="card-body">
							 <div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
								<div class="col-sm-12 col-md-4">
								<input type="text" readonly name="title" value="<?php echo $row["name"];?>" required class="form-control">
										<input type="hidden" name="xid" value="<?php echo $cid;?>">
								</div>
							 </div>

							 <?php if($row["category"]=='paid'){?>
							 <div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Free or Paid</label>
								<div class="col-sm-12 col-md-2">
                                    <select class="form-control" name="category" id="category"  onchange="return pay()">
                                   
                                    <option value="paid">Paid</option>
                                 
									   <option value="free">Free</option>
									
									</select>
								</div>
								<div class="col-sm-4 col-md-3">
                              
									<div class="input-group mb-3"  id="amount">
										<div class="input-group-prepend">
											<span class="input-group-text" >
												<i class="fas fa-rupee-sign"></i>
											</span>
										</div>
										<input type="text" name="amount"   required  value="<?php echo $row["amount"];?>" id="am" class="form-control" aria-label="Amount (to the nearest ruppee)">
                                    </div>
                                    
								</div>
                             </div>
                             <?php } ?>

                             <?php if($row["category"]=='free'){?>
							 <div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Free or Paid</label>
								<div class="col-sm-12 col-md-2">
                                    <select class="form-control" name="category" id="category"  onchange="return pay()">
                                   
									   <option value="free">Free</option>
                                    <option value="paid">Paid</option>
                                 
									
									</select>
								</div>
								<div class="col-sm-4 col-md-3">
                              
									<div class="input-group mb-3"  id="amount" style="display:none">
										<div class="input-group-prepend">
											<span class="input-group-text" >
												<i class="fas fa-rupee-sign"></i>
											</span>
										</div>
										<input type="text" name="amount"  required  value="<?php echo $row["amount"];?>" id="am" class="form-control" aria-label="Amount (to the nearest ruppee)">
                                    </div>
                                    
								</div>
                             </div>
                             <?php } ?>

							 <div class="form-group row mb-4" >
								 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Thumbnail Image</label>
								         <div class="col-sm-12 col-md-4" >

								            	 <div id="image-preview" class="image-preview"  style="background-size:cover;background-repeat:no-repeat;background-image:url('uploads/courses/<?php echo $name;?>/image/<?php echo $image;?>')"> 
									             	 <label for="image-upload"  id="image-label"></label>
									             	 <input type="file" name="image"  id="image-upload" accept="image/*"  onchange="return fileValidation()"  />
									             </div>



                                          </div>

   	 	                         			
						     </div>


							 <div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">About Resource</label>
								 <div class="col-sm-12 col-md-7">
										<div class="form-group">

										<textarea  id="about" name="about" maxlength="3000"  class="summernote"> <?php echo $row["about"];?> </textarea>
                                       
										</div>

		  
								 </div>
							 </div>


							 <div class="form-group row mb-4">
									 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Course Duration</label>
										 <div class="col-sm-12 col-md-3">
											 <input type="date" name="startdate" value="<?php echo $row["startdate"];?>" required class="form-control inputtags">
										 </div>
										 
											 <div class="col-sm-12 col-md-3">
												 <input type="date" name="enddate" value="<?php echo $row["enddate"];?>" required class="form-control inputtags">
											 </div>
											
		        	 		</div>

							 <div class="form-group row mb-4">
								 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Resources</label>
								 <div class="col-sm-4 col-md-4">
									<select class="form-control selectric" name="resource">
									<option>Select Your Resources</option>
									<?php
 											$sqlv = "SELECT * FROM rc where courseId!='$cid'";
 												$resultv = $conn->query($sqlv);
	 												if ($resultv->num_rows > 0) {
   
		  									 while($row = $resultv->fetch_assoc()) {
$rid=$row["resourceId"];
$sql = "SELECT * FROM resources where id='$rid'";


									
										  $result = $conn->query($sql);
											  if ($result->num_rows > 0) {
											
													while($row = $result->fetch_assoc()) {
									?>
																	 <option value="<?php echo $row['id']   ?>"><?php echo $row['name']   ?></option>
                                                          
									<?php }}}} ?>
									 
									</select>
								 </div>
								
							 </div>




				


			
							 <div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
								<div class="col-sm-12 col-md-7">
								   <button class="btn btn-primary">CREATE COURSE</button>
								</div>
						</form>
							 </div>
						  </div>
					   </div>
					</div>
				</div> 	<?php }} ?>
               </section>
            </div>

         </div>
      </div>
<?php
include ("footer_2.php");
?>