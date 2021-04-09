<?php
       session_start();
	   if($_SESSION["adminemail"]==null){
	   
	   
		   header('Location: error.php?errors=Please Log In');
	   }
	include ("connection.php");
	include ("header_1.php");
if(isset($_POST["delete"])) {
	
	   $id = $_POST["id"];
	   $sql = " delete from admin where id=$id" ;
   
   if ($conn->query($sql) === TRUE) {
          
       // header('Location: login.php');

echo "
     <script>
	 alert('Deleted Successfully');
         setTimeout(function(){
            window.location.href = 'access_control.php';
         }, 100);
      </script>";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }
	
}
?>
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
                                          <h5 class="font-15">Access Created</h5>
                                          <h2 class="mb-3 font-18">
										   
										                		<?php  
				   
				     $contsql= "SELECT * FROM admin";
        $contresult = $conn->query($contsql);
										
    echo     $contresult->num_rows ; ?>
										   
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
                 
                  </div>
                    <div class="row">
					  <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                           <div class="card-header">
                              <h4>Access Control</h4>
                           </div>
                           <div class="card-body">
                              <div class="table-responsive">
                                 <table class="table table-hover mb-0">
                                    <thead>
                                       <tr>
                                          <th>#</th>
                                          <th>Name</th> 
                                          <th>Email</th>
                                       
										  <th>Categories</th>
									 
										  <th>Actions</th> 
                                       </tr>
                                    </thead>
                                    <tbody>
                                       		<?php  
				   
				     $contsql= "SELECT * FROM admin";
        $contresult = $conn->query($contsql);
										$count=0;
        if ($contresult->num_rows > 0) {
		      while($row = $contresult->fetch_assoc()) { 
									
				  $count=$count+1;
										?>
										<tr>
										   <td><?php echo $count ?></td>
										   <td><?php echo $row['first_name'] ?></td>
										   <td><?php echo $row['email'] ?></td>
										
										   <td><?php echo $row['count'] ?></td>
										<?php if($row['id']!=1 ){ ?> 
										   <td>
											  <form action="" method="post"> 
												  
												  <input type="hidden" value="<?php echo $row['id']?> " name="id">
                                                <button name="delete"  class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                                   data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                   data-confirm-yes="alert('Deleted')" onClick="return confirm('Do You Want To Delete?')" style="padding:10px 40px">Delete 
                                                <i class="fas fa-trash"></i> 
                                                </button></form>
										   </td>
											<?php } ?>
										</tr>
										
										
										<?php }} ?>
                                    </tbody>
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
                              <h4>Create Access</h4>
                           </div>
								<form action="createaccess.php" method="post"> 
                           <div class="card-body">
                              <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                 <div class="col-sm-6 col-md-4">
                                    <input type="text" class="form-control" required placeholder="Enter First Name" name="fname">
                                 </div>
								 <div class="col-sm-6 col-md-4">
                                    <input type="text" class="form-control" required placeholder="Enter Last Name" name="lname">
                                 </div> 
                              </div>
                              <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                 <div class="col-sm-4 col-md-3">
                                    <div class="input-group mb-3">
                                       <div class="input-group-prepend">
                                          <span class="input-group-text">
                                          <i data-feather="mail"></i>
                                          </span>
                                       </div>
                                       <input type="email" required class="form-control" aria-label="Only Email is Accepted" name="email">
                                    </div>
                                 </div>
                              </div>
							  <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                                 <div class="col-sm-4 col-md-3">
                                    <div class="input-group mb-3">
                                       <div class="input-group-prepend">
                                          <span class="input-group-text">
                                          <i data-feather="eye-off"></i>
                                          </span>
                                       </div>
                                       <input type="password" required class="form-control" aria-label="Minimum 8 and Maximum 16 Characters" name="password">
                                    </div>
                                 </div>
								 <div class="col-sm-4 col-md-3">
									 <div class="input-group mb-5">
										 <h6 class="font-weight-bold">(Minimum 8 and Maximum 16 above Characters)</h6>
									 </div>
								 </div> 
                              </div>
                              <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Access</label>
                                 <div class="col-sm-12 col-md-4">
                                    <select class="form-control selectric" multiple="" name="access[]">
                                       <option class="text-center">*Select Access Control*</option>
                                       <option value="access">Access ALL</option>
									   <option value="slider">Slider</option>	
                                       <option value="resources"> Resources</option>
                                       <option value="course">Courses</option>
                                       
									   <option value="blogs">Blog</option>
                                       <option value="faculty">Faculty</option>
                                      		
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group row mb-4">
                                 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                 <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">CREATE ACCESS</button>
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