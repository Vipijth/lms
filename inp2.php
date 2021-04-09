<?php
session_start();
include ("connection.php");
	 	
	$uid=$_SESSION['userid'];
$did=$_SESSION['did'];
	 $mydes= "SELECT * FROM discussionchat where discussionid='$did' order by id desc ";
                            $desres = $conn->query($mydes);
                         
  if ($desres->num_rows > 0) {
	?>
	  <div class="col-lg-10" style="text-align:justify;font-family: segoe ui semibold;font-size: 17px;color:#627AF3;padding:40px 0px;" >
		<?php echo $desres->num_rows  ?> Answers <li class="fa fa-comments"></li>
	 </div>
	 
	 <?php  
	 	
	
	 
	  
                         
                            while($row = $desres->fetch_assoc()) {
	 ?> 
	</div>
	 <div class="row justify-content-center" style="height:auto;width: 100%;padding: 10px 10px">
		 <?php
								
		if($row['userid']==$_SESSION['userid']){			
								?>
		 
	 <div class="col-lg-10" style="background: #EBEBEB;text-align:justify;font-family: segoe ui semibold;font-size: 18px;color:#81B456 ;border-bottom: 1px solid #000;padding:10px 0px;margin: 10px" >

		 <br><br>
		<small><?php echo $row['message'] ?> </small>
		  <div class="row justify-content-between" style="padding:20px">
			  	 <p style="font-size:14px;color:#ED0408 ;">

		 </p>
		 <p style="font-size:14px;color:#707070;font-family: segoe ui regular">
		You<br>
		<?php echo $row['senddate'] ?>
		 </p>
		 </div>

	 </div>
		 <?php } else { ?>
		 
		 	 <div class="col-lg-10" style="text-align:justify;font-family: segoe ui semibold;font-size: 18px;color:#5446C9 ;border-bottom: 1px solid #5446C9;padding:10px 0px;margin: 10px" >

		 <br><br>
		<small><?php echo $row['message'] ?> </small>
		  <div class="row justify-content-between" style="padding:20px">
			  	 <p style="font-size:14px;color:#ED0408 ;">

		 </p>
		 <p style="font-size:14px;color:#707070;font-family: segoe ui regular">
		 <?php echo $row['username'] ?><br>
		<?php echo $row['senddate'] ?>
		 </p>
		 </div>

	 </div>
		 		 <?php }   ?>
		 
		 
		 
		 

		 

	 <?php }} ?>
	 



