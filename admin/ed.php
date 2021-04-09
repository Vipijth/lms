<?php
       session_start();
	   if($_SESSION["adminemail"]==null){
	   
	   
		   header('Location: error.php?errors=Please Log In');
	   }

include '../connection.php';
$cid = $_REQUEST['name'];
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
                                 <h4>Edit Blog</h4>
							  </div>
							
                              <div class="card-body">

                              <form action="edit_blog.php" method="post" enctype="multipart/form-data">
                          
                          <?php   $sq = "SELECT * FROM blogs where id='$cid'";
                       
                       $resut = $conn->query($sq);
                       if ($resut->num_rows > 0) {
                        // output data of each row
                        while($row = $resut->fetch_assoc()) {
                            $name=$row["title"];
                            $cover=$row["cover"];
                            $image2=$row["image2"];
                            $image1=$row["image1"];
                            $author=$row["author"];
                            $authordetails=$row["authordetails"];
                            $about1=$row["about1"];
                            $authorimage=$row["authorimage"];
                            $about2=$row["about2"];
                            ?>
                                 <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                    <div class="col-sm-12 col-md-4">
                                       <input type="text"  name="title" readonly value="<?php echo $name;?>"   required class="form-control">

                                       <input type="hidden" name="xid" value="<?php echo $cid;?>">
                                    </div>
                                 </div>
								 <div class="form-group row mb-4">
									 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Cover Image </label>
									 <div class="col-sm-12 col-md-4">
										 <div id="image-preview" class="image-preview" style="background-size:cover;background-repeat:no-repeat;background-image:url('http://meet.chrysaellect.com/admin/uploads/Blogs/<?php echo $name;?>/images/<?php echo $cover;?>'">
                                          <label for="image-upload" id="image-label">Choose File</label>
                                          <input type="file"  name="coverImage"  id="coverImage" onchange="fileValidation1()"/>
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
                        										 <div id="image-preview1" class="image-preview" style="background-size:cover;background-repeat:no-repeat;background-image:url('uploads/Blogs/<?php echo $name;?>/images/<?php echo $image1;?>'">
                                                                  <label for="image-upload" id="image-label">Choose File</label>
                                                                  <input type="file"  name="Image1"  id="image1" onchange="fileValidation2()" />
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
                                 										 <div id="image-preview2" class="image-preview" style="background-size:cover;background-repeat:no-repeat;background-image:url('uploads/Blogs/<?php echo $name;?>/images/<?php echo $image2;?>'">
                                                                           <label for="image-upload" id="image-label">Choose File</label>
                                                                           <input type="file"  name="Image2"  id="image3" onchange="fileValidation3()" />
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

											<textarea  id="about" name="about1" maxlength="3000"  required class="summernote"><?php echo $about1 ?></textarea>
										</div>

									</div>
                                 </div>
         <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> </label>
                                    <div class="col-sm-12 col-md-7">
											<div class="form-group">

											<textarea  id="about" name="about2" maxlength="3000"  required class="summernote"><?php echo $about2 ?></textarea>
										</div>

									</div>
                                 </div>

						 	 <div class="form-group row mb-4" bgcolor="red">
                                    	 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Author  Image</label>
                                                 <div class="col-sm-12 col-md-4">
                                                         <div id="image-preview3" class="image-preview" style="background-size:cover;background-repeat:no-repeat;background:url('')" bgcolor="red">
                                                                  <label for="image-upload" id="image-label">Choose File</label>
                                                                            <input type="file"  name="authorImage"  id="image4"  onchange="fileValidation4()"/>
                                                         </div>
												  </div>
												 	 <div class="col-sm-4 col-md-3">
                                              			  	 <div id="imagePreview4">
                                              			  	     
                                               			   </div>
   													</div>
                             </div>
							 <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Author Name</label>
                                    <div class="col-sm-12 col-md-4">
                                       <input type="text"  name="author" value="<?php echo $author;?>"  maxlength="45"  required class="form-control">
                                    </div>
								 </div>
								 
								 <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">About Author</label>
                                    <div class="col-sm-12 col-md-6">
                                       <input type="text"  name="authordesc" value="<?php echo $authordetails;?>"  maxlength="65"   required class="form-control">
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
                     <?php }} ?>
                  </div>
               </section>
            </div>

         </div>
      </div>
<?php
include ("footer_2.php");
?>