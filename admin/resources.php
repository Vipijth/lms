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



       function fileTypeValidation() {

           var fileInput = document.getElementById('customFile');

           var fileInputType = document.getElementById('filetype').value;

           var filePath = fileInput.value;
           document.getElementById('f1').innerHTML=fileInput.value;
           // Allowing file type

           if(fileInputType=="video")
           {
               var  allowedExtensions =
                   /(\.avi|\.mp4|\.mpeg|\.mov|\.flv|\.wmv|\.gif)$/i;

               if (!allowedExtensions.exec(filePath)) {
                   alert('Invalid file type!Accepted Types:.avi,.mp4,.mpeg,.flv,.wmv,.flv,.mov ');
                   fileInput.value = '';
                   document.getElementById('f1').innerHTML='';
                   return false;
               }
           }

           if(fileInputType!="video")
           {
               var  allowedExtensions =  /(\.doc|\.docx|\.ppt|\.pdf|\.mp3)$/i;
               if (!allowedExtensions.exec(filePath)) {
                   alert('Invalid file type!Accepted Types:.doc,.docx,ppt,pdf,mp3 ');
                   fileInput.value = '';
                   document.getElementById('f1').innerHTML='';
                   return false;
               }
           }


       }


       function fileTypeValidation1() {

           var fileInput = document.getElementById('customFile1');

           document.getElementById('f2').innerHTML=fileInput.value;            var fileInputType = document.getElementById('filetype1').value;

           var filePath = fileInput.value;

           // Allowing file type

           if(fileInputType=="video")
           {
               var  allowedExtensions =
                   /(\.avi|\.mp4|\.mpeg|\.mov|\.flv|\.wmv|\.gif)$/i;

               if (!allowedExtensions.exec(filePath)) {
                   alert('Invalid file type!Accepted Types:.avi,.mp4,.mpeg,.flv,.wmv,.flv,.mov ');
                   fileInput.value = '';
                   document.getElementById('f2').innerHTML='';
                   return false;
               }
           }
           if(fileInputType!="video")
           {
               var  allowedExtensions =  /(\.doc|\.docx|\.ppt|\.pdf|\.mp3)$/i;
               if (!allowedExtensions.exec(filePath)) {
                   alert('Invalid file type!Accepted Types:.doc,.docx,ppt,pdf,mp3 ');
                   fileInput.value = '';
                   document.getElementById('f2').innerHTML='';
                   return false;
               }
           }

       }



       function fileTypeValidation2() {

           var fileInput = document.getElementById('customFile2');
           document.getElementById('f3').innerHTML=fileInput.value;
           var fileInputType = document.getElementById('filetype2').value;

           var filePath = fileInput.value;

           // Allowing file type

           if(fileInputType=="video")
           {
               var  allowedExtensions =
                   /(\.avi|\.mp4|\.mpeg|\.mov|\.flv|\.wmv|\.gif)$/i;

               if (!allowedExtensions.exec(filePath)) {
                   alert('Invalid file type!Accepted Types:.avi,.mp4,.mpeg,.flv,.wmv,.flv,.mov ');
                   fileInput.value = '';
                   document.getElementById('f3').innerHTML='';
                   return false;
               }
           }

           if(fileInputType!="video")
           {
               var  allowedExtensions =  /(\.doc|\.docx|\.ppt|\.pdf|\.mp3)$/i;
               if (!allowedExtensions.exec(filePath)) {
                   alert('Invalid file type!Accepted Types:.doc,.docx,ppt,pdf,mp3 ');
                   fileInput.value = '';
                   document.getElementById('f3').innerHTML='';
                   return false;
               }
           }

       }



       function fileTypeValidation3() {

           var fileInput = document.getElementById('customFile3');
           document.getElementById('f4').innerHTML=fileInput.value;
           var fileInputType = document.getElementById('filetype3').value;

           var filePath = fileInput.value;

           // Allowing file type

           if(fileInputType=="video")
           {
               var  allowedExtensions =
                   /(\.avi|\.mp4|\.mpeg|\.mov|\.flv|\.wmv|\.gif)$/i;

               if (!allowedExtensions.exec(filePath)) {
                   alert('Invalid file type!Accepted Types:.avi,.mp4,.mpeg,.flv,.wmv,.flv,.mov ');
                   fileInput.value = '';
                   document.getElementById('f4').innerHTML='';
                   return false;

               }
           }

           if(fileInputType!="video")
           {
               var  allowedExtensions =  /(\.doc|\.docx|\.ppt|\.pdf|\.mp3)$/i;
               if (!allowedExtensions.exec(filePath)) {
                   alert('Invalid file type!Accepted Types:.doc,.docx,ppt,pdf,mp3 ');
                   fileInput.value = '';
                   document.getElementById('f4').innerHTML='';
                   return false;
               }
           }



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
                                          <h5 class="font-15">total Resources</h5>
                                          <h2 class="mb-3 font-18">

                                              <?php   $checksql3= "SELECT * FROM resources"  ;
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
                                          <h5 class="font-15">Resources Uploaded (Word)</h5>
                                          <h2 class="mb-3 font-18">
                                              <?php   $checksql3= "SELECT * FROM resources_files where SUBSTRING(filename,-4)='docx' or SUBSTRING(filename,-3)='doc'"  ;
                                              $checkresult3 = $conn->query($checksql3);
                                              echo  $checkresult3->num_rows;

                                              ?>


                                          </h2>
                                       </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                       <div class="banner-img">
                                          <img src="assets/admin/images/icons/word.svg" alt="">
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
                                          <h5 class="font-15">Resources Uploaded (PPT)</h5>
                                          <h2 class="mb-3 font-18">


                                              <?php   $checksql3= "SELECT * FROM resources_files where SUBSTRING(filename,-4)='.ppt'"  ;
                                              $checkresult3 = $conn->query($checksql3);
                                              echo  $checkresult3->num_rows;

                                              ?>

                                          </h2>
                                       </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                       <div class="banner-img">
                                          <img src="assets/admin/images/icons/ppt.svg" alt="">
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
                                          <h5 class="font-15">Resources Uploaded (PDF)</h5>
                                          <h2 class="mb-3 font-18">

                                              <?php   $checksql3= "SELECT * FROM resources_files where SUBSTRING(filename,-4)='.pdf'"  ;
                                              $checkresult3 = $conn->query($checksql3);
                                              echo  $checkresult3->num_rows;

                                              ?>
                                          </h2>
                                       </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                       <div class="banner-img">
                                          <img src="assets/admin/images/icons/pdf.svg" alt="">
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
                              <h4>Resources</h4>
						   </div>
						   <form method="post">
                           <div class="card-body p-0">
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
                                       <th>Categories</th>
                                       <th>Amount (all in INR)</th>
                                       <th>Actions</th>
									</tr>
									
									<?php
									  $sql = "SELECT * FROM resources";
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
                                       <td>
                                          <div class="text-left">

										  <?php
										  $id= $row["id"];
									  $sqls = "SELECT * FROM resources_files where Rid='$id' and filetype='video'";
									  $results = $conn->query($sqls);

									  if ($results->num_rows > 0) {
										// output data of each row
										
									  ?>
											  <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
												  <i class="text-black-50" data-feather="video"></i>
												 
											  </a>

											  <?php } ?>

											  <?php
									
									  $sqlss = "SELECT * FROM resources_files where Rid='$id' and filetype!='video'  ";
									  $resultss = $conn->query($sqlss);
									 
									  if ($resultss->num_rows > 0) {
										// output data of each row
										
									  ?>

											  <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
												  <i class="text-black-50" data-feather="file-text"></i>
											  </a>
											  <?php } ?>
										  </div>
                                       </td>
									   <td><?php echo $row["amount"];
										 $cid=$row["id"];
										 $cname=$row["name"];
										 
									
									   ?></td>
									 
									      <input type="hidden" name="cid" value="<?php echo $cid?>">
                                       <td>
									   <button class="btn btn-success btn-action mr-1" data-toggle="tooltip" title="View" formaction="resource_view.php?name=<?php echo $cid; ?>&id=<?php echo $cname; ?>"  >
											 <i class="far fa-eye"></i>
										  </button>
										 <button class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit" formaction="editresource.php?name=<?php echo $cid; ?>&id=<?php echo $cname; ?>" >
											 <i class="fas fa-pencil-alt"></i>
									  </button>
										 <button class="btn btn-danger btn-action"  onclick="return confirm('Do you want to delete?');" formaction="delete_resource.php?name=<?php echo $cid; ?>" data-toggle="tooltip" title="Delete"
											data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
											data-confirm-yes="alert('Deleted')">
											 <i class="fas fa-trash"></i>
									  </button>
									  </td>
                                    </tr>
                                   <?php }} ?>
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
							 <h4>Create Resource</h4>
						  </div>
						  <form action="create_resource.php" method="post" enctype="multipart/form-data">
						  <div class="card-body">
							 <div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
								<div class="col-sm-12 col-md-4">
								   <input type="text" maxlength="60"  name="title" required class="form-control">
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
										<input type="text" name="amount" id="am" required   class="form-control" aria-label="Amount (to the nearest ruppee)">
									</div>
								</div>
							 </div>
							 <div class="form-group row mb-4" >
								 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Thumbnail Image</label>
								         <div class="col-sm-12 col-md-4" >

								            	 <div id="image-preview" class="image-preview"  style="background-size:cover;background-repeat:no-repeat"> 
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
                                            <textarea name="about" id="about1" class="summernote"  > </textarea>	</div>


		  
								 </div>
							 </div>
							 <div class="form-group row mb-4">
								 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Files</label>

						 <div class="col-sm-12 col-md-2">
                                  <input type="text" name="tit"  maxlength="40" required class="form-control inputtags" placeholder="Title">
                         </div>

					    <div class="col-sm-4 col-md-2">

									<select class="form-control" name="filetype" id="filetype">

									   <option value="video">Video</option>
									   <option value="worksheet">Worksheet</option>
									   <option value="activity">Activity</option>
									   <option value="article">Article</option>
									</select>
						</div>
						    <div class="col-sm-4 col-md-3">
								 <div class="custom-file">
										<input type="file" required name="files" class="custom-file-input" id="customFile" onchange="return fileTypeValidation()"  >
										<label class="custom-file-label" for="customFile">Choose file</label>
								</div>

						    </div>
							<div class="col-sm-2 col-md-2"  id="f1">


                             </div>
					        </div>



					    <div class="form-group row mb-4">
                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Files</label>

                             	   <div class="col-sm-12 col-md-2">
                                   <input type="text" name="tit1" maxlength="40" class="form-control inputtags" placeholder="Title">
                                   </div>


                            <div class="col-sm-4 col-md-2">

								<select class="form-control" name="filetype1" id="filetype1">

                                    <option value="video">Video</option>
                                    <option value="worksheet">Worksheet</option>
                                    <option value="activity">Activity</option>
                                    <option value="article">Article</option>
								<select>
                            </div>
                            <div class="col-sm-4 col-md-3">
                              <div class="custom-file">
                                <input type="file"  name="files1" class="custom-file-input" id="customFile1" onchange="return fileTypeValidation1()"  >
                             	<label class="custom-file-label" for="customFile">Choose file</label>
                              </div>
                            </div>
                                <div class="col-sm-2 col-md-2"  id="f2">


                                </div>
                            </div>




           <div class="form-group row mb-4">
								 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Files</label>
	                                <div class="col-sm-12 col-md-2">
                                         <input type="text"  name="tit2" maxlength="40" class="form-control inputtags" placeholder="Title">
                                 	</div>


										<div class="col-sm-4 col-md-2">
											<select class="form-control" name="filetype3" id="filetype2">


                                                <option value="video">Video</option>
                                                <option value="worksheet">Worksheet</option>
                                                <option value="activity">Activity</option>
                                                <option value="article">Article</option>
										 </select>
										</div>
											<div class="col-sm-4 col-md-3">
												<div class="custom-file">
												<input type="file"  name="files2" class="custom-file-input" id="customFile3" onchange="return fileTypeValidation3()"  >
													<label class="custom-file-label" for="customFile">Choose file</label>
												</div>
											</div>
												<div class="col-sm-2 col-md-2"  id="f4">


                                            	 </div>
											</div>

											<div class="form-group row mb-4">
                            								 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Instructor</label>
                            								 <div class="col-sm-4 col-md-4">
                            										 <select   name="instructor" class="form-control selectric"  max-length="3">
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
							
							 <div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
								<div class="col-sm-12 col-md-7">
								   <button class="btn btn-primary">CREATE RESOURCE</button>
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