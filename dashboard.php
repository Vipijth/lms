<?php
include("header.php");
include ("connection.php");


$amount='';
$sqlu = "SELECT * FROM summit_info ";
$resultu = $conn->query($sqlu);
if ($resultu->num_rows > 0) {
           while($row = $resultu->fetch_assoc()) {
$amount=$row['amount'];
           }}

if(isset($_POST['paid'] )){
    $userid=$_SESSION['userid'];
    $useremail=$_SESSION['useremail'];
    $username=$_SESSION['username'];
    $dates=date('d/m/Y');
    $type='free';
    $status='0';
    $order='summitorder'.uniqid().$userid;
    $_SESSION['summitamount']=$amount;
    $_SESSION['summitorder']=$order;
    $del="delete from summitusers where userid= '$userid'";
    if($conn->query($del)==true){
    }
$sqls ='insert into summitusers(username,useremail,userid,date,type,amount,status,orderid) values ("'.$username.'","'.$useremail.'","'.$userid.'","'.$dates.'","'.$type .'","'.$amount .'","'.$status .'","'.$order .'")';
    
if($conn->query($sqls)==true){

    header('Location:summitpay.php');
}
else{
    echo "Error: " . $sqls . "<br>" . $conn->error; 
}

}


$sname='';
if(isset($_POST["request"])) {
    $csid = $_POST['csid'];
    $semail = $_POST['semail'];
    $sid= $_SESSION['userid'];
    $cname = $_POST['cname'];
    $hours = $_POST['hours'];
    $stat=0;

    $sql = 'INSERT INTO ecert(studid, course,courseid,hours,email,status ) VALUES 
   ("'.$sid.'","'.$cname.'","'.$csid.'","'.$hours.'","'.$semail.'","'.$stat.'")';

    if ($conn->query($sql) === TRUE) {
        echo "<script>
alert(' Requested successfully');
</script>";
        $last_id = $conn->insert_id;

        //header('Location: resources.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}


if(isset($_POST["asses"])) {
$userid=$_SESSION['userid'];
    $useremail=$_SESSION['useremail'];
    $assessment = $_POST['assessment'];
    $title = $_POST['file2'];
    $titles = $_POST['file4'];
    $csid= $_POST['file3'];
    $subdate=date("d/m/Y");
    $rand=rand(10000,90000);
    $target_dir = "admin/uploads/Assessments/".$title.'/'.$rand;
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imagename=$rand.basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (!file_exists('admin/uploads/Assessments/'.$title)) {
        mkdir('admin/uploads/Assessments/'.$title, 0777, true);
    }
// Check if image file is a actual image or fake image


// Allow certain file formats


// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
$facid=$_SESSION['userid'];
            //echo "The file ". htmlspecialchars( $rand.basename( $_FILES["image"]["name"])). " has been uploaded.";
            // echo $imagename;
            $sq="delete  from assessmentfile where userid='$userid' and file2 like '$titles'" ;
            $conn->query($sq);
            $sql = 'INSERT INTO assessmentfile(title, userid,file,file2,useremail,subdate,courseid ) VALUES 
   ("'.$title.'","'.$userid.'","'.$imagename.'","'.$titles.'","'.$useremail.'","'.$subdate.'","'.$csid.'")';

            if ($conn->query($sql) === TRUE) {
				
				  $ucsql1 = "SELECT * FROM assessment  where file like '$titles'  ";
                            $ucresults1 = $conn->query($ucsql1);
                            if ($ucresults1->num_rows > 0) {

                                while ($row = $ucresults1->fetch_assoc()) {
			
			
			
				$dates=date('d-m-Y');
		$notification=$useremail.' Submitted Assessment On Course  '.$row['coursename'];
		$ntype='assessmnet';
		$notification2='Successfully Submitted Assessment On Course  '.$row['coursename'];
		$ntype='assessmnet';
									$facid=$row['facultyid'];
       $sqls = 'INSERT INTO faculty_notification (userid,notification,type,dates) VALUES 
    ("'.$facid.'","'.$notification.'","'.$ntype.'","'.$dates.'")';
       $sid= $_SESSION['userid'];
       	if ($conn->query($sqls) === TRUE) {}
 else {
                echo "Error: " . $sqls . "<br>" . $conn->error;
            }
      $sqlss = 'INSERT INTO user_notification (userid,notification,type,dates) VALUES 
    ("'.$sid.'","'.$notification2.'","'.$ntype.'","'.$dates.'")';

            if ($conn->query($sqlss) === TRUE) {}
 else {
                echo "Error: " . $sqlss . "<br>" . $conn->error;
            }
			
								}}
				
                echo "<script>
alert(' Assessment Submited successfully');
</script>";
                $last_id = $conn->insert_id;

                //header('Location: resources.php');
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


}

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
        padding:5px 13px;
        font-family: segoe ui semibold;
        font-size:12px;
        width: 70%;
    }

    input[type=file] {
        padding:0px 0px;
        font-family: segoe ui semibold;
        font-size:12px;
        width:70%;

    }
</style>

<div class="container-fluid" style="padding-top: 160px">

    <div class="row justify-content-start" >
        <div class="col-md-12 col-lg-5" style="margin:5px;">
            <div class="col-lg-9" style=" color: #0A62A3;margin:10px;padding:20px 30px; font-family:segoe ui semibold; font-size:16px; height:200px; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);">
                <?php echo $_SESSION["useremail"]; ?>
               &nbsp;&nbsp; <li class="fa fa-user"></li>
                <br>
                <small>
                    <small>
                         <?php echo $_SESSION['lastlog'] ?>
                    </small>
                </small>
                <br>

                             <?php

                            $uidssq=$_SESSION["userid"];
                            $ucsqqlq = "SELECT * FROM teacherinfo  where userid like '$uidssq'  ";
                            $ucresultsq = $conn->query($ucsqqlq);
                             if ($ucresultsq->num_rows < 1) {
                                    while($row = $ucresultsq->fetch_assoc()) {

                                    }
                            ?>
                <form action="buildprofteacher.php" method="post">

                <button style="width:70%" class="button">
                    Build Profile
                </button>
                </form>
                <?php } else{?>
   <form action="editteacher.php" method="post">
                <button style="width:70%" class="button">
                    Edit Profile
                </button> </form>                   <form action="viewteacherdash.php" method="post">

                                 <button style="width:70%" class="button">
                                     View Profile
                                 </button>
                                 </form>
<?php } ?>
            </div>

            
            <?php

$uidss=$_SESSION["userid"];
$ucsql = "SELECT * FROM summitusers  where userid = '$uidss'  ";
$ucresults = $conn->query($ucsql);
if ($ucresults->num_rows > 0 )  {

while ($row = $ucresults->fetch_assoc()) { ?>

            <div class="col-lg-9" style=" color: #0A62A3;margin:10px;padding:20px 20px; font-family:segoe ui semibold; font-size:16px; height:auto; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);">


Summit

<br> <br>

<button style="width:90%;height:70px;padding:10px 20px;   background-image: radial-gradient(#33AFFF, #0C5267 ); font-size:23px" class="button" name="asses">
SUMMIT VIDEOS <li class="fa fa-play-circle"></li>
</button>


<?php  if($row['type']=='free'){  ?>
<form action="" method="post">
    <button onclick="return confirm('Do you want  upgrade to paid plan?')"  name="paid" style="width:90%;height:70px;padding:10px 20px;   background-image: radial-gradient(#33AFFF, #0C5267 ); font-size:20px" class="button" name="asses">
UPGRADE TO PAID PLAN 
</button>
</form>

<?php  }?>
</div>

<?php  }} ?>
            <div class="col-lg-9" style=" color: #0A62A3;margin:10px;padding:20px 20px; font-family:segoe ui semibold; font-size:16px; height:auto; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);">

                <br>
                Submit Assessment
                <form method="post" action=""  enctype="multipart/form-data">
                <br> <br>

                        <Select name="assessment" id="selboxs"  onchange="go()">

                            <option>Select Assessment</option>
                            <?php

                            $uidss=$_SESSION["userid"];
                            $ucsql = "SELECT * FROM user_courses  where userid like '$uidss'  ";
                            $ucresults = $conn->query($ucsql);
                            if ($ucresults->num_rows > 0) {

                            while ($row = $ucresults->fetch_assoc()) {
                                $subid1=$row['subid'];
                            $ucsql1 = "SELECT * FROM assessment  where course like $subid1  ";
                            $ucresults1 = $conn->query($ucsql1);
                            if ($ucresults1->num_rows > 0) {

                                while ($row = $ucresults1->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $row['course'].'^'.$row['file']?>"><?php echo  $row['coursename'].'/'.$row['title']?></option>

                            <?php }}}} ?>
                        </Select>
    <br><br>
                <input type="file" title="" id="file1"   name="image" required>
       <input type="hidden" name="file2" id="file2">
                    <input type="hidden" name="file3" id="file3">
                    <input type="hidden" name="file4" id="file4">
                <button style="width:90px;height:40px" class="button" name="asses">
                    <li class="fa fa-upload"></li>
                    upload
                </button>
</form>
            </div>
            
            
            
            
            



            <script>
                function go(){
                    var x= document.getElementById("selboxs");
                    var k= document.getElementById("selboxs").value;
                    var y=k.split('^')[1];
                    var t=k.substr(0, k.indexOf('^'));
                 var c=   x.options[x.selectedIndex].text;
                    var j=c.split('/')[1];
                    if(x!=""){
                  window.open("admin/uploads/Assessments/"+j+"/"+y);


                    }
                    document.getElementById("file2").value=c;
                    document.getElementById("file3").value=t;
                    document.getElementById("file4").value=y;
                }


            </script>
        <div class="col-lg-9" style=" color: #0A62A3;margin:10px;padding:20px 30px; font-family:segoe ui semibold; font-size:16px; height:auto; box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23); ">
            Join Discussion
            <br>   <br>
			<form action="userchat.php"  method="post"> 
            <Select style="width:70%" name="rid">
				<?php 
				        $uids=$_SESSION["userid"];
    $ucsqls= "SELECT * FROM user_courses where userid='$uids' ";
    $ucresultss = $conn->query($ucsqls);
    if ($ucresultss->num_rows > 0) {

        while($row = $ucresultss->fetch_assoc()) {
           if($row['type']=='course'){
             $subids=  $row['subid'];
               $ucsqlss= "SELECT * FROM course where id='$subids' and type='course' ";
               $ucresultsss = $conn->query($ucsqlss);
               if ($ucresultsss->num_rows > 0) {
		  while($row = $ucresultsss->fetch_assoc()) {		?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>

<?php }}}} } ?>
             

				<?php 
				        $uids=$_SESSION["userid"];
    $ucsqls= "SELECT * FROM oc where userid='$uids' ";
    $ucresultss = $conn->query($ucsqls);
    if ($ucresultss->num_rows > 0) {

        while($row = $ucresultss->fetch_assoc()) {
           if($row['category']=='course'){
             $subids=  $row['courseid'];
               $ucsqlss= "SELECT * FROM course where id='$subids' and type='course' ";
               $ucresultsss = $conn->query($ucsqlss);
               if ($ucresultsss->num_rows > 0) {
		  while($row = $ucresultsss->fetch_assoc()) {		?>
                   <option value="<?php echo $row['id'] ?>"<?php echo $row['name'] ?></option>

<?php }}}} } ?>
             

            </Select>
            <button style="width:90px;height:40px" class="button">
                <li class="fa fa-comments"></li>
               Join
            </button>
</form>
        </div>
        </div>

        <br>



        <?php
        $uids=$_SESSION["userid"];
    $ucsql= "SELECT * FROM user_courses where userid='$uids' ";
    $ucresults = $conn->query($ucsql);
    if ($ucresults->num_rows > 0) {

        while($row = $ucresults->fetch_assoc()) {
           if($row['type']=='resource'){
             $subid=  $row['subid'];
               $ucsqls= "SELECT * FROM resources where id='$subid' ";
               $ucresultss = $conn->query($ucsqls);
               if ($ucresultss->num_rows > 0) {

                   while($row = $ucresultss->fetch_assoc()) {
                       $image=$row['image'];
                       $title=$row['name'];
                       $cat=$row['category'];
                       $about=$row['about'];
                       $amount=$row['amount'];
                       $rid=$row['id'];
        ?>


        <div class="col-md-5  col-lg-3" style="margin:12px;  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23); height: 600px">
            <div class="col" style="height:220px">
                <img src="admin/uploads/Resources/<?php echo $title; ?>/image/<?php echo $image; ?>" style="width:100%;height:100%;">
            </div>
            <div class="col" style="height:auto;padding:20px 2px;">

                <center>
                <span style="color:#0A62A3;font-size:20px;     font-family:segoe ui semibold">

               <?php echo $title ?>
                </span>
                    <br>      <br style="line-height:.6">
                    <table style="width:100%;">


                        <tr>
                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                Videos
                            </td>
                            <td style="padding:10px 10px;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                <?php  $ucsqlss= "SELECT  * FROM resources_files where Rid='$subid' and filetype='video' ";
                                $ucresultsss = $conn->query($ucsqlss);

                                      echo $ucresultsss->num_rows ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                Worksheets
                            </td>
                            <td style="padding:10px 10px;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                <?php  $ucsqlss= "SELECT  * FROM resources_files where Rid='$subid' and filetype='worksheet' ";
                                $ucresultsss = $conn->query($ucsqlss);

                                echo $ucresultsss->num_rows ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                Games & Activity Ideas
                            </td>
                            <td style="padding:10px 10px;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                <?php  $ucsqlss= "SELECT  * FROM resources_files where Rid='$subid' and filetype='activity' ";
                                $ucresultsss = $conn->query($ucsqlss);

                                echo $ucresultsss->num_rows ?>
                            </td>
                        </tr>

                        <tr>
                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                Articles
                            </td>
                            <td style="padding:10px 10px;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                <?php  $ucsqlss= "SELECT  * FROM resources_files where Rid='$subid' and filetype='article' ";
                                $ucresultsss = $conn->query($ucsqlss);

                                echo $ucresultsss->num_rows ?>
                            </td>
                        </tr>


                       <?php
                       $instructorsql= "SELECT * FROM instructor where resourceid='$subid'";
                       $instructorresult = $conn->query($instructorsql);
                       if ($instructorresult->num_rows > 0) {

                           while($row = $instructorresult->fetch_assoc()) {
                               $instid=$row['instructorId'];
                               $facultysql= "SELECT * FROM faculty where id='$instid'";
                               $facresult = $conn->query($facultysql);
                               if ($facresult->num_rows > 0) {

                                   while($row = $facresult->fetch_assoc()) {
                                       $fname=$row['fname'];
                                       $lname=$row['lname'];
                                       $fimage=$row['imageName'];
                                       ?>

                                       <tr>
                                       <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                Instructor Name
                            </td>
                            <td style="padding:10px 10px;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                <?php echo $fname ?>
                            </td>

                        </tr>   <?php }} }}?>


                    </table>

                    <br>

                </center><form action="dashboard_res.php" method="post">
                    <input type="hidden" value="<?php echo $subid ?>" name="rid">
                <button style="width: 90%;" class="button">
                    View Resource
                </button>
                </form>
            </div>

        </div>
<?php } }}  if($row['type']=='course'){
            $subid=  $row['subid'];
            $ucsqls= "SELECT * FROM course where id='$subid' ";
            $ucresultss = $conn->query($ucsqls);
            if ($ucresultss->num_rows > 0) {

                while($row = $ucresultss->fetch_assoc()) {
                    $image=$row['image'];
                    $title=$row['name'];
                    $cat=$row['category'];
                    $about=$row['about'];
                    $amount=$row['amount'];
                    $rid=$row['id'];
                    $day=date('d/m/Y');
				    $ht=$row['hours'];
                    $t=strtotime($row['startdate']);
                    $start= date('d/m/Y',$t);
                    $s=strtotime($row['enddate']);
                    $end = date('d/m/Y',$s);
					  $ends = date('Ymd',$s);  $days=date('Ymd');
                    $ctype=$row['type'];
                    $cert=$row['certified'];
               ?>

        <div class="col-md-5 col-lg-3" style=" margin:10px;  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23); height: 640px">
            <div class="col" style="height:220px">
                <img src="admin/uploads/Courses/<?php echo $title; ?>/image/<?php echo $image; ?>" style="width:100%;height:100%;">
            </div>
            <div class="col" style="height:auto;padding:20px 2px;">

                <center>
                <span style="color:#0A62A3;font-size:20px;     font-family:segoe ui semibold">

               <?php echo $title ?>
                </span>
                    <br>      <br style="line-height:.6">
                    <table style="width:100%;">

<?php if($ctype=='course') { ?>
                        <tr>
                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                Start Date<br>
                                <span style="color:#0A62A3;font-size:18px;     font-family:segoe ui semibold">
                                <small> <?php echo $start ?> </small>

                </span>
                            </td>
                            <td style="padding:10px 10px;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                End Date<br>
                                <span style="color:#0A62A3;font-size:18px;     font-family:segoe ui semibold">

                              <small> <?php echo $end ?>  </small>
                </span>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                Videos
                            </td>
<?php $rcsqls= "SELECT * FROM rc where courseId='$subid' ";
$rcresultss = $conn->query($rcsqls);
if ($rcresultss->num_rows > 0) {
$a=0;
    while($row = $rcresultss->fetch_assoc()) {
      $rcd=  $row['resourceId']?>


                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                <?php  $ucsqlsxs= "SELECT  * FROM resources_files where Rid='$rcd' and filetype='video' ";
                                $ucresultssxs = $conn->query($ucsqlsxs);
$r=$ucresultssxs->num_rows +$ucresultssxs->num_rows ;
                                $a=$a+$ucresultssxs->num_rows ;                }
                                echo $a ;    ?>
                            </td>
                        </tr>

        <?php } ?>


                        <tr>
                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                Worksheets
                            </td>
                            <?php $rcsqls1= "SELECT * FROM rc where courseId='$subid' ";
                            $rcresultss1 = $conn->query($rcsqls1);
                            if ($rcresultss1->num_rows > 0) {
                            $a=0;
                            while($row = $rcresultss1->fetch_assoc()) {
                            $rcd=  $row['resourceId']?>


                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                <?php  $ucsqlsxs= "SELECT  * FROM resources_files where Rid='$rcd' and filetype='worksheet' ";
                                $ucresultssxs = $conn->query($ucsqlsxs);
                                $r=$ucresultssxs->num_rows +$ucresultssxs->num_rows ;
                                $a=$a+$ucresultssxs->num_rows ;                }
                                echo $a ;    ?>
                            </td>
                        </tr>

                    <?php } ?>


                        <tr>
                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                Games & Activity Ideas
                            </td>
                            <?php $rcsqls2= "SELECT * FROM rc where courseId='$subid' ";
                            $rcresultss2 = $conn->query($rcsqls2);
                            if ($rcresultss2->num_rows > 0) {
                            $a=0;
                            while($row = $rcresultss2->fetch_assoc()) {
                            $rcd=  $row['resourceId']?>


                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                <?php  $ucsqlsxs= "SELECT  * FROM resources_files where Rid='$rcd' and filetype='activity' ";
                                $ucresultssxs = $conn->query($ucsqlsxs);
                                $r=$ucresultssxs->num_rows +$ucresultssxs->num_rows ;
                                $a=$a+$ucresultssxs->num_rows ;                }
                                echo $a ;    ?>
                            </td>
                        </tr>

                    <?php } ?>




                        <tr>
                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                Games & Activity Ideas
                            </td>
                            <?php $rcsqls3= "SELECT * FROM rc where courseId='$subid' ";
                            $rcresultss3 = $conn->query($rcsqls3);
                            if ($rcresultss3->num_rows > 0) {
                            $a=0;
                            while($row = $rcresultss3->fetch_assoc()) {
                            $rcd=  $row['resourceId']?>


                            <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                <?php  $ucsqlsxs= "SELECT  * FROM resources_files where Rid='$rcd' and filetype='article' ";
                                $ucresultssxs = $conn->query($ucsqlsxs);
                                $r=$ucresultssxs->num_rows +$ucresultssxs->num_rows ;
                                $a=$a+$ucresultssxs->num_rows ;                }
                                echo $a ;    ?>
                            </td>
                        </tr>

                    <?php } ?>


                    </table>
                    <br>

                </center>
                <?php if($ctype=='course' && $cert=='1' && $days>=$ends) {?>

                    <?php
                    $userid=$_SESSION['userid'];
                    $asses = "SELECT * FROM assessment  where course = '$subid'  ";
                    $assessresult= $conn->query($asses);
                    $ascount= $assessresult->num_rows;
                    $asses2 = "SELECT * FROM assessmentfile  where courseid = '$subid' and userid='$userid' ";
                    $assessresult2= $conn->query($asses2);
                    $ascount2= $assessresult2->num_rows;


                    $asses3 = "SELECT * FROM ecert  where courseid = '$subid' and studid='$userid' and status ='0' ";
                    $assessresult3= $conn->query($asses3);
                    $ascount3= $assessresult3->num_rows;
                    $asses4 = "SELECT * FROM ecert  where courseid = '$subid' and studid='$userid' and status ='1' ";
                    $assessresult4= $conn->query($asses4);
                    $ascount4= $assessresult4->num_rows;
                    if($ascount==   $ascount2){
                        $sid=$_SESSION['userid'];
                        $semail=$_SESSION['useremail'];
                        if($ascount4>0){
                            while($row = $assessresult4->fetch_assoc()) {
                                $ct=$row['certificate'];
                                ?>
                                <a href="admin/assets/admin/certificate/<?php echo $ct ?>" target="_blank">
                                    <button style="width: 90%;background: #5FC447" class="button"  >
                                        Download Certificate
                                        <i class="fa fa-certificate"></i>
                                    </button>
                                </a>
                            <?php }}else {
                            if($ascount3<1){
                                ?>
                                <form action="" method="post">
                                    <input type="hidden" value="<?php echo $subid ?>" name="rid">
                                    <input type="hidden" value="<?php echo $subid ?>" name="csid">
                                    <input type="hidden" value="<?php echo $title ?>" name="cname">
                                    <input type="hidden" value="<?php echo $sid ?>" name="sid">
                                    <input type="hidden" value="<?php echo $semail ?>" name="semail">

                                    <input type="hidden" value="<?php echo $ht ?>" name="hours">

                                    <button style="width: 90%;background: #0AA37F" class="button" name="request">
                                        Request Certificate     <i class="fa fa-certificate"></i>
                                    </button>
                                </form>
                            <?php } else { ?>

                                <button style="width: 90%;background: #0A62A3" class="button"  disabled>
                                    E-Cerificate   Processing
                                    <i class="fa fa-clock-o"></i>
                                </button>
                            <?php }} }} ?>
                <form action="dashboard_course.php" method="post">
                    <input type="hidden" value="<?php echo $subid ?>" name="rid">
                    <button style="width: 90%" class="button">
                        View Course
                    </button>
                </form>
            </div>

        </div>
<?php }}}}} ?>


        <?php
        $uidsj=$_SESSION["userid"];
        $ucsqlj= "SELECT * FROM oc where userid='$uidsj'  and status='1'";
        $ucresultsj = $conn->query($ucsqlj);
        if ($ucresultsj->num_rows > 0) {

            while($row = $ucresultsj->fetch_assoc()) {
                if($row['category']=='resource'){
                    $subid=  $row['courseid'];
                    $ucsqls= "SELECT * FROM resources where id='$subid' ";
                    $ucresultss = $conn->query($ucsqls);
                    if ($ucresultss->num_rows > 0) {

                        while($row = $ucresultss->fetch_assoc()) {
                            $image=$row['image'];
                            $title=$row['name'];
                            $cat=$row['category'];
                            $about=$row['about'];
                            $amount=$row['amount'];
                            $rid=$row['id'];
                            ?>


                            <div class="col-md-5  col-lg-3" style="margin:12px;  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);height: 630px">
                                <div class="col" style="height:220px">
                                    <img src="admin/uploads/Resources/<?php echo $title; ?>/image/<?php echo $image; ?>" style="width:100%;height:100%;">
                                </div>
                                <div class="col" style="height:auto;padding:20px 2px;">

                                    <center>
                <span style="color:#0A62A3;font-size:20px;     font-family:segoe ui semibold">

               <?php echo $title ?>
                </span>
                                        <br>      <br style="line-height:.6">
                                        <table style="width:100%;">


                                            <tr>
                                                <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                                    Videos
                                                </td>
                                                <td style="padding:10px 10px;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                                    <?php  $ucsqlss= "SELECT  * FROM resources_files where Rid='$subid' and filetype='video' ";
                                                    $ucresultsss = $conn->query($ucsqlss);

                                                    echo $ucresultsss->num_rows ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                                    Worksheets
                                                </td>
                                                <td style="padding:10px 10px;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                                    <?php  $ucsqlss= "SELECT  * FROM resources_files where Rid='$subid' and filetype='worksheet' ";
                                                    $ucresultsss = $conn->query($ucsqlss);

                                                    echo $ucresultsss->num_rows ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                                    Games & Activity Ideas
                                                </td>
                                                <td style="padding:10px 10px;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                                    <?php  $ucsqlss= "SELECT  * FROM resources_files where Rid='$subid' and filetype='activity' ";
                                                    $ucresultsss = $conn->query($ucsqlss);

                                                    echo $ucresultsss->num_rows ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                                    Articles
                                                </td>
                                                <td style="padding:10px 10px;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                                    <?php  $ucsqlss= "SELECT  * FROM resources_files where Rid='$subid' and filetype='article' ";
                                                    $ucresultsss = $conn->query($ucsqlss);

                                                    echo $ucresultsss->num_rows ?>
                                                </td>
                                            </tr>


                                            <?php
                                            $instructorsql= "SELECT * FROM instructor where resourceid='$subid'";
                                            $instructorresult = $conn->query($instructorsql);
                                            if ($instructorresult->num_rows > 0) {

                                                while($row = $instructorresult->fetch_assoc()) {
                                                    $instid=$row['instructorId'];
                                                    $facultysql= "SELECT * FROM faculty where id='$instid'";
                                                    $facresult = $conn->query($facultysql);
                                                    if ($facresult->num_rows > 0) {

                                                        while($row = $facresult->fetch_assoc()) {
                                                            $fname=$row['fname'];
                                                            $lname=$row['lname'];
                                                            $fimage=$row['imageName'];
                                                            ?>

                                                            <tr>
                                                                <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                                                    Instructor Name
                                                                </td>
                                                                <td style="padding:10px 10px;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                                                    <?php echo $fname ?>
                                                                </td>

                                                            </tr>   <?php }} }}?>


                                        </table>

                                        <br>

                                    </center><form action="dashboard_res.php" method="post">
                                        <input type="hidden" value="<?php echo $subid ?>" name="rid">
                                        <button style="width: 90%;" class="button">
                                            View Resource
                                        </button>
                                    </form>
                                </div>

                            </div>
                        <?php } }}  if($row['category']=='course'){
                    $subid=  $row['courseid'];
                    $ucsqls= "SELECT * FROM course where id='$subid' ";
                    $ucresultss = $conn->query($ucsqls);
                    if ($ucresultss->num_rows > 0) {

                        while($row = $ucresultss->fetch_assoc()) {
                            $image=$row['image'];
                            $title=$row['name'];
                            $cat=$row['category'];
                            $about=$row['about'];
                            $amount=$row['amount'];
                            $rid=$row['id'];
                            $day=date('d/m/Y');
                            $t=strtotime($row['startdate']);
                            $start= date('d/m/Y',$t);
                            $s=strtotime($row['enddate']);
                            $end = date('d/m/Y',$s);
                            $ctype=$row['type'];
                            $cert=$row['certified'];
                            $hr=$row['hours'];
							  $ends = date('Ymd',$s);  $days=date('Ymd');
                            ?>

                            <div class="col-md-5 col-lg-3" style=" margin:10px;  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);">
                                <div class="col" style="height:220px">
                                    <img src="admin/uploads/Courses/<?php echo $title; ?>/image/<?php echo $image; ?>" style="width:100%;height:100%;">
                                </div>
                                <div class="col" style="height:auto;padding:20px 2px;">

                                    <center>
                <span style="color:#0A62A3;font-size:20px;     font-family:segoe ui semibold">

               <?php echo $title ?>
                </span>
                                        <br>      <br style="line-height:.6">
                                        <table style="width:100%;">

<?php if($ctype=='course') { ?>
                                            <tr>
                                                <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                                    Start Date<br>
                                                    <span style="color:#0A62A3;font-size:18px;     font-family:segoe ui semibold">
                                <small> <?php echo $start ?> </small>

                </span>
                                                </td>
                                                <td style="padding:10px 10px;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                                    End Date<br>
                                                    <span style="color:#0A62A3;font-size:18px;     font-family:segoe ui semibold">

                              <small> <?php echo $end ?>  </small>
                </span>
                                                </td>
                                            </tr><?php } ?>
                                            <tr>
                                                <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                                    Videos
                                                </td>
                                                <?php $rcsqls= "SELECT * FROM rc where courseId='$subid' ";
                                                $rcresultss = $conn->query($rcsqls);
                                                if ($rcresultss->num_rows > 0) {
                                                $a=0;
                                                while($row = $rcresultss->fetch_assoc()) {
                                                $rcd=  $row['resourceId']?>


                                                <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                                    <?php  $ucsqlsxs= "SELECT  * FROM resources_files where Rid='$rcd' and filetype='video' ";
                                                    $ucresultssxs = $conn->query($ucsqlsxs);
                                                    $r=$ucresultssxs->num_rows +$ucresultssxs->num_rows ;
                                                    $a=$a+$ucresultssxs->num_rows ;                }
                                                    echo $a ;    ?>
                                                </td>
                                            </tr>

                                            <?php } ?>


                                            <tr>
                                                <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                                    Worksheets
                                                </td>
                                                <?php $rcsqls1= "SELECT * FROM rc where courseId='$subid' ";
                                                $rcresultss1 = $conn->query($rcsqls1);
                                                if ($rcresultss1->num_rows > 0) {
                                                $a=0;
                                                while($row = $rcresultss1->fetch_assoc()) {
                                                $rcd=  $row['resourceId']?>


                                                <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                                    <?php  $ucsqlsxs= "SELECT  * FROM resources_files where Rid='$rcd' and filetype='worksheet' ";
                                                    $ucresultssxs = $conn->query($ucsqlsxs);
                                                    $r=$ucresultssxs->num_rows +$ucresultssxs->num_rows ;
                                                    $a=$a+$ucresultssxs->num_rows ;                }
                                                    echo $a ;    ?>
                                                </td>
                                            </tr>

                                        <?php } ?>


                                            <tr>
                                                <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                                    Games & Activity Ideas
                                                </td>
                                                <?php $rcsqls2= "SELECT * FROM rc where courseId='$subid' ";
                                                $rcresultss2 = $conn->query($rcsqls2);
                                                if ($rcresultss2->num_rows > 0) {
                                                $a=0;
                                                while($row = $rcresultss2->fetch_assoc()) {
                                                $rcd=  $row['resourceId']?>


                                                <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                                    <?php  $ucsqlsxs= "SELECT  * FROM resources_files where Rid='$rcd' and filetype='activity' ";
                                                    $ucresultssxs = $conn->query($ucsqlsxs);
                                                    $r=$ucresultssxs->num_rows +$ucresultssxs->num_rows ;
                                                    $a=$a+$ucresultssxs->num_rows ;                }
                                                    echo $a ;    ?>
                                                </td>
                                            </tr>

                                        <?php } ?>




                                            <tr>
                                                <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                                    Games & Activity Ideas
                                                </td>
                                                <?php $rcsqls3= "SELECT * FROM rc where courseId='$subid' ";
                                                $rcresultss3 = $conn->query($rcsqls3);
                                                if ($rcresultss3->num_rows > 0) {
                                                $a=0;
                                                while($row = $rcresultss3->fetch_assoc()) {
                                                $rcd=  $row['resourceId']?>


                                                <td style="padding:10px 10px;text-align:left;color:#707070;font-size:12px;font-family: segoe ui semibold;">
                                                    <?php  $ucsqlsxs= "SELECT  * FROM resources_files where Rid='$rcd' and filetype='article' ";
                                                    $ucresultssxs = $conn->query($ucsqlsxs);
                                                    $r=$ucresultssxs->num_rows +$ucresultssxs->num_rows ;
                                                    $a=$a+$ucresultssxs->num_rows ;                }
                                                    echo $a ;    ?>
                                                </td>
                                            </tr>

                                        <?php } ?>


                                        </table>
                                        <br>

                                    </center>
                                    <?php if($ctype=='course' && $cert=='1' && $days>= $ends) {?>

                                        <?php
                                        $userid=$_SESSION['userid'];
                                        $asses = "SELECT * FROM assessment  where course = '$subid'  ";
                                        $assessresult= $conn->query($asses);
                                        $ascount= $assessresult->num_rows;
                                        $asses2 = "SELECT * FROM assessmentfile  where courseid = '$subid' and userid='$userid' ";
                                        $assessresult2= $conn->query($asses2);
                                        $ascount2= $assessresult2->num_rows;


                                        $asses3 = "SELECT * FROM ecert  where courseid = '$subid' and studid='$userid' and status ='0' ";
                                        $assessresult3= $conn->query($asses3);
                                        $ascount3= $assessresult3->num_rows;
                                        $asses4 = "SELECT * FROM ecert  where courseid = '$subid' and studid='$userid' and status ='1' ";
                                        $assessresult4= $conn->query($asses4);
                                        $ascount4= $assessresult4->num_rows;
                                        if($ascount==   $ascount2){
                                            $sid=$_SESSION['userid'];
                                            $semail=$_SESSION['useremail'];
                                            if($ascount4>0){
                                                while($row = $assessresult4->fetch_assoc()) {
                                                    $ct=$row['certificate'];
                                                ?>
                                    <a href="admin/assets/admin/certificate/<?php echo $ct ?>" target="_blank">
                                                <button style="width: 90%;background: #5FC447" class="button"  >
                                                    Download Certificate
                                                    <i class="fa fa-certificate"></i>
                                                </button>
                                    </a>
                                            <?php }}else {
                                            if($ascount3<1){
                                            ?>
                                            <form action="" method="post">
                                                <input type="hidden" value="<?php echo $subid ?>" name="rid">
                                                <input type="hidden" value="<?php echo $subid ?>" name="csid">
                                                <input type="hidden" value="<?php echo $title ?>" name="cname">
                                                <input type="hidden" value="<?php echo $sid ?>" name="sid">
                                                <input type="hidden" value="<?php echo $semail ?>" name="semail">

                                                <input type="hidden" value="<?php echo $hr ?>" name="hours">

                                                <button style="width: 90%;background: #0AA37F" class="button" name="request">
                                                    Request Certificate     <i class="fa fa-certificate"></i>
                                                </button>
                                            </form>
                                        <?php } else { ?>

                                                <button style="width: 90%;background: #0A62A3" class="button"  disabled>
                                                 E-Cerificate   Processing
                                                    <i class="fa fa-clock-o"></i>
                                                </button>
                                        <?php }} }} ?>


                                    <form action="dashboard_course.php" method="post">
                                        <input type="hidden" value="<?php echo $subid ?>" name="rid">
                                        <button style="width: 90%" class="button">
                                            View Course
                                        </button>
                                    </form>
                                </div>

                            </div>
                        <?php }}}}} ?>

    </div>

    <br><br>
       <div class="row justify-content-around">
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

       
      <?php $useridd=$_SESSION['userid'];  $ucsqlr= "SELECT * FROM user_notification where userid =$useridd  || userid='0' order by id  desc ";
                $ucresultsr = $conn->query($ucsqlr);
                if ($ucresultsr->num_rows > 0) {

                    while($rows = $ucresultsr->fetch_assoc()) {
			   $atype=$row['type'];
			   if($atype=='course'){
				   $sid=$row['subid'];
				    echo '  <a href="newdes.php?" style="color:#479DFF;font-size: 14px"><b># </b>'.$rows['notification'].'<br> </a> 
			   
			   <font style="color:#707070;font-size:10px">'.$rows['dates'].'</font><br><br> ';
			   }else{ 
			   echo '  <a href="#" style="color:#479DFF;font-size: 14px"><b># </b>'.$rows['notification'].'<br> </a> 
			   
			   <font style="color:#707070;font-size:10px">'.$rows['dates'].'</font><br><br> ';
			   }
					}}?>
			  
			   
			 
    
            </font>



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

</div>

<?php
include ("footer.php");
?>
