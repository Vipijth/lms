<?php
  session_start();
  if($_SESSION["adminemail"]==null){
  
  
	  header('Location: error.php?errors=Please Log In');
  }
include '../connection.php';
include ("header_1.php");
?>


   <style>
textarea:focus{outline :none; border:none;}

</style>


<script>
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
				   <div class="section-body">
                     <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Faculty</h4>
                              </div>
                              <div class="card-body">
								  <div class="row clearfix">
									  <?php
									  $sql = "SELECT * FROM faculty where verified=1";
									  $result = $conn->query($sql);
									  if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) {
									  ?>
									   <div class="col-12 col-sm-6 col-md-6 col-lg-3">
										   <article class="article article-style-b">
											  <div class="article-header">
												 <div class="article-image"  data-background="uploads/faculty/<?php echo $row['imageName']   ?>" >

                                                 </div>
											  </div>
											  <div class="article-details">
												 <div class="article-title">
													<h2>
														<a href="#">
														<?php echo $row["fname"].'   '.$row["lname"]; ?>
														</a>
													</h2>
												 </div>
												 <p>
												 <?php 
												 
												 $about=$row["about"];
												
												 $cid=$row["id"];
                                                 $cemail=$row["email"];
												 echo substr("$about",0,110); ?>
												 </p>
												 <div class="dropdown">
													<a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
													<div class="dropdown-menu">
													<a href="faculty_view.php?name=<?php echo $cid; ?>" class="dropdown-item has-icon"  >
														   <i class="fas fa-eye"></i> 
														   View
													   </a>
													   <a href="editfaculty.php?name=<?php echo $cid; ?>"  class="dropdown-item has-icon">
														   <i class="far fa-edit"></i> 
														   Edit
													   </a>
													   <div class="dropdown-divider"></div>
													   <a href="deletefac.php?name=<?php echo $cid; ?>&  id=<?php echo $cemail; ?>"  onclick="return confirm('Do you want to delete?');"  class="dropdown-item has-icon text-danger">
														   <i class="far fa-trash-alt"></i>
													   	   Delete
													   </a>
													</div>
												 </div> 
											  </div>
										   </article>
										 </div>
										 
										 <?php 
										}}
										?>
								  </div>
                              </div>
						
                           </div>
                        </div>
                     </div>
					 <div class="row">
                        <div class="col-12">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Add Faculty</h4>
							  </div>
							  <form action="create_faculty.php" method="post" enctype="multipart/form-data">
                              <div class="card-body">
                                 <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-2">
                                    <input type="hidden" name="title" value=" ">
                                    </div>
                                 </div>
								 <div class="form-group row mb-4">
									 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Image</label>
									 <div class="col-sm-12 col-md-4">
									 <div id="image-preview" class="image-preview" style="background-size:cover;background-repeat:no-repeat">
                                          <label for="image-upload" id="image-label">Choose File</label>
                                          <input type="file" required name="image" id="image-upload"  accept="image/*"  onchange="return fileValidation()"  />
                                         </div>
									 </div>
									 <div class="col-sm-4 col-md-3">
                                                 <div id="imagePreview">
                                                 </div>
   									</div>
								 </div>
								 <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">First Name</label>
                                    <div class="col-sm-12 col-md-4">
                                       <input type="text"  required name="fname"   class="form-control">
                                    </div>
                                 </div>




								 <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Last Name</label>
                                    <div class="col-sm-12 col-md-4">
                                       <input type="text" required name="lname" class="form-control">
                                    </div>
                                 </div>


                                  <div class="form-group row mb-4">
                                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Faculty Email</label>
                                      <div class="col-sm-12 col-md-4">
                                          <input type="email"  required name="email"   class="form-control">
                                      </div>
                                  </div>

                                  <div class="form-group row mb-4">
                                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                                      <div class="col-sm-12 col-md-4">
                                          <input type="password"  minlength="8" maxlength="16" required name="password"   class="form-control">
                                      </div>
                                  </div>


                                  <div class="form-group row mb-4">
                                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mobile Number</label>
                                      <div class="col-sm-12 col-md-4">
                                          <input type="text" placeholder=" "  pattern="[7-9]{1}[0-9]{9}"  minlength="10" maxlength="10" required name="mob"   class="form-control">
                                      </div>
                                  </div>



                                  <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">About Faculty</label>
									<div class="col-sm-12 col-md-7">
										<div class="form-group">

											<textarea  id="about" required name="about" maxlength="2000"  style="height:300px;width:100%; resize: none; border-radius:3px;border:1px solid #D8D8D8"></textarea>
										</div>

		  
								</div>
                                 </div>
                                 <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
									   <button class="btn btn-primary" name="submit">ADD</button>
									   
									</div>
							</form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
            </div>

         </div>
      </div>

   </body>

<?php
include ("footer_2.php");
?>