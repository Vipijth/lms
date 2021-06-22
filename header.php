<?php
ini_set('session.gc_maxlifetime', 60);
@ob_start();
$sessionTime = 365 * 24 * 60 * 60;
$sessionName = "useremail";

session_set_cookie_params($sessionTime);
session_name($sessionName);
session_start();

if (isset($_COOKIE[$sessionName])) {
    setcookie($sessionName, $_COOKIE[$sessionName], time() + $sessionTime, "/");
}
include ('connection.php');
include ('check_token.php');
?>
<script>
    var countries = [];
</script>

<?php

$sqlsj="select * from course where DATE(startdate) > CURDATE() and  DATE(enddate) > CURDATE()";
$courseresultj = $conn->query($sqlsj);
if ($courseresultj->num_rows > 0) {
$count=0;

while($row = $courseresultj->fetch_assoc()) {

    $r = $row['name'] .'(Course)';

    echo "<script>
   countries.push('$r');

</script>";

}
}

$sqlt="select * from resources";
$courseresultt = $conn->query($sqlt);
if ($courseresultt->num_rows > 0) {
$count=0;

while($row = $courseresultt->fetch_assoc()) {

    $r= $row['name'].'(Resource)';

    echo "<script>
   countries.push('$r');

</script>";


}
}

$sqlk="select distinct keyword from keyword ";
$courseresultk = $conn->query($sqlk);
if ($courseresultk->num_rows > 0) {
$count=0;

while($row = $courseresultk->fetch_assoc()) {

    $r= $row['keyword'];

    echo "<script>
   countries.push('$r');

</script>";


}
}

$sqlkb="select * from blogs ";
$courseresultkb = $conn->query($sqlkb);
if ($courseresultkb->num_rows > 0) {
$count=0;

while($row = $courseresultkb->fetch_assoc()) {

    $r= $row['title'].'(Blog)';

    echo "<script>
   countries.push('$r');

</script>";


}
}

?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
<script>

</script>




<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	   <meta name="description" content="       Chrysaellect M.E.E.T is Asia’s first upskilling and learning platform for teachers, educators, parents and edupreneurs who wish to hone their skills and understanding
               about concepts, theories and pedagogies related to early childhood education.  We bring to you the best faculty from across the globe, 
               each having a specialization in an area connected to early learning.">
          <meta name="keywords" content="">
  <meta name="author" content="5th Dimension Technologies">
      <title>Chrysaellect M.E.E.T</title>
      <!-- Bootstrap CSS -->
	   <link rel="shortcut icon" type="image/png" href="http://meet.chrysaellect.com/assets/user/images/logo/logo.png"/>
<link rel="icon" href="http://meet.chrysaellect.com/assets/user/images/logo/logo.png" type="image/png" />
      <link rel="stylesheet" href="assets/user/css/bootstrap.css">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
      <!-- Custom CSS -->
      <link rel="stylesheet" href="assets/user/css/style.css">
      <link rel="stylesheet" href="assets/user/css/slider.css">
       <link rel="stylesheet" href="assets/user/css/courses.css">
       <link rel="stylesheet" href="assets/user/css/blog.css">
      <link rel="stylesheet" href="assets/user/css/responsive.css">
       <link rel="stylesheet" href="assets/user/css/planner.css">
      <!-- FontAwesome CSS -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
   </head>

   <body style="overflow-x: hidden">

