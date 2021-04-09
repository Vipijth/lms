<?php
include("header.php");
include ("connection.php");
$userid=$_SESSION['userid'];

$name='';
$lname='';
$email='';
$mob='';
$ask='';
$school='';
$country='';
$state='';
$city='';
$pos='';
$age='';
$exp='';
$qual='';
$usersql= "SELECT * FROM teacherinfo where userid ='$userid' ";
$sliderresult = $conn->query($usersql);
if ($sliderresult->num_rows > 0) {

    while($row = $sliderresult->fetch_assoc()) {
        $name=$row['fname'];
        $lname=$row['lname'];
        $email=$row['email'];
        $mob=$row['mob'];
        $ask=$row['permissionask'];
        $school=$row['currentschool'];
        $country=$row['country'];
        $state=$row['state'];
        $city=$row['city'];
        $pos=$row['currentpos'];
        $age=$row['age'];
        $exp=$row['experience'];
        $qual=$row['qualification'];
    }
}



?>




<style>
    select, #assess{
        width:90%;
        border-radius: 20px;
        border:1px solid #0A62A3;
        font-family: segoe ui regular;
        font-size:13px;
        color:#455A64;
        padding:6px 15px;
    }


    select:focus{
        outline: none;
    }

    .button{

        background:#0A62A3;
        color:white;
        font-family: segoe ui semibold;
        font-size:14px;
        border:none;
        margin:10px;
        padding:10px 20px;

    }
    .button:focus{

        outline:none
    }

</style>



<div class="container-fluid" style="padding-top: 130px">

    <div class="row justify-content-md-center">
        <div class="col-md-9 col-lg-9 col-xl-9" style="font-size:20px;padding:20px 20px;height:auto;font-family: segoe ui regular;color:#455A64">
            Profile
            <br><br>

            <div class="row justify-content-md-around">

                <div class="col-md-5 col-lg-5 " style="height:60px; margin: 10px; box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">

                    <div style="float:left;width:15%;padding:14px">
                        <span style="color:#0A62A3">
                            <big>   <li class="fa fa-user "></li> </big>

                        </span>
                    </div>
                    <div style="float:left;  font-size: 22px; width:85%;padding-top: 15px;text-transform: capitalize">
                        <center>
                            <small><?php echo $name ?> </small>
                        </center>

                    </div>


                </div>

                <div class="col-md-5 col-lg-5 " style="height:60px; margin: 10px;    box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">

                    <div style="float:left;width:15%;padding:15px">
                        <span style="color:#0A62A3">
                                         <big>   <li class="fa fa-user "></li> </big>
                        </span>
                    </div>
                    <div style="float:left; font-size: 22px;width:85%;padding-top: 15px;text-transform: capitalize">
                        <center>
                            <small><?php echo $lname ?> </small>
                        </center>

                    </div>


                </div>
            </div><br>
            <div class="row justify-content-md-around">

                <div class="col-md-5 col-lg-5 " style="height:60px; margin: 6px;   box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">

                    <div style="float:left;width:15%;padding:15px">
                        <span style="color:#0A62A3">
                            <big>   <li class="fa fa-envelope"></li> </big>

                        </span>
                    </div>
                    <div style="float:left;width:85%;padding-top: 15px">
                        <center>
                            <small><?php echo $email ?>  </small>
                        </center>

                    </div>


                </div>

                <div class="col-md-5 col-lg-5 " style="height:60px; margin: 10px;   box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">

                    <div style="float:left;width:15%;padding:15px">
                        <span style="color:#0A62A3">
                          <big> <li class="fa fa-phone"></li></big>
                        </span>
                    </div>
                    <div style="float:left;width:85%;padding-top: 15px">
                        <center>
                            <small><?php echo $mob ?>  </small>
                        </center>

                    </div>


                </div>



            </div>

            <form action="" method="post">
                <div class="row " style="height:60px; margin: 30px;   box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">
                    <div style="float:left;width:75%;padding:15px 30px">

                        <small>Can schools registered with us send to you their recruitment requirement</small>
                    </div>
                    <div style="float:left;width:25%;padding:15px">
                        <center>
                            <small><?php echo $ask ?> </small>
                        </center>
                    </div>
                </div>




                <div class="row " style="height:60px; margin: 30px;   box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">
                    <div style="float:left;width:75%;padding:15px 30px">

                        <small>Your current Age</small>
                    </div>
                    <div style="float:left;width:25%;padding:15px">
                        <center>
                            <small><?php echo $age ?> </small>
                        </center>
                    </div>
                </div>


                <div class="row " style="height:60px; margin: 30px;   box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">
                    <div style="float:left;width:75%;padding:15px 30px">

                        <small>Completed number of years of experience working as teacher</small>
                    </div>
                    <div style="float:left;width:25%;padding:15px">
                        <center>
                            <small><?php echo $exp ?> </small>
                        </center>
                    </div>
                </div>



                <div class="row " style="height:60px; margin: 30px;   box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">
                    <div style="float:left;width:75%;padding:15px 30px">

                        <small>Qualification</small>
                    </div>
                    <div style="float:left;width:25%;padding:15px">
                        <center>
                            <small><?php echo $qual ?> </small>
                        </center>
                    </div>
                </div>



                <div class="row " style="height:60px; margin: 30px;   box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">
                    <div style="float:left;width:75%;padding:15px 30px">

                        <small>Country of current residence</small>
                    </div>
                    <div style="float:left;width:25%;padding:15px">
                        <center>
                            <small><?php echo $country ?> </small>
                        </center>
                    </div>
                </div>






                <div class="row " style="height:60px; margin: 30px;   box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">
                    <div style="float:left;width:75%;padding:15px 30px">

                        <small>State of current residence</small>
                    </div>
                    <div style="float:left;width:25%;padding:15px">
                        <center>
                            <small><?php echo $state ?> </small>
                        </center>
                    </div>
                </div>





                <div class="row " style="height:60px; margin: 30px;   box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">
                    <div style="float:left;width:75%;padding:15px 30px">

                        <small>Town / City of current residence</small>
                    </div>
                    <div style="float:left;width:25%;padding:12px">
                        <center>
                            <small><?php echo $city ?> </small>
                        </center>
                    </div>
                </div>





                <div class="row " style="height:60px; margin: 30px;   box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">
                    <div style="float:left;width:75%;padding:15px 30px">

                        <small>Current School</small>
                    </div>
                    <div style="float:left;width:25%;padding:12px">
                        <center>
                            <small><?php echo $school ?> </small>
                        </center>
                    </div>
                </div>



                <div class="row " style="height:60px; margin: 30px;   box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">
                    <div style="float:left;width:75%;padding:15px 30px">

                        <small>Current Position</small>
                    </div>
                    <div style="float:left;width:25%;padding:12px">
                        <center>
                            <small><?php echo $pos ?> </small>
                        </center>
                    </div>
                </div>



            </form>

        <script>
            populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down
            populateCountries("country2");
            populateCountries("country2");
        </script>

    </div>
</div>
</div>

<?php
include("footer.php");

?>

