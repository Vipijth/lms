<?php
include("header.php");
include ("connection.php");
?>

<div class="container-fluid">
    <div class="row">

        <?php
        $slidersql= "SELECT * FROM slider";
        $sliderresult = $conn->query($slidersql);
        if ($sliderresult->num_rows > 0) {

            while($row = $sliderresult->fetch_assoc()) {
                $image=$row['slider'];
                $title=$row['coupen'];
                $cat=$row['category'];
                if($cat=='faculty' ){
                    ?>
                    <div class="col-md-12"  id="coursebg" style="background-image:url('admin/uploads/slider/<?php echo $image; ?>' )">

                       <!-- <div id="pageimg">
                            <img class="d-block w-100" src="assets/user/images/faculty.png">
                        </div>-->

                    </div>
                <?php }} } ?>
    </div>

    <br>


    <div class="row justify-content-end">
        <div class="col-md-3" style="padding:20px">
            <img src="assets/user/images/crew.png" style="width:90%">
        </div>

    </div>
<br>
    <div class="row justify-content-sm-around">


    <div class="col-md-10">
    <div class="row justify-content-sm-start">



<?php
$coursesql= "SELECT * FROM faculty where verified=1";
$courseresult = $conn->query($coursesql);
if ($courseresult->num_rows > 0) {

    while($row = $courseresult->fetch_assoc()) {
      //  $image=$row['image'];
        ?>
        <div class="col-md-5 col-sm-3 col-lg-3 " id="coursecol" style="height:auto;margin: 20px; box-shadow: 0 19px 38px rgba(0,0,0,0.50), 0 15px 12px rgba(0,0,0,0.22);">
            <div class="row" id="coursebody" style="line-height:1.7;text-align:justify;overflow:hidden;font-size:20px;color:white;font-family:segoe ui semibold;padding:20px 20px;height:100% !important;background: #0A62A3">
                <center>
                   

                    <?php echo $row['title']; ?> <?php echo $row['fname']; ?> <?php echo $row['lname']; ?> </big>
                    <br>  </center>
                    <small>     <small>
                            <?php $xabout=$row['about']; echo substr("$xabout",0,1070); ?>
                        </small>      </small>
                  <br>
              
            </div>
            <div class="row" id="coursecolin" style="height:100% !important;padding:20px 10px;background:none;  ">
                <div class="col">
                    <br>
                    <center>
                        <?php
                                    if($row['imageName']!=''){?>

                        <img src="admin/uploads/faculty/<?php echo $row['imageName']; ?> " id="seimg">
<?php } ?>
                        <br>    <br>
                     <big><span style="color: #455A64"><b>
<?php echo $row['fname']; ?> <?php echo $row['lname']; ?> </b></big><br> <br>
     </center>
                     <?php
                                                   $ab=strip_tags($row['about']);

                                                   echo substr("$ab",0,180).'...'    ?><br><br>
                        </span>

                    </center>
                </div>


            </div>
        </div>


<?php }} ?>


    </div>
    </div>



    </div>   </div>

<br><br>
<?php
include ("footer.php");
?>