<style>
    body{
        -webkit-user-select: none;
        -webkit-touch-callout: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
</style>

      <div class="container-fluid">


         <div class="row ">
            <nav class="navbar navbar-expand-lg navbar-light" style="background:#EB4C5E;height:60px;width:100%;position:fixed;z-index:1;">
               <a class="navbar-brand" href="index.php">
               <img src="assets/user/images/logo/logo.png" width="60" id="brands" height="60" class="img-fluid" alt="" style="position: relative; top:2px;left:2px;"/>
               </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                     <li class="nav-item" >
                        <a class="nav-link" href="index.html" id="m1" onClick="m1()" ><Small>Home </Small></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="resource.html" id="m2" ><small>Resources</small></a>
                     </li>
                     <li class="nav-item" >
                        <a class="nav-link" href="course.html" id="m3"><small>Courses</small></a>
                     </li>

                     <li class="nav-item">
                        <a class="nav-link" href="blog6.html" id="m5"><Small>Blog</Small></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="faculty.html" id="m6"><Small>Faculty</Small></a>
                     </li>
                     <?php

if (isset($_SESSION['userid'])) {

    ?>
   <li class="nav-item">
                        <a class="nav-link" href="summit.html" id="m6"><Small>Summit</Small></a>
                     </li>
    <?php } ?>



                     <li class="nav-item">
                         <a class="nav-link" href="#ftr" id="m7"><Small>Contact Us</Small></a>
                     </li>

                     <li class="nav-item" style="padding-top: 4px">

                         <div class="autocomplete" style="width:90%;">

                             <form action="search.php"   method="get" id="myForm">
                        <input  name="search" required class="form-control mr-sm-2 example" id="myInput" type="search" placeholder="&nbsp;&nbsp; Let's find out what you are looking for" aria-label="Search" style="font-family:Segoe UI,  FontAwesome;font-size:14px">
       </div>

                     </li>
                      <li class="nav-item" style="padding-top: 26px">


                              <button style="border:none; background:none;color:white" id="myBtnj">
                      <li class="fa fa-search"></li> </button>



                      </li>
                  </form>

                  </ul>


                  <?php

                  if (isset($_SESSION['userid'])) {

                      ?>

<?php if($_SESSION['utype']=='teacher') { ?>

                      <ul class="navbar-nav ml-auto">
                          <li class="nav-item" style="padding-top: 6px">
                              <a class="nav-link" href="cart.php" id="m9">

                                      <button style="border:none; background:none;color:white">
                          <li class="fa fa-shopping-cart"></li> </button>


                               </a>
                          </li>
                          <li class="nav-item" style="padding-top: 3px">
                              <a class="nav-link" href="dashboard.php" id="m9"><small>Dashboard</small> </a>
                          </li>
                          <li class="nav-item" style="padding-top: 3px">
							  <form method="post"> 
								  <?php $usid=$_SESSION['useremail']; ?>
                              <a class="nav-link" href="logout.php?id=<?php echo $usid ?>" id="m9"><small>Logout</small> </a>
								  </form>
                          </li>
                      </ul>

                      <?php } ?>


                   <?php if($_SESSION['utype']=='faculty') { ?>

                          <ul class="navbar-nav ml-auto">

                              <li class="nav-item" style="padding-top: 6px">
                                  <a class="nav-link" href="facdash.php" id="m9"><small>Dashboard</small> </a>
                              </li>
                              <li class="nav-item" style="padding-top: 6px">
                                  <a class="nav-link" href="logout.php" id="m9"><small>Logout</small> </a>
                              </li>
                          </ul>

                      <?php } ?>


                      <?php if($_SESSION['utype']=='school') { ?>

                          <ul class="navbar-nav ml-auto">

                              <li class="nav-item" style="padding-top: 6px">
                                  <a class="nav-link" href="school_dashboard.php" id="m9"><small>Dashboard</small> </a>
                              </li>
                              <li class="nav-item" style="padding-top: 6px">
                                  <a class="nav-link" href="logout.php" id="m9"><small>Logout</small> </a>
                              </li>
                          </ul>

                      <?php } ?>

                   <?php }    else{  ?>
                      <ul class="navbar-nav ml-auto">

                          <li class="nav-item" style="padding-top: 6px">
                              <a class="nav-link" href="login.php" id="m9"> Login</a>
                          </li>
                      </ul>
                   <?php }   ?>
               </div>
               </div>

            </nav>
         </div>
      </div>