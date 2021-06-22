<?php
       session_start();
	   if($_SESSION["adminemail"]==null){
	   
	   
		   header('Location: error.php?errors=Please Log In');
	   }
	include ("connection.php");
	include ("header_1.php");



    if(isset($_POST['submit'])){
        $email=$_POST['email'];
        echo $email;
        $courseid=$_POST['course'];
        $userid;
        $coursename;;
        $sql = "SELECT * FROM users where email='$email' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $userid=$row['id'];
    }
	
}
$sqls = "SELECT * FROM course where id='$courseid' ";
$results = $conn->query($sqls);
if ($results->num_rows > 0) {
  // output data of each row
  while($row = $results->fetch_assoc()) {
    $coursename=$row['name'];
}

}

$stat=1;
$cat='course';
$d = date("d/m/Y");
$sql = 'INSERT INTO oc (courseid,useremail,tansdate,status,userid,sub,category) VALUES 
("' . $courseid . '","' . $email . '","' . $d . '","' . $stat . '","' . $userid . '","' . $coursename . '","' . $cat. '")';

if ($conn->query($sql) === TRUE) {

  echo "<script>  alert('Successfully Added'); </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
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

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <script>
	   
	
	   function pay(){
		 if( document.getElementById("category").value=="free"){
			  document.getElementById("amount").style.display="none";
			  document.getElementById("spam").style.display="none";
			  document.getElementById("am").value="0";
		 }
		 
		   if( document.getElementById("category").value=="paid"){
			  document.getElementById("amount").style.display="flex";
			  document.getElementById("spam").style.display="flex";
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
		document.getElementById("cbt").innerHTML='CREATE COURSE';
    }
	else{
	            document.getElementById("cdur").style.display='none';
        document.getElementById("check").checked = false;
        document.getElementById("dur").style.display='none';
        document.getElementById("cbox").style.display='none';
		document.getElementById("cbt").innerHTML='CREATE MODULE';

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
                              <h4></h4>
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
                                       <th>Email</th>
                                       <th>Course Name</th>       
									   <th>Date</th>
									 
									</tr>
												
									<?php
									  $sql = "SELECT * FROM oc where category='course' order by id desc limit 10";
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
									   <td><?php echo $row["useremail"]?></td>
									   
									 
									   
									   <td><?php echo $row["sub"]?></td>

									   <td><?php echo $row["tansdate"]?></td>
									
									  
                              
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
							
						  </div>
						 <form action="" method="post" enctype="multipart/form-data">
						  <div class="card-body">




							 <div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select User</label>
								<div class="col-sm-12 col-md-7">
                                <input list="encoding" name="email" value="" class="col-sm-6 custom-select custom-select-sm">
                            <datalist id="encoding">


                            <?php
									  $sqlu = "SELECT * FROM users where usertype='teacher'";
									  $resultu = $conn->query($sqlu);
									  if ($resultu->num_rows > 0) {
										// output data of each row
										while($row = $resultu->fetch_assoc()) {
									  ?>        
    <option value="<?php echo $row["email"]?>"></option>


<?php }} ?>
                                </datalist></div>
							 </div>

						


							 <div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select Ongoing Course</label>
								<div class="col-sm-12 col-md-7">
                                <select name="course" value="" class="col-sm-6 custom-select custom-select-sm">
                           


                            <?php
									  $sqlu = "SELECT * FROM course where DATE(startdate) > CURDATE() and  DATE(enddate) > CURDATE() and type='course' order by id ";
									  $resultu = $conn->query($sqlu);
									  if ($resultu->num_rows > 0) {
										// output data of each row
										while($row = $resultu->fetch_assoc()) {
									  ?>        
    <option value="<?php echo $row["id"]?>"><?php echo $row["name"]?></option>






<?php }} ?>
              

                                </select></div>
							 </div>




						
							 <div class="form-group row mb-4">
								<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
								<div class="col-sm-12 col-md-7">
								   <button class="btn btn-primary" name="submit" id="cbt"> CREATE COURSE</button>
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