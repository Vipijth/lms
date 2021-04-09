<?php
include("header.php");
include ("connection.php");
$uemail=$_SESSION["useremail"];
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

    select{
        padding:5px 10px;
        font-family: segoe ui semibold;
        font-size:12px;
    }

    input[type=file] {
        padding:5px 10px;
        font-family: segoe ui semibold;
        font-size:12px;
        width:60px;

    }
</style>

<div class="container-fluid" style="padding-top: 160px">
    <div class="row justify-content-start">
        <div class="col-md-12 col-lg-4" style="margin:10px;">
            <div class="col-lg-12" style=" color: #0A62A3; font-family:segoe ui semibold; font-size:16px; height:200px; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);">
                <?php echo $_SESSION['useremail'] ?>
                &nbsp;&nbsp; <li class="fa fa-user"></li>
                <br>
                <small>
                    <small>
                        <?php echo $_SESSION['lastlog'] ?>
                    </small>
                </small>
                <br>
                <center>

                    <?php

                    $uidssq=$_SESSION["userid"];
                    $ucsqqlq = "SELECT * FROM schoolinfo  where userid like '$uidssq'  ";
                    $ucresultsq = $conn->query($ucsqqlq);
                    if ($ucresultsq->num_rows < 1) {
                        ?>
                        <form action="#" method="post">

                            <button style="width:70%" class="button">
                                Build Profile
                            </button>
                        </form>
                    <?php } else{?>

                        <button style="width:70%" class="button">
                            Edit Profile
                        </button>
                        <br>
                        <form action="#" method="post">

                            <button style="width:70%" class="button">
                                View Profile
                            </button>
                        </form>
                    <?php } ?>


                </center>
            </div>
			<div class="row">
				<div class="col-md-5" style="margin:10px;color: #0A62A3; font-family:segoe ui semibold; font-size:16px; height:200px; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23); background-color: #FAFAFA !important;">
					<center>
						<i class="fa fa-user" style="color: #FD4059 !important; font-size:46px;padding-top: 42px;"></i> <br>
						<span style="color: #FD4059 !important;font-family:segoe ui semibold; font-size:26px;">Find Teacher</span>
					</center>
				</div>
				<br><br>
				<div class="col-md-5" style="margin:10px;color: #0A62A3; font-family:segoe ui semibold; font-size:16px; height:200px; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23); background-color: #FAFAFA !important;">
					<center>
						<i class="fa fa-suitcase" style="color: #FD4059 !important; font-size:46px;padding-top: 42px;"></i> <br>
						<span style="color: #FD4059 !important;font-family:segoe ui semibold; font-size:26px;">Post a job</span>
					</center>
				</div>
			</div>
        </div>
		<div class="col-md-6 col-lg-3" style="height:auto;margin:10px;font-family:segoe ui semibold; font-size:20px;color:#FD4059;padding:20px 20px; height:auto; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);">
			<center>
				<li class="fa fa-bell"></li> Notifications
				<br>   
			</center>
				<!--  <br>
				  <font style="font-family:segoe ui regular; font-size:14px;color:#0452A0;">
					  <li class="fa fa-bell"></li>    Notification : sample text for notification
					  <br>
		  <span style="color:#49596A;font-size: 12px">
			 &nbsp; &nbsp; &nbsp; 22 THU 2020
		  </span>-->
			<br><br>

			   <center>
				   <span style="color:#49596A;font-size: 14px"> No Notifications..</span> 
			   </center>
			   </font>
     	</div>
		<div class="col-md-6 col-lg-3" style="height:auto;margin:10px;font-family:segoe ui semibold; font-size:20px;color:#FD4059;padding:20px 20px; height:auto; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);">
			<center>
				<i class="fa fa-briefcase"></i> Recent Jobs
				<br>   
			</center>
				<!--  <br>
				  <font style="font-family:segoe ui regular; font-size:14px;color:#0452A0;">
					  <li class="fa fa-bell"></li>    Notification : sample text for notification
					  <br>
		  <span style="color:#49596A;font-size: 12px">
			 &nbsp; &nbsp; &nbsp; 22 THU 2020
		  </span>-->
			<br><br>

			   <center>
				   <span style="color:#49596A;font-size: 14px"> No Job Notifications..</span> 
			   </center>
			   </font>
     	</div>
    </div>
	<br><br>

    <div class="row justify-content-around">
    </div>
</div>
<br><br>
<?php
include ("footer.php");
?>
