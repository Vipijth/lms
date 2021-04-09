<?php
       session_start();
	   if($_SESSION["adminemail"]==null){


		   header('Location: error.php?errors=Please Log In');
	   }
include 'connection.php';

$cid = $_REQUEST['name'];
$cname = $_REQUEST['id'];
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
		   

   <body>
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
							 <h4>Edit Resource</h4>
						  </div>
                          <form action="edit_resource.php" method="post" enctype="multipart/form-data">
                          
            <?php   $sq = "SELECT * FROM resources where id='$cid'";
         
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

								            	 <div id="image-preview" class="image-preview"  style="background-size:cover;background-repeat:no-repeat;background-image:url('uploads/Resources/<?php echo $name;?>/image/<?php echo $image;?>')"> 
									             	 <label for="image-upload"  id="image-label"></label>
									             	 <input type="file" name="image"  id="image-upload" accept="image/*"  onchange="return fileValidation()"  />
									             </div>



                                          </div>

   	 	                         			
						     </div>
							 <div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">About Resource</label>
								 <div class="col-sm-12 col-md-7">
										<div class="form-group">

                                            <textarea name="about" id="about1" class="summernote" onclick="change()" >

                                     <?php echo $row["about"];?> </textarea>


										</div>

		  
								 </div>
							 </div>







                              <div class="form-group row mb-4">
                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Files</label>

                             	   <div class="col-sm-12 col-md-2">
                                   <input type="text" name="tit1" maxlength="12"  class="form-control inputtags" placeholder="Title">
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
                         <input type="text" name="tit2" maxlength="12"  class="form-control inputtags" placeholder="Title">
                    </div>

                     <div class="col-sm-4 col-md-2">
                         <select class="form-control" name="filetype2" id="filetype2">

<option value="video">Video</option>
                             <option value="worksheet">Worksheet</option>
                             <option value="activity">Activity</option>
                             <option value="article">Article</option>
                         </select>
                     </div>
					 
                   <div class="col-sm-4 col-md-3">
                       <div class="custom-file">
                         <input type="file"  name="files2" class="custom-file-input" id="customFile2" onchange="return fileTypeValidation2()"  >
                      	<label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                           <div class="col-sm-2 col-md-2"  id="f3">

                         	 </div>
                 	 </div>

           <div class="form-group row mb-4">
								 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Files</label>
	                                <div class="col-sm-12 col-md-2">
                                         <input type="text" name="tit3" maxlength="12"  class="form-control inputtags" placeholder="Title">
                                 	</div>


										<div class="col-sm-4 col-md-2">
											<select class="form-control" name="filetype3" id="filetype3">
<option value="video">Video</option>
                                                <option value="worksheet">Worksheet</option>
                                                <option value="activity">Activity</option>
                                                <option value="article">Article</option>
										 </select>
										</div>
											<div class="col-sm-4 col-md-3">
												<div class="custom-file">
												<input type="file"  name="files3" class="custom-file-input" id="customFile3" onchange="return fileTypeValidation3()"  >
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
																			<option value="0">Select Your Instructor</option>
					
                                                                         
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
									 <input type="text" name="keyword[]"  class="form-control inputtags">
								 </div>
								 <div class="col-sm-12 col-md-2">
									 <input type="text" name="keyword[]"  class="form-control inputtags">
								 </div>
								 <div class="col-sm-12 col-md-2">
									 <input type="text" name="keyword[]"  class="form-control inputtags">
								 </div>
								
			 </div>


						
							
							 <div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
								<div class="col-sm-12 col-md-7">
								   <button class="btn btn-primary">Edit RESOURCE</button>
								</div>
										</form>
                             </div>
                             <?php }} ?>
						  </div>
					   </div>
					</div>
				</div> 
               </section>
            </div>

         </div>
      </div>

<?php
include ("footer_2.php");
?>