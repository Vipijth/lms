<?php
include ("header.php");
include ("connection.php");
$userid=$_SESSION['userid'];
$rcsql= "SELECT * FROM summitusers where userid='$userid'";
$rcresult = $conn->query($rcsql);
if ($rcresult->num_rows ==0) {
    header('Location:summithome.php');

}


?>


   <link rel="stylesheet" href="assets/user/css/summit.css">



<div class="container-fluid">

	
<link rel="stylesheet" href="assets/user/css/stick.css" xmlns="http://www.w3.org/1999/html">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'>

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


<script>
jQuery(document).on('click','#my-video', function(){
        if (this.paused) {
            this.play();
            this.controls = false; 
        } else {
            this.play();
            this.controls = false; 
            
        }
});



$(document).bind("contextmenu",function(ev){
    if(ev.target.nodeName=='VIDEO')
    {
        return false;
    }
});
</script>

	
	<style>
		video:focus{outline:none}</style>
	
	
	            <br>

           
 <div class="row  justify-content-md-center">
		 <div class="col-md-10 col-sm-10 col-lg-12" id="vdotab" style="padding-top:40px">
			 <br><br>
			 <center> 
                               <?php 
							   
							   
if(isset($_POST["view"])) {
		 
	   $file = $_POST["file"];?> 
	   
	
	        <video style="height:auto;width:80%;  box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22)"  autoplay controls controlsList="nodownload" class="my_video">
                                            <source id="myVideo" name="myVideo"  src="admin/uploads/Summit/<?php echo $file; ?> ">
                                        </video>
	   <?php
	   
}
							   ?></center>
                            </div></div>
		
		<br>
<div class="row">

    <div class="col-md-12" style="background:#fff;"  >
        <br>
            <br>
               <center>  
                <div class="col-md-12" id="videopanel">
                  <img src="assets/user/images/playic.png" style="left:1%;position: absolute;top:17%">
                       <p style="font-size:19px;font-family: Segoe UI semibold;color: #fff;left:80px;top:27%;position: absolute;">  
                           New Videos
                        </p>
                 </div>  </center>
<br>
               
<div class="row "  >
      
<?Php
	
	    $coursesql= "SELECT * FROM summit where DATE(start) >= CURDATE() - INTERVAL 7 DAY order by id desc "; 
	$sliderresult = $conn->query($coursesql);
if ($sliderresult->num_rows > 0) {

    while($row = $sliderresult->fetch_assoc()) {
	?>
<div class="col-md-5 col-lg-3" id="boxnew" style="">
<center>

<div class="col-md-11" id="boxin" style="  box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22)">

 <div class="boxcir" >
    <img src="assets/user/images/Icon material-slow-motion-video.png" style="top:17%;position: relative;width:50%;height:50%">
   
     <br>
     <font style="color:#4E4747;font-family:Segoe UI, semibold;font-size: 12px;top:13%;position: relative;">
       New
   </font>

</div>
<br><br>
	<form method="post" action="#vdotab" target="#vdotab"> 
	    <button name="view"  style="border:none;background:none">
                                        <video style="height:auto;width:100%;" loop autoplay="autoplay"  muted  >
                                            <source id="myVideo" name="myVideo" src="admin/uploads/Summit/<?php echo $row['video']; ?>#t=0,22  ">
                                        </video>
                                  
								
		     <input type="hidden" value="<?php echo $row['video']; ?>" name="file">
    <p style="width:90%;font-size:14px;font-family: Segoe UI semibold;text-align:center;color: #fff;position: relative;top:-4%">  
     <br>  <?php echo $row['title']; ?>
     </p></button>
	</form>
</div>
</center>
</div>

<?php }} ?>
</div>

<br>
<br>

<center> 
<div class="col-md-12" id="videopanel">
 <img src="assets/user/images/playic.png" style="left:1%;position: absolute;top:17%">
    <p style="font-size:19px;font-family: Segoe UI semibold;color: #fff;left:80px;top:27%;position: absolute;">  
             Past Videos
  </p>
</div> 
</center>

<br>
   <br>





  
   <div class="row" >



     <?Php
	
	 	$userid=$_SESSION['userid'];
	    $coursesql= "SELECT * FROM summit where DATE(start) <= CURDATE() - INTERVAL 7 DAY order by id desc "; 
	$sliderresult = $conn->query($coursesql);
if ($sliderresult->num_rows > 0) {

    while($row = $sliderresult->fetch_assoc()) {

        $rcsql= "SELECT * FROM summitusers where userid='$userid' and type='free'";
$rcresult = $conn->query($rcsql);
if ($rcresult->num_rows > 0) {
	?>
      
     
         <div class="col-md-5 col-lg-3"  id="boxnew"   >
             <center>
                 <div class="col-md-11" id="boxin" style="z-index:0;height:auto;  box-shadow: 0 19px 38px rgba(0,0,0,0.10), 0 15px 12px rgba(0,0,20,0.22)">
                     <div class="lockbox">
       <img src="assets/user/images/Icon feather-lock.png" id="lock">
                     </div>
                    
					    <video style="height:70%;width:85%;position: relative;top:4%"loop autoplay="autoplay"  muted  >
                                            <source id="myVideo" name="myVideo" src="admin/uploads/Summit/<?php echo $row['video']; ?>#t=0,22  ">
                                        </video>
					 
                     <p style="width:90%;font-size:14px;font-family: Segoe UI semibold;text-align:center;color: #00FFF6;position: relative;top:2%">  
                     <br>       <br>
                      <a href="#" style="color: #00FFF6;font-size: 12px">   <?php echo $row['title']; ?></a></a>
                      </p>
                       </div>
             </center>
         </div>
	<?php } $rcsql= "SELECT * FROM summitusers where userid='$userid' and type='paid' and status='1'";
$rcresult = $conn->query($rcsql);
if ($rcresult->num_rows > 0) {?>

	<div class="col-md-5 col-lg-3" id="boxnew">
<center>

<div class="col-md-11" id="boxin" style="  box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22)">

 <div class="boxcir">
    <img src="assets/user/images/Icon material-slow-motion-video.png" style="top:17%;position: relative;width:50%;height:50%">
   
     <br>
     <font style="color:#4E4747;font-family:Segoe UI, semibold;font-size: 12px;top:13%;position: relative;">
      Old
   </font>

</div>
<br><br>
	<form method="post" action="#vdotab" target="#vdotab"> 
	    <button name="view"  style="border:none;background:none">
                                        <video style="height:auto;width:100%;" loop autoplay="autoplay"  muted  >
                                            <source id="myVideo" name="myVideo" src="admin/uploads/Summit/<?php echo $row['video']; ?>#t=0,22  ">
                                        </video>
                                  
								
		     <input type="hidden" value="<?php echo $row['video']; ?>" name="file">
    <p style="width:90%;font-size:14px;font-family: Segoe UI semibold;text-align:center;color: #A2FF00;position: relative;top:-4%">  
     <br>  <?php echo $row['title']; ?>
     </p></button>
	</form>
</div>
</center>
</div>
     
      <?php }}}?>
     
     </div>
     

<br>
<br> 





   <br>

<section name="upcomg"> 

</section>



<!--CONTENT BODY END -->


</div></div>
</div>
<?php
include ("footer.php");

?>