<?php
       session_start();
	   if($_SESSION["adminemail"]==null){
	   
	   
		   header('Location: error.php?errors=Please Log In');
	   }
	include ("connection.php");
	include ("header_1.php");


   if(isset($_POST['update'])){
$am=$_POST['amount'];
      $sql="UPDATE summit_info set amount='$am'";
      if($conn->query($sql)==TRUE){
         
      }
   }
	
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

</script><script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
        document.getElementById("cbox").style.display='flex';
    }
	else{
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
                                          <h5 class="font-15">Total Videos</h5>
                                          <h2 class="mb-3 font-18">

                                              <?php   $checksql3= "SELECT * FROM summit"  ;
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
                                          <h5 class="font-15">Total Summit Users</h5>
                                          <h2 class="mb-3 font-18">

                                              <?php   $checksql3= "SELECT * FROM summitusers "  ;
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
                        <div class="card l-bg-cyan">
                           <div class="card-statistic-3">
                              <div class="align-items-center justify-content-between">
                                 <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                       <div class="card-content">
                                          <h5 class="font-15">Summit Paid Users</h5>
                                          <h2 class="mb-3 font-18">
                                          
                                          
                                          <?php   $checksql3= "SELECT * FROM summitusers where type ='paid'"  ;
                                              $checkresult3 = $conn->query($checksql3);
                                              echo  $checkresult3->num_rows;

                                              ?>
                                          
                                          </h2>
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
                              <h4>Summit</h4>
                           </div>
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
                                       <th>Categories</th>       
								
									   <th>start Date</th>
                                     
									</tr>
												
									<?php
									  $sql = "SELECT * FROM summit";
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
                                       <td><?php echo $row['title'];?></td>
                                     
                                       <td>
                                          <div class="text-left">
											  <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
												  <i class="text-black-50" data-feather="video"></i>
											  </a>
										  </div>
                                       </td>
									    <td><?php echo $row['start'];?></td> 
									
                               <form method="post" action="deletesummit.php">
                               <input type="hidden" name="cid" value="<?php echo $row['id'] ?>">
                                       <td>
									
										 <button class="btn btn-danger btn-action" onclick="return confirm('Do you want to delete?');"  data-toggle="tooltip" title="Delete"
											data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
											data-confirm-yes="alert('Deleted')">
											 <i class="fas fa-trash"></i>
										  </button>	  </form>
									  </td>
									</tr>
									
									<?php } }?>
								   </table>
									
                              </div>
                           </div>
				
                        </div>
                     </div>
                  </div>
				  <div class="row">
					<div class="col-12">
					   <div class="card">
						  <div class="card-header">
							 <h4>Create Summit</h4>
						  </div>
						 <form action="create_summit.php" method="post" enctype="multipart/form-data">
						  <div class="card-body">




							 <div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
								<div class="col-sm-12 col-md-4">
										<input type="text"  maxlength="40" name="title" required class="form-control">
								</div>
							 </div>





						

	 <div class="form-group row mb-4" >
								 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Video</label>
								   
		    <div class="col-sm-4 col-md-3">
					 <div class="custom-file">
							<input type="file" required  name="image"  id="image-upload"   class="custom-file-input" onchange="return fileTypeValidation()"  >
								<label class="custom-file-label" for="customFile">Choose file</label>
						</div>

			 </div>
		</div>

						     </div>

						

					
        
				


							 <div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
								<div class="col-sm-12 col-md-7">
								   <button class="btn btn-primary" name="submit"> CREATE SUMMIT</button>
								</div>
						</form>
							 </div>
						  </div>
                    </div>   </div>






                  <div class="row">
					<div class="col-12">

					   <div class="card">
						  <div class="card-header">
							 <h4>Summit Paid Plan</h4>
						  </div>
                    <?php

                    $sumamount='';
									  $sql = "SELECT * FROM summit_info";
									  $result = $conn->query($sql);
									  if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) {
                                 $sumamount=$row['amount'];
									  }}?>


						 <form action="" method="post" enctype="multipart/form-data">
						  <div class="card-body">




							 <div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Amount</label>
                        <div class="col-sm-4 col-md-3">
									<div class="input-group mb-3"  id="amount">
										<div class="input-group-prepend">
											<span class="input-group-text" >
												<i class="fas fa-rupee-sign"></i>
											</span>
										</div>
										<input type="text" name="amount" value="<?php echo  $sumamount ?>" required  id="am" class="form-control" aria-label="Amount (to the nearest ruppee)">
									</div>
								</div>
							 </div>





						

						     </div>

						

					
        
				


							 <div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
								<div class="col-sm-12 col-md-7">
								   <button class="btn btn-primary" name="update"> Update</button>
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