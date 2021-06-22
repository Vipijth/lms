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

$sqlsj="select * from course where type='module' ";
$courseresultj = $conn->query($sqlsj);
if ($courseresultj->num_rows > 0) {
$count=0;

while($row = $courseresultj->fetch_assoc()) {

    $r = $row['name'] .'(Module)';

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
var input =document.getElementsByClassName("ts");

input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("myBtnj").click();
  }
});
</script>







      <div class="container-fluid">


         <div class="row ">
            <nav class="navbar navbar-expand-lg navbar-light" style="background:#FDA852;height:60px;width:100%;position:fixed;z-index:32;">
               <a class="navbar-brand" href="index.php">
               <img src="assets/user/images/logo/TOD-Logo.png" width="30" id="brands" class="img-fluid" alt="" style="position: relative; top:2px;left:2px;"/>
               </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                     <li class="nav-item" >
                        <a class="nav-link" href="index.php" id="m1" onClick="m1()" ><Small>About Us </Small></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="resource.php" id="m2" ><small>Content</small></a>
                     </li>
                     <li class="nav-item" >
                        <a class="nav-link" href="course.php" id="m3"><small>Courses</small></a>
                     </li>

                     <li class="nav-item">
                        <a class="nav-link" href="blog6.php" id="m5"><Small>Schools</Small></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="faculty.php" id="m6"><Small>Publishers</Small></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="faculty.php" id="m6"><Small>Contact Us</Small></a>
                     </li>

                     <li class="nav-item" style="padding-top: 8px">

<div class="autocomplete" style="width:90%;">

    <form action="search.php"   method="get" id="myForm">
<input  name="search" required class="form-control mr-sm-2 ts" id="myInput" type="search" placeholder="&#xF002; Search " aria-label="Search" style="font-family:Segoe UI,  FontAwesome;font-size:12px;	border-radius:0px !important;">
</div>
</form>
</li>
                  </ul>
               </div>
               </div>

            </nav>
         </div>
      </div>