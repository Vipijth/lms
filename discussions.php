<?php
include("header.php");
include ("connection.php"); 

$subid= $_SESSION['srid'];
$did=$_SESSION['did'];

if(isset($_POST["reply"])) {
	
	  // set the timezone first
if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
}
$disid=$_POST["disid"];

 $date = date("F d Y");
$date1 =  date("H:i a");
	$username=$_SESSION['username'];
	$userid=$_SESSION['userid'];
	$courseid=$_POST['subid'];
	$time=$date.' '.$date1;
	$utype=$_SESSION['utype'];
	$question=$conn->real_escape_string($_POST['question']);
	    $sql = 'INSERT INTO reply(discussionid,userid,username,message,utype,senddate) VALUES 
            ("'.$disid.'","'.$userid.'","'.$username.'","'.$question.'","'.$utype.'","'.$time.'")';
         
             if ($conn->query($sql) === TRUE) {
               
                 echo "<script>
         alert('Reply Updated successfully');
         </script>";
             
             } else {
                 echo "Error: " . $sql . "<br>" . $conn->error;
             }
}


if(isset($_POST["send"])) {
	
	  // set the timezone first
if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
}

 $date = date("F d Y");
$date1 =  date("H:i a");
	
	$username=$_SESSION['username'];
	$userid=$_SESSION['userid'];
	$courseid=$_POST['subid'];
	$time=$date.' '.$date1;
	$utype=$_SESSION['utype'];
	$question=$conn->real_escape_string($_POST['question']);
	
	try{


        if($_FILES['image']['name']==null){
            $sql = 'INSERT INTO discussionchat(discussionid,userid,username,message,utype,senddate) VALUES 
            ("'.$did.'","'.$userid.'","'.$username.'","'.$question.'","'.$utype.'","'.$time.'")';
         
             if ($conn->query($sql) === TRUE) {
               
                 echo "<script>
         alert('Answer Updated successfully');
         </script>";
             
             } else {
                 echo "Error: " . $sql . "<br>" . $conn->error;
             }
    }else{ 




    $rand=rand(10000,90000);
    $target_dir = "admin/uploads/msg/".$rand;
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imagename=$rand.basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (!file_exists('admin/uploads/msg')) {
    mkdir('admin/uploads/msg', 0777, true);
    }
    // Check if image file is a actual image or fake image
    
    
    // Allow certain file formats
    
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          
        //echo "The file ". htmlspecialchars( $rand.basename( $_FILES["image"]["name"])). " has been uploaded.";
       // echo $imagename;
       $sql = 'INSERT INTO discussionchat(discussionid,userid,username,message,utype,senddate,filename) VALUES 
("'.$did.'","'.$userid.'","'.$username.'","'.$question.'","'.$utype.'","'.$time.'","'.$imagename.'")';
       if ($conn->query($sql) === TRUE) {
    
         $last_id = $conn->insert_id;
         echo "<script>
         alert('Answer Updated successfully');
         </script>";
         //header('Location: resources.php');
       } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
       }
    
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
	}
}
	catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
}
?>


<link rel="stylesheet" href="admin/assets/admin/bundles/summernote/summernote-bs4.css">

<style>

.cb{
	
	
	height:auto;width:100%;border:none;background:#32BF9F;padding:10px;border-radius:1em 0em 1em 0em;text-align:left;color:white
	
}
</style>
<div class="container-fluid" style="padding-top:100px">

	<div class="row justify-content-start" >



		<div class="col-lg-3" style=" box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);height:600px;margin:10px;border-radius:1em 1em 1em 1em;">
          <div class="row justify-content-center" style="background:#7;height:12%;border-radius:1em 1em 0em 0em;">
				
					<div class="input-group mb-3">

  <input type="text"  id='txt_name'  class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Search Discussions..." style="border-radius:1em 1em 1em 1em" >
