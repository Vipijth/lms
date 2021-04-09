<?php
include ("header.php");
include ("connection.php");

$error='';
if(isset($_POST["submit"])) {
    $postmail = $_POST["email"];
    $postpassword=$_POST["password"];

$sqlpost="select * from users where email like '$postmail' ;";
    $resultpost = $conn->query($sqlpost);
    if ($resultpost->num_rows > 0) {
        while($row = $resultpost->fetch_assoc()) {
          if($postpassword!=$row["password"]){
              echo "<script> alert('Incorrect Password') </script>";
          }
          else{
              if($row["verified"]=='0'){
                  $rand3 = rand(1000000000, 9000000000);
                  session_start();

                  header('Location: verify.php?valido='.$postmail.'_%44s921&81'.$rand3);
              }
              else{
                  $lastlog=date("Y-m-d");
                  session_start();

                 if($row["usertype"]=='teacher'){
                     $_SESSION["useremail"] = $row["email"];
                     $_SESSION["userid"] = $row["id"];
                     $_SESSION["utype"] = 'teacher';
                     $_SESSION["lastlog"] =   $lastlog;
					$_SESSION["username"] =  ucfirst($row['firstname']).' '.ucfirst($row['lastname']);
                     header('Location: dashboard.php');
                 }
                  if($row["usertype"]=='faculty'){
                      $_SESSION["useremail"] = $row["email"];
                      $_SESSION["userid"] = $row["id"];
                      $_SESSION["utype"] ='faculty';
                      $_SESSION["lastlog"] =   $lastlog;
                      header('Location: facdash.php');
					  	$_SESSION["username"] = ucfirst($row['firstname']).' '.ucfirst($row['lastname']);
                  }
                  if($row["usertype"]=='school'){
                      $_SESSION["useremail"] = $row["email"];
                      $_SESSION["userid"] = $row["id"];
                      $_SESSION["utype"] ='school';
                      $_SESSION["lastlog"] =   $lastlog;
                      header('Location: school_dashboard.php');

                  }
              }

          }
        }
    }
    else{
       echo "<script> alert('Account Not Exists') </script>";
    }


}
    ?>

    <style>

        .button{
            background: #EB4C5E;
            font-size: 14px;
            color:white;
            font-family: segoe ui semibold;
            padding:10px 20px;
            border: 0px;
            width:150px;

        }
        select ,input{
            color:#455A64;
            width:100%;
            height:45px;
            background: white;
            border-radius: 15px;
            border: 0px solid #F8ADB6;
            font-family: segoe ui regular;
            font-size: small;
            padding-left: 10px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
        }
        input, select:focus{

            outline:none
        }
    </style>




    <div class="container-fluid">
        <div class="row justify-content-end"  style="height: auto;padding:10%" >


            <div class="col-md-7" style="height:auto">
                <div class="row justify-content-center">
                    <img src="assets/user/images/logindemo.png">
                </div>
                <div class="row justify-content-center">

                    <div class="col-md-7 col-lg-7" >

<form action="" method="post">
    <?php echo $error; ?><br>

                        <div class="row justify-content-center">
                            <br>


                        </div>
                        <br>

                        <div class="row" style="height:30px;" id="email" >
                            <input type="email" name="email" placeholder="Email Id"  required onchange="this.style.border='1px solid #EB4C5E'">
                            <i class="fa fa-envelope icon" style="color: #EB4C5E;position: relative;left:80%;top: -120%"></i>
                        </div>   <br> <br>
                        <div class="row" style="height:30px;" id="password" >
                            <input type="password" name="password" placeholder="Password" maxlength="16" required minlength="8"  onchange="this.style.border='1px solid #EB4C5E'">
                            <i class="fa fa-lock phone icon" id="lock" style="color: #EB4C5E;position: relative;left:80%;top: -120%"></i>
                        </div>
                    </div>



                </div>
                <br>
                <center>
                    <a  href="forgot.php" style="color: #455A64; font-size: 15px; font-family: segoe ui regular">
                       Forgot Password? </a><br><br>
                    <button name="submit" class="button">
                      Log In
                    </button> </form>
                </center>       <br>
                <center>
                   <span style="color: #455A64; font-size: 15px; font-family: segoe ui regular"> Need new account? </span>
                    <br>   <br>
                   <a href="signup.php">  <button class="button">
                        Sign Up
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