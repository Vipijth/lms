<?php
include("header.php");
include ("connection.php");
	$xs= $_POST['xs'];
	$assessid=$_POST["assessid"];
		$feedback=$_POST["feedback"];
$mn=$_POST["mn"];
		$usid=$_POST["usid"];

$name=$_POST["name"];
if(isset($_POST["marksx"])) {
		$mark=$_POST["mar"];
$feedback=$_POST["feedback"];
	$sq="UPDATE assessmentfile set marks='$mark', feedback='$feedback' where id='$assessid' ";
	$conn->query($sq);
		$dates=date('d-m-Y');
		$notification='Feedback Updated On Your Assessment ( '.$xs.' ) ' ;
		$ntype='assessment';

       $sqlsd = 'INSERT INTO user_notification (userid,notification,type,dates) VALUES 
    ("'.$usid.'","'.$notification.'","'.$ntype.'","'.$dates.'")';
	   if ($conn->query($sqlsd) === TRUE) {
echo "
     <script>
	 alert('Feedback Updated Successfully ');
         setTimeout(function(){
        window.location.href = 'facdash.php';
         }, 100);
      </script>";
  
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }


}
?>

<style>
     .button{

             background:#FD4059;
             color:white;
             font-family: segoe ui semibold;
             font-size:14px;
             border:none;
             margin:10px;
             padding:10px 10px;

         }
        .button:focus{

            outline:none
        }

	textarea,button,input:focus{border:none;outline:none}
</style>

<script>

function vals(){
	var x=document.getElementById('mr').value;
	
	if(x>=100){
		
		alert('Please type marks below 100 ');
		document.getElementById('mr').value='0';
	}
}

</script>
<div class="container-fluid" style="padding-top:100px">

	

	<div class="col-lg-12">
		
		<b>  Student Name :  </b><?php echo $name ?>
	<center>
		<form action="" method="post"> 
			
		
			<br>	
			<br>	
			
 		<textarea style="width:80%;height:300px; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23)
;border-radius:0px;padding:20px 20px; resize:none;" placeholder="Enter Feedback Here ..." name="feedback" maxlength="100"><?php echo $feedback ?></textarea>
		<br><br>
		Marks:<input type="text" style="width:30%;padding:10px 20px;
  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);" placeholder="Enter the marks"  required  name="mar" value="<?php echo $mn?> " onchange="vals()" id="mr">
	<input type="hidden" name="assessid" value="<?php echo $assessid ?>">
				<input type="hidden" name="usid" value="<?php echo $usid ?>">
				<input type="hidden" name="xs" value="<?php echo $xs ?>">
			
				<input type="hidden" name="name" value="<?php echo $name ?>">
		  <button style="width:20%;height:40px" class="button" name="marksx">

                    <li class="fa fa-medal"></li>
                    Update Feedback
                </button>	</center>
	</form>
	</div>
</div>

<?php
include("footer.php");

?>