</div>
		  </div>
		
		            <div class="row justify-content-center" style="height:83%;border-radius:0em 0em 1em 1em;overflow-y:scroll">
	      <table width='95%' border='0'  style="height:100px" >
          <thead>
          <tr>
           
          
       
          </tr>
          </thead>
          <tbody>
            		
				 <?php 
	$uid=$_SESSION['userid'];
	 $mydes= "SELECT * FROM discussion where courseid='$subid' ";
                            $desres = $conn->query($mydes);
                            if ($desres->num_rows > 0) {
                         
                            while($row = $desres->fetch_assoc()) {
	
	
	?>
     
         
		 
		 <?php if($row['id']==$did){ ?>
		     <tr>
                <td></td>
                <td style="padding:20px 0px">
			
			
		
				<button class="cb" style="background:#000;">
				<i> 		<?php echo $row['title'] ?> </i>
				
				</button>
		
				</td>
                
            </tr>
			
		 <?php }else { ?>
         
		        <tr>
                <td></td>
                <td style="padding:20px 0px">
			
				<form method="post" action="group_discussion.php">
			
			<input type="hidden" value="<?php echo $row['id'] ?> " name="did">
			<input type="hidden" value="<?php echo $subid ?> " name="rid">
				<button class="cb" >
				<i> 		<?php echo $row['title'] ?> </i>
				
				</button>
				</form>
				
				</td>
                
            </tr>
							<?php }} } ?>
    
     
	
      
          </tbody>
        </table>
        
					
					</div>
	    </div>
		
		
		
		
		
		
		
		
				 <?php 
	$uid=$_SESSION['userid'];
	 $mydes= "SELECT * FROM discussion where id='$did' ";
                            $desres = $conn->query($mydes);
                            if ($desres->num_rows > 0) {
                         
                            while($row = $desres->fetch_assoc()) {
	
	
	?>
				<div class="col-lg-8" style="  0 15px 12px rgba(0,0,0,0.22);height:500px;margin:10px;">
          <div class="row justify-content-center" style="height:auto;padding:10px 10px;border-bottom:15px solid #707070;">
			
<font style="font-size:18px;color:#707070;">  <i>        <?php echo $row['topic'] ?></i> </font>
		  </div>
		  <br>
		  
		

		<div class="row justify-content-center" style="height:83%;border-radius:0em 0em 1em 1em;overflow-y:scroll;padding:10px 10px">
	
	<?php 
	 $mydes= "SELECT * FROM discussionchat where discussionid='$did' order by id desc ";
                            $desres = $conn->query($mydes);
                         
  if ($desres->num_rows > 0) { 
    while($row = $desres->fetch_assoc()) {
		
		$chatid=$row['id'];
	?>
	
	
	<div class="cb" style="border-bottom:2px solid #32BF9F; background:#fff;color:#000">
				<?php echo $row['message'] ?> 
				<br>
				<br>
				
				<div style="color:#818;float:right;padding:10px 10px">
				
						 <?php
								
		if($row['userid']==$_SESSION['userid']){			
								?>
				<small><b> You <br>
		<?php echo $row['senddate'] ?></b></small><br>
		<?php } else { ?> 
				<small><b> <?php echo $row['username'] ?><br>
		<?php echo $row['senddate'] ?></b></small><br>
		
		<?php } ?>
				<br><br>
				</div>
				<br><br>
				
					<div style="color:#818;float:left;padding:10px 10px">
				<?php if($row['filename']!=null ||$row['filename']!=''  ){ ?>
		<a href="admin/uploads/msg/<?php echo $row['filename']?>" target="_blank" style="font-size:12px; color:#000000;padding-bottom:5px">
	Attachment <li class="fa fa-paperclip"></li> Download </li>	<br>	<br>
	</a>
	
	<br>
	<?php } ?>
	
			 <?php
								
		if($row['userid']!=$_SESSION['userid']){			
								?>
								
						<button class="cb" style="padding:2px 15px;width:100px"  onclick="document.getElementById('div<?php echo $chatid ?>').style='display:block',this.style='display:none'">
				Reply <i class="fa fa-reply"></i>
				</button>	<?php } ?>		
									<button class="cb" style="padding:2px 15px;width:160px;background:none;color:#D40101;font-size:14px;font-weight:900;"  onclick="document.getElementById('divs<?php echo $chatid ?>').style='display:block',this.style='display:none'">
				View Comments
				</button>
								<br><br>
				
				
				</div>
				<br>	<br>	<br>	<br><br>	<br>
				<div style="display:none" id="divs<?php echo $chatid ?>">
					<?php 
	 $mydess= "SELECT * FROM reply where discussionid='$chatid' order by id desc ";
                            $desress = $conn->query($mydess);
                         
  if ($desress->num_rows > 0) { 
    while($rows = $desress->fetch_assoc()) {?>
		<div class="cb" style="border-top:1px solid #707070;border-radius:0px; background:#fff;color:#707070;HEIGHT:AUTO">
<br><br>	<?php echo $rows['message'] ?> <br><br>
		
						<div style="color:#818;float:right;padding:10px 10px">
				
						 <?php
								
		if($rows['userid']==$_SESSION['userid']){			
								?>
				<small><b> You <br>
		<?php echo $rows['senddate'] ?></b></small><br>
		<?php } else { ?> 
				<small><b> <?php echo $row['username'] ?><br>
		<?php echo $rows['senddate'] ?></b></small><br>
		
		<?php } ?>
				<br><br>
				</div>
		</div><br><br>
  <?php }} else{  echo "No Comments "; }?>
				</div>
				
				
				
				<div style="display:none" id="div<?php echo $chatid ?>">
					<br>	<br>
				<form action="" method="post"> 
						  <input type="hidden" value="<?php echo $subid ?> "  name="subid">
<input type="hidden" value="<?php echo $subid ?> "  name="rid">
	  <input type="hidden" value="<?php echo $row['id'] ?> "  name="disid">
				<textarea  id="about" name="question" maxlength="3000"  required class="summernote"  >
				<br><br>
				</textarea>
					<br>	<br>
					
					<button class="cb" name="reply" style="padding:2px 15px;width:130px;background:#32BF9F;">
				Send Reply  <i class="fa fa-reply"></i>
				</button>
				</form>
				</div>
				
				</div>
        
		
		
		
					<?php }} ?>
		
		

					</div>
					
					
						<br>
					         <div class="row justify-content-start" style="height:auto;">
			<br>
			<big>Your Answer</big> <hr/><br>
	<form action="" method="post" enctype="multipart/form-data">
				<textarea  id="about" name="question" maxlength="3000"  required class="summernote"  ></textarea>
					<br>	<br>
      <label> Attachment <li class="fa fa-paperclip"></li></label>
        <input type="file" name="image" id="file" onchange=" return  fileTypeValidation() "  style="border:none; background:white;color:#707070" >
					
					<br>	<br>
					
						  <input type="hidden" value="<?php echo $subid ?> "  name="subid">
<input type="hidden" value="<?php echo $subid ?> "  name="rid">
	  <input type="hidden" value="<?php echo $did ?> "  name="did">
					<button class="cb"  NAME="send"style="padding:2px 15px;width:90px;background:#32BF9F;">
				Send <i class="fa fa-telegram"></i>
				</button>
				
				
		  </div>
		  
		  
	    </div>
		
		
							<?php }} ?>
		
		
	</div>
	

















