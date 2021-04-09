<?php
       session_start();
	   if($_SESSION["adminemail"]==null){
	   
	   
		   header('Location: error.php?errors=Please Log In');
	   }

	include ("connection.php");
	$cid = $_REQUEST['name'];
	$cname = $_REQUEST['id'];

	$title = $_POST['title'];
$category = $_POST['category'];
$amount = $_POST['amount'];
$about = $conn-> real_escape_string($_POST['about']);
$xid = $_POST['xid'];
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];
if($_POST['resource']!=null){
$instructor= $_POST['resource'];
}



$last_id=$xid;


    
  if($instructor!=0){
		      $ctype='resource';
           $sql = 'INSERT INTO instructor (instructorId,resourceId,type) VALUES 
        ("'.$xid.'","'.$$instructor.'","'.$ctype.'")';
        
        if ($conn->query($sql) === TRUE) {
          echo "New ins created successfully";
         // header('Location: resources.php');
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }

      }
    

    

            


$target_file = basename($_FILES["image"]["name"]);
if($target_file!=null){
$rand=rand(10000,90000);
$target_dir = "uploads/Courses/".$title.'/image/'.$rand;
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imagename=$rand.basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (!file_exists('uploads/Courses/'.$title.'/image')) {
mkdir('uploads/Courses/'.$title.'/image', 0777, true);
}

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      
    //echo "The file ". htmlspecialchars( $rand.basename( $_FILES["image"]["name"])). " has been uploaded.";
   // echo $imagename;
   $sql = "UPDATE course SET name='$title' ,  category='$category' ,startdate='$startdate',enddate='$enddate' ,  amount='$amount' , image='$imagename', about='$about' WHERE id='$xid'";

   if ($conn->query($sql) === TRUE) {
    header('Location: course_view.php?name='.$xid);
   } else {
     echo "Error updating record: " . $conn->error;
   }
   

  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
}

else{

    $sql = "UPDATE course SET name='$title' ,  category='$category' ,startdate='$startdate',enddate='$enddate', amount='$amount' , about='$about' WHERE id='$xid'";

    if ($conn->query($sql) === TRUE) {
        header('Location: course_view.php?name='.$xid);
    } else {
      echo "Error updating record: " . $conn->error;
    }

}

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
        
                  </div>
				  <div class="row">
					<div class="col-12">
					   <div class="card">
						  <div class="card-header">
							 <h4>Edit Courses</h4>
						  </div>

						        <form action="edit_course.php" method="post" enctype="multipart/form-data">
                          
							<?php  $sq = "SELECT * FROM course where id='$cid'";

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

										<textarea  id="about" name="about" maxlength="3000"  style="height:300px;width:100%; resize: none; border-radius:3px;border:1px solid #D8D8D8"> <?php echo $row["about"];?> </textarea>
                                       
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

<?php
	include ("footer_2.php");
?>