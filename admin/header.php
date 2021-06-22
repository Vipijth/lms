<?php
       session_start();
       if($_SESSION["adminemail"]==null){
       
       
           header('Location: error.php?errors=Please Log In');
       }
?>


<!DOCTYPE html>
<html lang="en">
   
   <head>
      <meta charset="UTF-8">
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
      <title>Lms - Admin Dashboard</title>
      <!-- General CSS Files -->
      <link rel="stylesheet" href="assets/admin/css/app.min.css">
      <!-- Template CSS -->
      <link rel="stylesheet" href="assets/admin/css/style.css">
      <link rel="stylesheet" href="assets/admin/css/components.css">
      <!-- Custom style CSS -->
      <link rel="stylesheet" href="assets/admin/css/custom.css">
      <link rel="icon" href="assets/admin//images/logo/logo.png" type="image/png" />
   </head>
   <body>
      <div class="loader"></div>
      <div id="app">
         <div class="main-wrapper main-wrapper-1" >
            <div class="navbar-bg"> </div>
            <nav class="navbar navbar-expand-lg main-navbar sticky" >
               <div class="form-inline mr-auto">
                  <ul class="navbar-nav mr-3">
                     <li>
						 <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn">
							 <i data-feather="align-justify"></i>
						 </a>
					 </li>
                  </ul>
               </div>
               <ul class="navbar-nav navbar-right">
                  <li class="dropdown">
                     <a href="#" data-toggle="dropdown"
                        class="nav-link dropdown-toggle nav-link-lg nav-link-user"> 
						 <img alt="image" src="assets/admin//images/logo/logo.png" class="user-img-radious-style">
						 <span class="d-sm-none d-lg-inline-block"></span>
					  </a>
                     <div class="dropdown-menu dropdown-menu-right pullDown">
                        <div class="dropdown-title">Hello Lms</div>
                        <a href="#" class="dropdown-item has-icon"> 
							<i class="far fa-user"></i> Profile
                        </a>
						<a href="#" class="dropdown-item has-icon"> 
							<i class="fas fa-cog"></i>Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="logout.php" class="dropdown-item has-icon text-danger"> 
							<i class="fas fa-sign-out-alt"></i>Logout
                        </a>
                     </div>
                  </li>
               </ul>
            </nav>
            <?php include ("sidebar.php"); ?>