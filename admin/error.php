<?php

include ("connection.php");

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $sql = "SELECT * FROM admin where email like '$email'";
    $result = $conn->query($sql);

    $psd = $_POST['password'];
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            if ($email == $row["email"]) {

                if ($psd == $row["password"]) {

                    session_start();
                    $_SESSION["adminemail"] = $row["email"];
                    $_SESSION["adminId"] = $row["id"];
                    header('Location: dashboard.php');

                } elseif ($psd != $row["password"]) {

                    $error = 'Incorrect Password';
                    //header('Location: error.php?errors=Incorrect Password');
                    echo "<script>alert('Incorrect Password');

                           </script>";

                }
            }

        }

    } else {
        echo "<script>alert('Account Not Exists')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>

      <meta charset="UTF-8">
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
      <title>Chrysaellect - Admin Dashboard</title>
      <!-- General CSS Files -->
      <link rel="stylesheet" href="assets/admin//css/app.min.css">
      <link rel="stylesheet" href="assets/admin//bundles/bootstrap-social/bootstrap-social.css">
      <!-- Template CSS -->
      <link rel="stylesheet" href="assets/admin//css/style.css">
      <link rel="stylesheet" href="assets/admin//css/components.css">
      <!-- Custom style CSS -->
      <link rel="stylesheet" href="assets/admin//css/custom.css">
 


   </head>
   <body>

      <div class="loader"></div>
      <div id="app">
         <section class="section">
            <div class="container mt-5">
               <div class="row">
                  <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                     <div class="card card-primary">
                        <div class="card-header">
						   <div class="row clearfix">
							   <div class="col-md-6">
								   <img src="assets/admin//images/logo/logo.png" class="img-fluid" alt="" /> <br/>
							   </div>
							   <div class="col-md-6">
								   <h4>Login</h4>
							   </div>
						   </div>
                        </div>
                        <div class="card-body">
                           <form method="POST" action=" " class="needs-validation" autocomplete="on"  modelAttribute="admin"  novalidate="">
                              <div class="form-group">
                                 <label for="email">Email</label>
                                 <input id="email" type="email" class="form-control" required name="email" tabindex="1" autofocus id="email">
                                 <div class="invalid-feedback">
                                    Please fill in your email
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                    <div class="float-right">
                                       <a href="auth-forgot-password.html" class="text-small">
                                       Forgot Password?
                                       </a>
                                    </div>
                                 </div>


                                 <input id="password" type="password" minlength="8"  maxlength="16" autofocus  required class="form-control" id="password" name="password" tabindex="2">
                                 <div class="valid-feedback">

                                 </div>
                                   <div class="invalid-feedback">
                                             Password must be 8 to 16 .
                                      </div>
                                            <div class="col-sm-12">
                                              <small id="passwordHelp" class="text-danger"><b>

                                      <?php 
                                      $param = $_REQUEST['errors'];
                                      
                                      
                                      echo $param; ?>



                                        </small></b>
                                            </div>
                              </div>
                              <div class="form-group">
                                 <div class="custom-control custom-checkbox">

                                   <input type="checkbox" name="remember"  class="custom-control-input" tabindex="3" id="remember-me">


                                    <label class="custom-control-label" for="remember-me">Remember Me</label>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                 Login
                                 </button>

                  </div>
                           </form>
                        </div>
                     </div>


                  </div>
               </div>
            </div>
         </section>
      </div>
      <!-- General JS Scripts -->
      <script src="assets/admin//js/app.min.js"></script>
      <!-- JS Libraies -->
      <!-- Page Specific JS File -->
      <!-- Template JS File -->
      <script src="assets/admin//js/scripts.js"></script>
      <!-- Custom JS File -->
      <script src="assets/admin//js/custom.js"></script>
   </body>
</html>