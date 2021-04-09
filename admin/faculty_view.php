<?php
  session_start();
  if($_SESSION["adminemail"]==null){
  
  
     header('Location: error.php?errors=Please Log In');
  }
include '../connection.php';
$id = $_REQUEST['name'];
include ("header_1.php");
?>




<!DOCTYPE html>
<html lang="en">
   
   <head>
      <meta charset="UTF-8">
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
      <title>Chrysaellect - Admin Dashboard</title>
      <!-- General CSS Files -->
      <link rel="stylesheet" href="../assets/admin/css/app.min.css">
	  <link href="../assets/admin/bundles/lightgallery/dist/css/lightgallery.css" rel="stylesheet">
      <!-- Template CSS -->
      <link rel="stylesheet" href="../assets/admin/css/style.css">
      <link rel="stylesheet" href="../assets/admin/css/components.css">
      <!-- Custom style CSS -->
      <link rel="stylesheet" href="../assets/admin/css/custom.css">
      <link rel="shortcut icon" type="image/x-icon" href="../assets/admin/images/favicon.ico" />
   </head>
   <body>
      <div class="loader"></div>
      <div id="app">
         <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <?php include 'header.php'; ?>
         <?php include 'sidebar.php'; ?>
            <!-- Main Content -->
          
									  <?php   $sql = "SELECT * FROM faculty where id='$id'";
									  $result = $conn->query($sql);
									  if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) {
									  ?>
            <div class="main-content">
               <section class="section">
                  <div class="section-body">
                     <div class="row mt-sm-4">
                        <div class="col-12 col-md-12 col-lg-4">
                           <div class="card author-box">
                              <div class="card-body">
                                 <div class="author-box-center">
                                    <img alt="image" src="assets/admin/images/logo/logo@2x.png" class="author-box-picture">
                                    <div class="clearfix"></div>
                                    <div class="author-box-name">
                                       <a href="#"><?php echo $row['fname']   ?>
                                       <?php echo $row['lname']   ?>
                                    </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        
                        </div>
                        <div class="col-12 col-md-12 col-lg-8">
                           <div class="card">
                              <div class="padding-20">
                                 <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                    <li class="nav-item">
                                       <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                                          aria-selected="true">About</a>
                                    </li>
                                 </ul>
                                 <div class="tab-content tab-bordered" id="myTab3Content">
                                    <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
									   <div class="section-title">About Faculty</div>	
                                       <p class="m-t-30">
                                          
                                       <?php echo $row['about']   ?>
                                       </p>
                                  	
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <?php }} ?>
               </section>
            </div>

         </div>
      </div>
<?php
include ("footer_2.php");
?>