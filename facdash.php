<?php
include("header.php");
include ("connection.php");
$uemail=$_SESSION["useremail"];
$fuid=$_SESSION["userid"];
$fid='1';
?>



<style>

    .button{

        background:#0A62A3;
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



    <div class="row justify-content-start" >
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
                    $ucsqqlq = "SELECT * FROM teacherinfo  where userid like '$uidssq'  ";
                    $ucresultsq = $conn->query($ucsqqlq);
                    if ($ucresultsq->num_rows < 1) {
                        ?>
                        <form action="buildproffac.php" method="post">

                            <button style="width:70%" class="button">
                                Build Profile
                            </button>
                        </form>
                    <?php } else{?>

                     <form action="editteacher.php" method="post">
                <button style="width:70%" class="button">
                    Edit Profile
                </button> </form>
                        <form action="viewteacherdash.php" method="post">

                            <button style="width:70%" class="button">
                                View Profile
                            </button>
                        </form>
                    <?php } ?>


                </center>

            </div>




        </div>



        <?php
        $ucsql= "SELECT * FROM instructor   INNER JOIN faculty
     ON faculty.id = instructor.instructorId  where faculty.email like '$uemail' and instructor.type='course' ";
        $ucresults = $conn->query($ucsql);
        if ($ucresults->num_rows > 0) {

            while($row = $ucresults->fetch_assoc()) {
                $rid=$row['resourceid'];
$fid= $row['instructorId'];
                $ucsqlr= "SELECT * FROM course where id ='$rid' ";
                $ucresultsr = $conn->query($ucsqlr);
                if ($ucresultsr->num_rows > 0) {

                    while($rows = $ucresultsr->fetch_assoc()) {
                        $image=$rows['image'];
                        $title=$rows['name'];
                        $xid=$rows['id'];

        ?>
        <div class="col-md-12 col-lg-2" style="margin:10px;font-family:segoe ui semibold; font-size:16px;color:#0A62A3; height:200px; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);">

            <div  style="height:120px;width: 100%;left:0;position: absolute">
                <img src="admin/uploads/Courses/<?php echo $title; ?>/image/<?php echo $image; ?>"style="width:100%;height:100%;">
                <br><center>
                 <?php echo $rows['name'] ?>
                </center>
            </div>


<form method="post" action="facdash2.php">
    <input type="hidden" name="cid" value="<?php echo $xid?>">

            <button style="width:101%;position: absolute;bottom: -5%;left:-5%;right:0" class="button">
                View Course
            </button>
</form>
        </div>

<?php                  }

                }

            }

        }?>







    </div>
<br><br>

    <div class="row justify-content-around" >
           <div class="col-md-12 col-lg-3" style="height:400px !important;margin:10px;font-family:segoe ui semibold; font-size:20px;color:#0A62A3;padding:20px 20px; height:auto; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);overflow-y:scroll;overflow-x: hidden">
    <center>

       <li class="fa fa-bell"></li> Notifications
        <br>   </center>
            <!--  <br>
              <font style="font-family:segoe ui regular; font-size:14px;color:#0452A0;">
                  <li class="fa fa-bell"></li>    Notification : sample text for notification
                  <br>
      <span style="color:#49596A;font-size: 12px">
         &nbsp; &nbsp; &nbsp; 22 THU 2020
      </span>-->
<br>

       
      <?php   $ucsqlr= "SELECT * FROM faculty_notification where userid = $fid || userid= $fuid order by id  desc ";
                $ucresultsr = $conn->query($ucsqlr);
                if ($ucresultsr->num_rows > 0) {

                    while($rows = $ucresultsr->fetch_assoc()) {
			 
			   
			   echo '  <a href="#" style="color:#479DFF;font-size: 14px"><b># </b>'.$rows['notification'].'<br> </a> 
			   
			   <font style="color:#707070;font-size:10px">'.$rows['dates'].'</font><br><br> ';
			   
					}}?>
			  



     </div>


        <div class="col-lg-6 col-md-12" style="height:340px;background-size:cover;background-image:url('assets/user/images/skillbg.png'); color: #0A62A3;margin:10px;padding:20px 30px; font-family:segoe ui semibold; font-size:16px; ">
            <div style="position:absolute;right:10px;width:30%;height: 100%;padding:20px 20px;">
                <center>

                 <a href="dashblog.php">
                    <button style="border-radius:15px;width:140px;  height:30px;padding:5px 15px" class="button">
                        My Blogs
                    </button></a>
                    <br>
                    <a href="blog6.php">
                    <button style="border-radius:15px;width:140px;  height:30px;padding:5px 15px" class="button">
                        All Blogs
                    </button></a>
                </center>
                <br>
                <p style="color:#707070; text-align: right; font-family: Segoe UI semibold; font-size:27px">
                    Upgrade
                    your<br>
                    SKILLS
                </p>
            </div>
        </div>



    </div>


</div>
<br><br>


<?php
include ("footer.php");
?>
