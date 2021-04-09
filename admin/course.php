<?php
       session_start();
	   if($_SESSION["adminemail"]==null){
	   
	   
		   header('Location: error.php?errors=Please Log In');
	   }
	include ("connection.php");
	include ("header_1.php");
	
?>
	<style>
textarea:focus{outline :none; border:none;}

</style>

<script>

$(function(){

    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    alert(maxDate);
    $('#txtDate').attr('min', maxDate);
});

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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


			   function change(){
	       var x=document.getElementById('ctype').value;

	if(x=='course'){
        document.getElementById("check").checked = true;
        document.getElementById("dur").style.display='flex';
                document.getElementById("cdur").style.display='flex';
        document.getElementById("cbox").style.display='flex';
    }
	else{
	            document.getElementById("cdur").style.display='none';
        document.getElementById("check").checked = false;
        document.getElementById("dur").style.display='none';
        document.getElementById("cbox").style.display='none';
    }
               }
 
		   </script>


	<!-- Main Content -->
            <div class="main-content">
               <section class="section">
                  <div class="row ">
                     <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="card l-bg-green">
                           <div class="card-statistic-3">
                              <div class="align-items-center justify-content-between">
                                 <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                       <div class="card-content">
                                          <h5 class="font-15">Total Courses</h5>
                                          <h2 class="mb-3 font-18">

                                              <?php   $checksql3= "SELECT * FROM course"  ;
                                              $checkresult3 = $conn->query($checksql3);
                                              echo  $checkresult3->num_rows;

                                              ?>

                                          </h2>
                                       </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                       <div class="banner-img">
                                          <img src="assets/admin/images/banner/1.png" alt="">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="card l-bg-orange">
                           <div class="card-statistic-3">
                              <div class="align-items-center justify-content-between">
                                 <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                       <div class="card-content">
                                          <h5 class="font-15">Free Courses</h5>
                                          <h2 class="mb-3 font-18">

                                              <?php   $checksql3= "SELECT * FROM course where category='free'"  ;
                                              $checkresult3 = $conn->query($checksql3);
                                              echo  $checkresult3->num_rows;

                                              ?>
                                          </h2>
                                       </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                       <div class="banner-img">
                                          <img src="assets/admin/images/banner/2.png" alt="">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="card l-bg-purple">
                           <div class="card-statistic-3">
                              <div class="align-items-center justify-content-between">
                                 <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                       <div class="card-content">
                                          <h5 class="font-15">Paid Courses</h5>
                                          <h2 class="mb-3 font-18">        <?php   $checksql3= "SELECT * FROM course where category='paid'"  ;
                                              $checkresult3 = $conn->query($checksql3);
                                              echo  $checkresult3->num_rows;

                                              ?></h2>
                                       </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                       <div class="banner-img">
                                          <img src="assets/admin/images/banner/3.png" alt="">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="card l-bg-cyan">
                           <div class="card-statistic-3">
                              <div class="align-items-center justify-content-between">
                                 <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                       <div class="card-content">
                                          <h5 class="font-15">Certified Created</h5>
                                          <h2 class="mb-3 font-18">0</h2>
                                       </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                       <div class="banner-img">
                                          <img src="assets/admin/images/banner/4.png" alt="">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
				  <div class="row">
                     <div class="col-12">
                        <div class="card">
                           <div class="card-header">
                              <h4>Courses</h4>
                           </div>
                           <div class="card-body p-0">
							   <form method="post">
                              <div class="table-responsive">
                                 <table class="table table-striped">
                                    <tr>
                                       <th class="text-center">
                                          <div class="custom-checkbox custom-checkbox-table custom-control">
                                             <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                             <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                          </div>
                                       </th>
                                       <th>Name</th>
                                       <th>Type</th>       
									   <th>Start Date</th>
									   <th>End Date</th>
                                       <th>Amount (all in INR)</th>
                                       <th>Actions</th>
									</tr>
												
									<?php
									  $sql = "SELECT * FROM course";
									  $result = $conn->query($sql);
									  if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) {
									  ?>
                                    <tr>
                                       <td class="p-0 text-center">
                                          <div class="custom-checkbox custom-control">
                                             <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                             <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                          </div>
                                       </td>
									   <td><?php echo $row["name"]?></td>
									   
									   <td class="text-truncate">
									   <?php  if($row["category"]=='paid') {?>
										  <div class="badge badge-danger">Paid</div>
										  <?php } if($row["category"]=='free') {?>
										  <div class="badge badge-success">Free</div>
										  <?php }  ?>
									   </td>
									   
									   <td><?php echo $row["startdate"]?></td>

									   <td><?php echo $row["enddate"]?></td>
									   
									   <td><?php echo $row["amount"];
									   $cid=$row["id"];
									   $cname=$row["name"];
									   ?></td>
									   
									   <input type="hidden" name="cid" value="<?php echo $cid?>">
                                       <td>
										 <button class="btn btn-success btn-action mr-1" data-toggle="tooltip" title="View" formaction="course_view.php?name=<?php echo $cid; ?>"  >
											 <i class="far fa-eye"></i>
										  </button>
										  <button class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"  formaction="editcourse.php?name=<?php echo $cid; ?>&id=<?php echo $cname; ?>" >
											 <i class="fas fa-pencil-alt"></i>
									  </button>  
										 <button class="btn btn-danger btn-action" onclick="return confirm('Do you want to delete?');" formaction="delete_course.php?name=<?php echo $cid; ?>" data-toggle="tooltip" title="Delete"
											data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
											data-confirm-yes="alert('Deleted')">
											 <i class="fas fa-trash"></i>
										  </button>
									  </td>
									</tr>
									
									<?php } }?>
								   </table>
										  </form>
                              </div>
                           </div>
				
                        </div>
                     </div>
                  </div>
				  <div class="row">
					<div class="col-12">
					   <div class="card">
						  <div class="card-header">
							 <h4>Create Course & Module</h4>
						  </div>
						 <form action="create_course.php" method="post" enctype="multipart/form-data">
						  <div class="card-body">


                              <div class="form-group row mb-4">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                  <div class="col-sm-4 col-md-4">
                                      <select class="form-control selectric"  name="ctype" required id="ctype" onchange="change()">
                                          <option value="course">Course</option>
                                          <option value="module">Module</option>

                                      </select>
                                  </div>

                              </div>


							 <div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
								<div class="col-sm-12 col-md-4">
										<input type="text"  maxlength="60" name="title" required class="form-control">
								</div>
							 </div>

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
										<input type="text" name="amount" required  id="am" class="form-control" aria-label="Amount (to the nearest ruppee)">
									</div>
								</div>
							 </div>


							 <div class="form-group row mb-4" >
								 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Thumbnail Image</label>
								         <div class="col-sm-12 col-md-4" >

								            	 <div id="image-preview" class="image-preview" style="background-size:cover;background-repeat:no-repeat">
									             	 <label for="image-upload"  id="image-label">Choose File</label>
									             	 <input type="file" name="image" required id="image-upload" accept="image/*"  onchange="return fileValidation()"  />
									             </div>



                                          </div>

   	 	                         			<div class="col-sm-4 col-md-3">
                                              			   <div id="imagePreview">
                                               			   </div>
   											</div>
						     </div>


							 <div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">About Resource</label>
								 <div class="col-sm-12 col-md-7">
										<div class="form-group">

											<textarea  id="about" name="about" maxlength="3000"  required class="summernote"></textarea>
										</div>

		  
								 </div>
							 </div>


							 <div class="form-group row mb-4">
								 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Resources</label>
								 <div class="col-sm-4 col-md-4">
									<select class="form-control selectric" multiple="" name="resource[]" required>
									<option>Select Your Resources</option>
									<?php
									  $sql = "SELECT * FROM resources";
										  $result = $conn->query($sql);
											  if ($result->num_rows > 0) {
											
													while($row = $result->fetch_assoc()) {
									?>
																	 <option value="<?php echo $row['id']   ?>"><?php echo $row['name']   ?></option>
                                                          
									<?php }} ?>
									 
									</select>
								 </div>
								
							 </div>


							 <div class="form-group row mb-4" id="cdur">
									 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Course Duration</label>
										 <div class="col-sm-12 col-md-3">
											 <input type="date" name="startdate" id="txtDate"  value="<?php echo date('Y-m-d') ?>"  class="form-control inputtags">
										 </div>
										 
											 <div class="col-sm-12 col-md-3">
												 <input type="date" name="enddate" value="<?php echo date('Y-m-d') ?>"  class="form-control inputtags">
											 </div>
											
		        	 		</div>


                              <div class="form-group row mb-4">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Instructor</label>
                                  <div class="col-sm-4 col-md-4">
                                      <select   name="instructor" class="form-control selectric" required max-length="3">
                                          <option>Select Your Instructor</option>


                                          <?php
                                          $sql = "SELECT * FROM faculty where verified ='1'";
                                          $result = $conn->query($sql);
                                          if ($result->num_rows > 0) {

                                              while($row = $result->fetch_assoc()) {
                                                  ?>
                                                  <option value="<?php echo $row['id']   ?>"><?php echo $row['fname']   ?></option>

                                              <?php }} ?>

                                      </select>
                                  </div>

                              </div>
					
					 <div class="form-group row mb-4">
							 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Keywords</label>
								 <div class="col-sm-12 col-md-2">
									 <input type="text" name="keyword[]" required class="form-control inputtags">
								 </div>
									 <div class="col-sm-12 col-md-2">
									 	<input type="text" name="keyword[]" required class="form-control inputtags">
									 </div>
										 <div class="col-sm-12 col-md-2">
											 <input type="text" name="keyword[]" required class="form-control inputtags">
										 </div>
												 <div class="col-sm-12 col-md-2">

													 <a class="btn btn-primary" onClick="keyword()" style="color:white">ADD MORE KEYWORDS</a>
					 								</div>
		        	 </div>
							 <div class="form-group row mb-4" style="display:none" id="key">
									 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
										 <div class="col-sm-12 col-md-2">
											 <input type="text" name="keyword[]" class="form-control inputtags">
										 </div>
												 <div class="col-sm-12 col-md-2">
													 <input type="text" name="keyword[]" class="form-control inputtags">
												 </div>
													 <div class="col-sm-12 col-md-2">
														 <input type="text" name="keyword[]" class="form-control inputtags">
													 </div>
														 <div class="col-sm-12 col-md-2">
															 <input type="text" name="keyword[]" class="form-control inputtags">
														 </div>
					</div>


					<div class="form-group row mb-4">
									 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Skills</label>
										 <div class="col-sm-12 col-md-2">
											 <input type="text" name="skills[]" required class="form-control inputtags">
										 </div>
											 <div class="col-sm-12 col-md-2">
												 <input type="text" name="skills[]" required class="form-control inputtags">
											 </div>
												 <div class="col-sm-12 col-md-2">
													 <input type="text" name="skills[]" required class="form-control inputtags">
												 </div>
														 <div class="col-sm-12 col-md-2">
															 <input type="text" name="skills[]" required class="form-control inputtags">
														  </div>
		        	 </div>





                              <div class="form-group row mb-4" id="dur">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Duration(In Hours)</label>
                                  <div class="col-sm-12 col-md-2">
                                      <input type="text" name="hours" value="0" required class="form-control input tags">
                                  </div>

                              </div>

                              <div class="form-group row mb-4" id="cbox">
                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> Certified or Not</label>
                                  <div class="col-sm-12 col-md-2">
                                      <input type="checkbox" checked name="certified" id="check" value="1" class="form-control input tags">
                                  </div>

                              </div>
							 <div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
								<div class="col-sm-12 col-md-7">
								   <button class="btn btn-primary" name="submit"> CREATE COURSE</button>
								</div>
						</form>
							 </div>
						  </div>
					   </div>
					</div>
				</div> 
               </section>
            </div>

<?php
	include ("footer_2.php");
?>