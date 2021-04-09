<?php
include("header.php");
include ("connection.php");
$id = $_REQUEST['valido'];

$psd=$_POST['password'];
$error = '';
$oid=substr($id, 0, -6);
$error = '<label class="text-success">  ' . $oid . '    </label>';
if(isset($_POST["submit"])) {

    $sql = "UPDATE users SET password='$psd' WHERE email='$oid'";

    if ($conn->query($sql) === TRUE) {
        echo " <script>alert(' password Successfully Changed'); </script> " ;
       // header('Location: login.php');

echo "
     <script>
         setTimeout(function(){
            window.location.href = 'logs.php';
         }, 1000);
      </script>";

    } else {
        $error = '<label class="text-success">Something Wrong..!Try Again Later.</label>';
    }


}

?>
<style>

    .button{
        background: #EB4C5E;
        font-size: 14px;
        color:white;
        font-family: segoe ui semibold;
        padding:5px 16px;
        border: 0px;

    }
    select ,input{
        color:#455A64;
        width:90%;
        height:35px;
        background: white;
        border-radius: 15px;
        border: 1px solid #F8ADB6;
        font-family: segoe ui regular;
        font-size: small;
        padding-left: 10px;
    }
    input, select:focus{

        outline:none
    }
</style>


<script>
    function check(){

        var psd=document.getElementById("psd").value;
        var xpsd=document.getElementById("cpsd").value;
        if(psd!=xpsd){
            alert("passwords are not same...!");
            document.getElementById("cpsd").value='';
        }

    }
</script>

<div class="container-fluid">
    <div class="row justify-content-end"  style="height: auto;padding:10%" >


        <div class="col-md-7" style="height:auto">
            <div class="row justify-content-center">
                <img src="assets/user/images/logindemo.png">
            </div>
            <div class="row justify-content-center">

                <div class="col-md-6 col-lg-6" >

                    <form action="" method="post">    <br>
                        <?php echo $error; ?><br>

                        <div class="row justify-content-center">



                        </div>
                        <br>
                        <div class="row" style="height:30px;" id="password" >
                            <input type="password" name="password"  id="psd" placeholder="New Password" maxlength="16" required minlength="8"  onchange="this.style.border='1px solid #EB4C5E'"   >
                            <i class="fa fa-lock phone icon" id="lock" style="color: #EB4C5E;position: relative;left:80%;top: -120%"></i>
                        </div>
   <br>
                        <div class="row" style="height:30px;" id="password" >
                            <input type="password" name="cpassword" id="cpsd" placeholder="Confirm Password" maxlength="16" required minlength="8" onchange="check()" >
                            <i class="fa fa-lock phone icon" id="lock" style="color: #EB4C5E;position: relative;left:80%;top: -120%"></i>
                        </div>
                </div>



            </div>
            <br>
            <center>

                <button name="submit" class="button" id="reset">
                 Reset Password
                </button> </form>
            </center>       <br>
            <center>


                <a href="login.php">  <button class="button" id="login" style="display: none" >
                       Log In
                    </button> </a>
            </center>       <br><br>

        </div>
        <div class="col-md-3"   >
            <img class="d-block w-100" src="assets/user/images/login.png" >
        </div>

    </div>

</div>
<?php
include ("footer.php");


?>
