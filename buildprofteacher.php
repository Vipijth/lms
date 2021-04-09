<?php
include("header.php");
include ("connection.php");
$userid=$_SESSION['userid'];

$name='';
$lname='';
$email='';
$mob='';
$usersql= "SELECT * FROM users where id ='$userid' ";
$sliderresult = $conn->query($usersql);
if ($sliderresult->num_rows > 0) {

while($row = $sliderresult->fetch_assoc()) {
    $name=$row['firstname'];
    $lname=$row['lastname'];
    $email=$row['email'];
    $mob=$row['mob'];
}
}



if(isset($_POST["save"])) {
    $allow = $_POST['allow'];
    $school = $_POST['school'];
    $country = $_POST['country'];

    $age= $_POST['age'];
    $pos = $_POST['pos'];
    $qual = $_POST['qual'];
    $exp = $_POST['exp'];
    $city = $_POST['city'];
    $states = $_POST['state'];

    $sql = 'INSERT INTO teacherinfo(fname, lname,email,mob,userid,permissionask,country,state,city,currentschool,currentpos,age,experience,qualification ) VALUES 
   ("'.$name.'","'.$lname.'","'.$email.'","'.$mob.'","'.$userid.'","'.$allow.'","'.$country.'","'.$states.'","'.$city.'","'.$school.'","'.$pos.'","'.$age.'","'.$exp.'","'.$qual.'")';

    if ($conn->query($sql) === TRUE) {
        echo "<script>
alert('Updated successfully');
</script>";
        $last_id = $conn->insert_id;

        header('Location: dashboard.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>




<style>
    select {
        width:90%;
        border-radius: 20px;
        border:0px solid #0A62A3;
        font-family: segoe ui regular;
        font-size:13px;
        color:#455A64;
        padding:6px 15px;
    }


    select:focus{
        outline: none;
    }


    #assess {
        width:85%;
        border-radius: 20px;
        border:0px solid #0A62A3;
        font-family: segoe ui regular;
        font-size:13px;
        color:#455A64;
        padding:6px 15px;
        background: white;
    }


    #assess:focus{
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

            <div class="col-md-5 col-lg-5 " style="height:60px; margin: 10px;    box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">

                    <div style="float:left;width:15%;padding:15px">
                        <span style="color:#0A62A3">
                            <li class="fa fa-user"></li>
                        </span>
                    </div>
                <div style="float:left;width:85%;padding-top: 10px">
                    <center>
                       <small><?php echo $name ?> </small>
                    </center>

                </div>


            </div>

            <div class="col-md-5 col-lg-5 " style="height:60px; margin: 10px;    box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">

                <div style="float:left;width:15%;padding:15px">
                        <span style="color:#0A62A3">
                            <li class="fa fa-user"></li>
                        </span>
                </div>
                <div style="float:left;width:85%;padding-top: 10px">
                    <center>
                        <small><?php echo $lname ?> </small>
                    </center>

                </div>


            </div>
        </div><br>
        <div class="row justify-content-md-around">

        <div class="col-md-5 col-lg-5 " style="height:60px; margin: 10px;   box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">

                <div style="float:left;width:15%;padding:15px">
                        <span style="color:#0A62A3">
                            <li class="fa fa-envelope"></li>
                        </span>
                </div>
                <div style="float:left;width:85%;padding-top: 10px">
                    <center>
                        <small><?php echo $email ?>  </small>
                    </center>

                </div>


            </div>

            <div class="col-md-5 col-lg-5 " style="height:60px; margin: 10px;   box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">

                <div style="float:left;width:15%;padding:15px">
                        <span style="color:#0A62A3">
                            <li class="fa fa-phone"></li>
                        </span>
                </div>
                <div style="float:left;width:85%;padding-top: 10px">
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
                    <select  required name="allow">
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </center>
            </div>
        </div>




        <div class="row " style="height:60px; margin: 30px;   box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">
            <div style="float:left;width:75%;padding:15px 30px">

                <small>Your current Age</small>
            </div>
            <div style="float:left;width:25%;padding:15px">
                <center>
                    <select  required name="age">
                        <option>18-25</option>
                        <option>26-35</option>
                        <option>36-45</option>
                        <option>46-55</option>
                        <option>56 and Above</option>

                    </select>
                </center>
            </div>
        </div>


        <div class="row " style="height:60px; margin: 30px;   box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">
            <div style="float:left;width:75%;padding:15px 30px">

                <small>Completed number of years of experience working as teacher</small>
            </div>
            <div style="float:left;width:25%;padding:15px">
                <center>
                    <select  required name="exp">
                        <option>0</option>
                        <option>1 to 2</option>
                        <option>2 to 5</option>
                        <option>5 to 8</option>
                        <option>8 to 12</option>
                        <option>12 to 15</option>
                        <option>15 years and above</option>
                    </select>
                </center>
            </div>
        </div>



        <div class="row " style="height:60px; margin: 30px;   box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">
            <div style="float:left;width:75%;padding:15px 30px">

                <small>Qualification</small>
            </div>
            <div style="float:left;width:25%;padding:15px">
                <center>
                    <select  required name="qual">
                        <option>12+</option>
                        <option>Bachelors</option>
                        <option>B.Ed</option>
                        <option>Post Grad</option>
                        <option>ECCE</option>
                        <option>Phd</option>

                    </select>
                </center>
            </div>
        </div>



        <div class="row " style="height:60px; margin: 30px;   box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">
            <div style="float:left;width:75%;padding:15px 30px">

                <small>Country of current residence</small>
            </div>
            <div style="float:left;width:25%;padding:15px">
                <center>
                    <script type= "text/javascript" src ="countries.js"></script>
                    <select id="country" name ="country"></select>
                </center>
            </div>
        </div>






        <div class="row " style="height:60px; margin: 30px;   box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">
            <div style="float:left;width:75%;padding:15px 30px">

                <small>State of current residence</small>
            </div>
            <div style="float:left;width:25%;padding:15px">
                <center>
                    <select id="state"  name ="state"></select>
                </center>
            </div>
        </div>





        <div class="row " style="height:60px; margin: 30px;   box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">
            <div style="float:left;width:75%;padding:15px 30px">

                <small>Town / City of current residence</small>
            </div>
            <div style="float:left;width:25%;padding:12px">
                <center>
               <input type="text" id="assess" placeholder="City Name" name="city">
                </center>
            </div>
        </div>





        <div class="row " style="height:60px; margin: 30px;   box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">
            <div style="float:left;width:75%;padding:15px 30px">

                <small>Current School</small>
            </div>
            <div style="float:left;width:25%;padding:12px">
                <center>
                    <input type="text" id="assess" placeholder="Current School Name" name="school">
                </center>
            </div>
        </div>



        <div class="row " style="height:60px; margin: 30px;   box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">
            <div style="float:left;width:75%;padding:15px 30px">

                <small>Current Position</small>
            </div>
            <div style="float:left;width:25%;padding:12px">
                <center>
                    <input type="text" id="assess" placeholder="Current Position" name="pos">
                </center>
            </div>
        </div>



        <div class="row justify-content-end" style="height:60px; margin: 30px;  ">


<button class="button" name="save">
    Save
</button>
            </form>


            <a href="dashboard.php">

                <button  class="button" style=" border:none; background: #0A62A3;color:white;font-family:segoe ui semibold;font-size:12px">
                    Go to Dashboard
                </button>
            </a>
        </div>

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

