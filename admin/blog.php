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

function about(){


var topic=document.getElementById("input2").value;

document.getElementById("d1").value=topic.substr(0, 350);
document.getElementById("d2").value=topic.substr(350, 700);

}

function fileValidation1() {

var fileInput =
document.getElementById('coverImage');

var filePath = fileInput.value;

// Allowing file type
var allowedExtensions =
/(\.jpg|\.jpeg|\.png|\.gif)$/i;

if (!allowedExtensions.exec(filePath)) {
alert('Invalid file type');
fileInput.value = '';
return false;
}
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



function fileValidation2() {

var fileInput =
document.getElementById('image1');

var filePath = fileInput.value;

// Allowing file type
var allowedExtensions =
/(\.jpg|\.jpeg|\.png|\.gif)$/i;

if (!allowedExtensions.exec(filePath)) {
alert('Invalid file type');
fileInput.value = '';
return false;
}
{
 
 // Image preview
 if (fileInput.files && fileInput.files[0]) {
						   var reader = new FileReader();
						   reader.onload = function(e) {
							   document.getElementById(
								   'image-preview1').style.backgroundImage  =
								   'url('+ e.target.result
								   + ') ';
						   };

	 reader.readAsDataURL(fileInput.files[0]);
 }
}

}


function fileValidation3() {

var fileInput =
document.getElementById('image3');

var filePath = fileInput.value;

// Allowing file type
var allowedExtensions =
/(\.jpg|\.jpeg|\.png|\.gif)$/i;

if (!allowedExtensions.exec(filePath)) {
alert('Invalid file type');
fileInput.value = '';
return false;
}
{
 
 // Image preview
 if (fileInput.files && fileInput.files[0]) {
						   var reader = new FileReader();
						   reader.onload = function(e) {
							   document.getElementById(
								   'image-preview2').style.backgroundImage  =
								   'url('+ e.target.result
								   + ') ';
						   };

	 reader.readAsDataURL(fileInput.files[0]);
 }
}

}




function fileValidation4() {

var fileInput =
document.getElementById('image4');

var filePath = fileInput.value;

// Allowing file type
var allowedExtensions =
/(\.jpg|\.jpeg|\.png|\.gif)$/i;

if (!allowedExtensions.exec(filePath)) {
alert('Invalid file type');
fileInput.value = '';
return false;
}
{
 
 // Image preview
 if (fileInput.files && fileInput.files[0]) {
						   var reader = new FileReader();
						   reader.onload = function(e) {
							   document.getElementById(
								   'image-preview3').style.backgroundImage  =
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
				   <div class="section-body">
                     <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Blog</h4>
							  </div>
							  <form>
                              <div class="card-body">
								  <div class="row clearfix">

								  <?php
									  $sql = "SELECT * FROM blogs";
									  $result = $conn->query($sql);
									  if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) {
										    $about1=$row['about1'];
									
											$pub=$row['publish'];
									  ?>
									  <div class="col-12 col-sm-6 col-md-6 col-lg-3">
										   <article class="article article-style-b">
											  <div class="article-header">
												 <div class="article-image" data-background="uploads/Blogs/<?php echo $row['title'];?>/images/<?php echo $row['cover']; ?>">
												 </div>
											  </div>
											  <div class="article-details">
												 <div class="article-title">
													<h2>
														<a href="#">
														<?php echo $row["title"]?>
														</a>
													</h2>
												 </div>
												 <p>
											
												  <?php
                                                   $ab=strip_tags($about1);

                                                   echo substr("$ab",0,190).'....';    
												 $cid=$row["id"];
												 ?>
												 </p>
												 <div class="dropdown">
													<a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
													<div class="dropdown-menu">
													   <a href="blog_view.php?name=<?php echo $cid; ?>" class="dropdown-item has-icon"  >
														   <i class="fas fa-eye"></i> 
														   View
													   </a>
													   
													   <div class="dropdown-divider"></div>
													   <a href="editblog.php?name=<?php echo $cid; ?>" class="dropdown-item has-icon">
														   <i class="far fa-edit"></i> 
														   Edit
													   </a>
													   	<?php if($pub!='1'){ ?>
														   <div class="dropdown-divider"></div>
													   <a href="publishblog.php?name=<?php echo $cid; ?>" class="dropdown-item has-icon "  onclick="return confirm('Do you want to publish?');"  >
														   <i class="far fa-edit"></i> 
														   Publish
													   </a>
														<?php } ?>
													   <div class="dropdown-divider"></div>
													   <a href="deleteblog.php?name=<?php echo $cid; ?>"  onclick="return confirm('Do you want to delete?');" class="dropdown-item has-icon text-danger">
														   <i class="far fa-trash-alt"></i>
													   	   Disable
													   </a>
													</div>
												 </div>
											  </div>
										   </article>
                                  	   </div>
								<?php }} ?>

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
                                 <h4>Create Blog</h4>
							  </div>
							  <form action="create_blog.php" method="post" enctype="multipart/form-data">
                              <div class="card-body">

                              <form method="post" enctype="multipart/form-data">
                                 <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                    <div class="col-sm-12 col-md-4">
                                       <input type="text" maxlength="40"  name="title"   required class="form-control">
                                    </div>
                                 </div>
								 <div class="form-group row mb-4">
									 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Cover Image</label>
									 <div class="col-sm-12 col-md-4">
										 <div id="image-preview" class="image-preview" style="background-size:cover;background-repeat:no-repeat">
                                          <label for="image-upload" id="image-label">Choose File</label>
                                          <input type="file"  name="coverImage" required id="coverImage" onchange="fileValidation1()"/>
                                         </div>
									 </div>
									 <div class="col-sm-4 col-md-3">
                                              			   <div id="imagePreview">
                                               			   </div>
   											</div>
								 </div>
							 <div class="form-group row mb-4">
                        									 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add  Image 1</label>
                        									 <div class="col-sm-12 col-md-4">
                        										 <div id="image-preview1" class="image-preview" style="background-size:cover;background-repeat:no-repeat">
                                                                  <label for="image-upload" id="image-label">Choose File</label>
                                                                  <input type="file"  name="Image1" required id="image1" onchange="fileValidation2()" />
                                                                 </div>
															 </div>
															 <div class="col-sm-4 col-md-3">
                                              			   <div id="imagePreview2">
                                               			   </div>
   											</div>
                        								 </div>

								 	 <div class="form-group row mb-4">
                                 									 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add  Image 2</label>
                                 									 <div class="col-sm-12 col-md-4">
                                 										 <div id="image-preview2" class="image-preview" style="background-size:cover;background-repeat:no-repeat">
                                                                           <label for="image-upload" id="image-label">Choose File</label>
                                                                           <input type="file"  name="Image2" required id="image3" onchange="fileValidation3()" />
                                                                          </div>
																	  </div>
																	  <div class="col-sm-4 col-md-3">
                                              			   <div id="imagePreview3">
                                               			   </div>
   											</div>
                                 								 </div>
                                            <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">About Blog</label>
                                    <div class="col-sm-12 col-md-7">
																				<div class="form-group">

											<textarea  id="about" name="about1" maxlength="3000"  required class="summernote"></textarea>
										</div>

									</div>
                                 </div>
         <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> </label>
                                    <div class="col-sm-12 col-md-7">
											<div class="form-group">

											<textarea  id="about" name="about2" maxlength="3000"  required class="summernote"></textarea>
										</div>

									</div>
                                 </div>

						 	 <div class="form-group row mb-4">
                                    	 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Author  Image</label>
                                                 <div class="col-sm-12 col-md-4">
                                                         <div id="image-preview3" class="image-preview" style="background-size:cover;background-repeat:no-repeat">
                                                                  <label for="image-upload" id="image-label">Choose File</label>
                                                                            <input type="file"  name="authorImage" required id="image4"  onchange="fileValidation4()"/>
                                                         </div>
												  </div>
												 	 <div class="col-sm-4 col-md-3">
                                              			  	 <div id="imagePreview4">
                                               			   </div>
   													</div>
                             </div>
							 <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">AUthor Name</label>
                                    <div class="col-sm-12 col-md-4">
                                       <input type="text"  name="author" maxlength="45"  required class="form-control">
                                    </div>
								 </div>
								 
								 <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">About Author</label>
                                    <div class="col-sm-12 col-md-6">
                                       <input type="text"  name="authordesc" maxlength="75"   required class="form-control">
                                    </div>
                                 </div>

                                 <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                    <br>
                                       <button class="btn btn-primary"  onclick="return confirm('Save This Blog?');">CREATE BLOG</button>
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

<?php
	include ("footer_2.php");
?>