</div>


        <script type='text/javascript'>
            $(document).ready(function(){

                // Search all columns
                $('#txt_searchall').keyup(function(){
                    // Search Text
                    var search = $(this).val();

                    // Hide all table tbody rows
                    $('table tbody tr').hide();

                    // Count total search result
                    var len = $('table tbody tr:not(.notfound) td:contains("'+search+'")').length;

                    if(len > 0){
                      // Searching text in columns and show match row
                      $('table tbody tr:not(.notfound) td:contains("'+search+'")').each(function(){
                          $(this).closest('tr').show();
                      });
                    }else{
                      $('.notfound').show();
                    }
                    
                });

                // Search on name column only
                $('#txt_name').keyup(function(){
                    // Search Text
                    var search = $(this).val();

                    // Hide all table tbody rows
                    $('table tbody tr').hide();

                    // Count total search result
                    var len = $('table tbody tr:not(.notfound) td:nth-child(2):contains("'+search+'")').length;
                    
                    if(len > 0){
                      // Searching text in columns and show match row
                      $('table tbody tr:not(.notfound) td:contains("'+search+'")').each(function(){
                          $(this).closest('tr').show();
                      });
                    }else{
                      $('.notfound').show();
                    }
                    
                });
               
            });

            // Case-insensitive searching (Note - remove the below script for Case sensitive search )
            $.expr[":"].contains = $.expr.createPseudo(function(arg) {
                return function( elem ) {
                    return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
                };
            });
        </script>
		<script src="admin/assets/admin/js/app.min.js"></script>
<script src="admin/assets/admin/bundles/summernote/summernote-bs4.js"></script>
<script src="admin/assets/admin/js/scripts.js"></script>