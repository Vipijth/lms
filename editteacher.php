<?php
include("header.php");
include ("connection.php");
$userid=$_SESSION['userid'];

$name='';
$lname='';
$email='';
$mob='';
$psd='';
$usersql= "SELECT * FROM users where id ='$userid' ";
$sliderresult = $conn->query($usersql);
if ($sliderresult->num_rows > 0) {

    while($row = $sliderresult->fetch_assoc()) {
        $name=$row['firstname'];
        $lname=$row['lastname'];
        $email=$row['email'];
        $mob=$row['mob'];
        $psd=$row['password'];
      
    }
}


if(isset($_POST["save"])) {
    $fnames = $_POST['fname'];
    $lnames = $_POST['lname'];
    $pe= $_POST['psd'];

    $mobs= $_POST['mob'];
 

    $sql = "update users set firstname ='$fnames',lastname='$lnames',password='$pe',mob='$mobs' where id ='$userid' ";

    if ($conn->query($sql) === TRUE) {
       echo " <script>alert('Updated Changed'); </script> " ;
       // header('Location: login.php');

echo "
     <script>
         setTimeout(function(){
            window.location.href = 'dashboard.php';
         }, 200);
      </script>";
        $last_id = $conn->insert_id;

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

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

        <div class="row justify-content-md-start">

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

       


        </div>

        <form action="" method="post">
 

    <div class="row " style="height:60px; margin: 30px;   box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">
            <div style="float:left;width:75%;padding:15px 30px">

                <small>First Name</small>
            </div>
            <div style="float:left;width:25%;padding:12px">
                <center>
                    <input type="text" id="assess" value="<?php echo $name ?>" placeholder="First Name" name="fname">
                </center>
            </div>
        </div>


    <div class="row " style="height:60px; margin: 30px;   box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">
            <div style="float:left;width:75%;padding:15px 30px">

                <small>Last Name</small>
            </div>
            <div style="float:left;width:25%;padding:12px">
                <center>
                    <input type="text" id="assess" value="<?php echo $lname ?>" placeholder="Last Name" name="lname">
                </center>
            </div>
        </div>






        <div class="row " style="height:60px; margin: 30px;   box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">
            <div style="float:left;width:75%;padding:15px 30px">

                <small>Mobile Number</small>
            </div>
            <div style="float:left;width:25%;padding:12px">
                <center>
                    <input type="text" id="assess" value="<?php echo $mob ?>" placeholder="Mobile Number" name="mob">
                </center>
            </div>
        </div>



        <div class="row " style="height:60px; margin: 30px;   box-shadow: 0 11px 11px rgba(0,0,0,0.15), 0 4px 14px rgba(0,0,0,0.22);">
            <div style="float:left;width:75%;padding:15px 30px">

                <small>Password</small>
            </div>
            <div style="float:left;width:25%;padding:12px">
                <center>
                    <input type="password" id="assess" value="<?php echo $psd ?>" placeholder="Current Position" name="psd">
                </center>
            </div>
        </div>



        <div class="row justify-content-end" style="height:60px; margin: 30px;  ">


<button class="button" name="save">
    Save
</button>
            </form>


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

