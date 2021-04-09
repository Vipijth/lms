<?php
       session_start();
	   if($_SESSION["adminemail"]==null){
	   
	   
		   header('Location: error.php?errors=Please Log In');
	   }
include '../connection.php';

$cid = $_REQUEST['name'];
$password='';
include ("header_1.php")
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
        
                   
					 <div class="row">
                        <div class="col-12">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Add Faculty</h4>
							  </div>
                              <form action="edit_faculty.php" method="post" enctype="multipart/form-data">
                          
                          <?php   $sq = "SELECT * FROM faculty where id='$cid'";
                       
                       $resut = $conn->query($sq);
                       if ($resut->num_rows > 0) {
                        // output data of each row
                        while($row = $resut->fetch_assoc()) {
                            $fname=$row["fname"];
                            $title=$row["title"];
                            $image=$row["imageName"];
                            $lname=$row["lname"];
                            $about=$row["about"];
                               $mob=$row["mob"];
                                           $email=$row["email"];
                                           
                                           
                             $sq = "SELECT * FROM users where email='$email'";
                       
                       $resut = $conn->query($sq);
                       if ($resut->num_rows > 0) {
                        // output data of each row
                             while($row = $resut->fetch_assoc()) {
                                 $password=$row['password'];
                           
                       }}             
                                           
                            ?>
                              <div class="card-body">
                                 <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                  <?php if($title=='Mr.'){ ?>
                                    <div class="col-sm-12 col-md-2">
                           
                                       <select class="form-control selectric" required name="title">
                                
                                          <option>Mr. </option>
                                          <option>Mrs. </option>
										  <option>Miss. </option>
                                       </select>
                                    </div>
                                    <?php } ?>
                                    <?php if($title=='Mrs.'){ ?>
                                    <div class="col-sm-12 col-md-2">
                           
                                       <select class="form-control selectric" required name="title">
                                       <option>Mrs. </option>
                                          <option>Mr. </option>
                                         
										  <option>Miss. </option>
                                       </select>
                                    </div>
                                    <?php } ?>
                                    <?php if($title=='Miss.'){ ?>
                                    <div class="col-sm-12 col-md-2">
                           
                                       <select class="form-control selectric" required name="title">
                                       <option>Miss. </option>
                                       <option>Mrs. </option>
                                          <option>Mr. </option>
                                         
										
                                       </select>
                                    </div>
                                    <?php } ?>

                                 </div>
                                 <div class="form-group row mb-4" >
								 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Thumbnail Image</label>
								         <div class="col-sm-12 col-md-4" >

								            	 <div id="image-preview" class="image-preview"  style="background-size:cover;background-repeat:no-repeat;background-image:url('uploads/faculty/<?php echo $image;?>')"> 
									             	 <label for="image-upload"  id="image-label"></label>
									             	 <input type="file" name="image"  id="image-upload" accept="image/*"  onchange="return fileValidation()"  />
									             </div>



                                          </div>

   	 	                         			
						     </div>
								 <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">First Name</label>
                                    <div class="col-sm-12 col-md-4">
                                       <input type="text"  required name="fname" value="<?php echo $fname;?>"  class="form-control">
                                       <input type="hidden" name="xid" value="<?php echo $cid;?>">
                                    </div>
                                 </div>
								 <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Last Name</label>
                                    <div class="col-sm-12 col-md-4">
                                       <input type="text" required name="lname" value="<?php echo $lname;?>" class="form-control">
                                    </div>
                                 </div>
                                 
                                 	 <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                    <div class="col-sm-12 col-md-4">
                                       <input type="text" required name="email" value="<?php echo $email;?>" class="form-control">
                                    </div>
                                 </div>
                                 
                                 <input type="hidden" value="<?php echo $email;?>" name="omail">
                                 	 <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mobile No</label>
                                    <div class="col-sm-12 col-md-4">
                                       <input type="text" required name="mob" value="<?php echo $mob;?>" class="form-control">
                                    </div>
                                 </div>
                                 
                                 	 <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                                    <div class="col-sm-12 col-md-4">
                                       <input type="text" required name="password" value="<?php echo $password;?>" class="form-control">
                                    </div>
                                 </div>
                                 <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">About Faculty</label>
									<div class="col-sm-12 col-md-7">
										<div class="form-group">

											<textarea  id="about" required name="about" maxlength="2000"  style="height:300px;width:100%; resize: none; border-radius:3px;border:1px solid #D8D8D8"><?php echo $about;?></textarea>
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

                                 <?php }} ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
            </div>

         </div>
      </div>
      <!-- General JS Scripts -->

<?php
include ("footer_2.php");
?>