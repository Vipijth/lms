<?php
	include ("connection.php");

	$zid=$_SESSION["adminId"];
	$aemail=$_SESSION["adminemail"];

	$sqlm = "SELECT * FROM admin where id='$zid'";
	$resultm = $conn->query($sqlm);
	if ($resultm->num_rows > 0) {
	 // output data of each row
	 while($row = $resultm->fetch_assoc()) {
	   $slider=$row["slider"];
	   $blogs=$row["blogs"];
	   $resources=$row["resources"];
	   $course=$row["course"];
	   $summit=$row["summit"];
	   $faculty=$row["faculty"];
	   $msg=$row["msg"];
	 
	 }
	}
?>          
            <div class="main-sidebar sidebar-style-2">
               <aside id="sidebar-wrapper">
                  <div class="sidebar-brand">
                     <a href="dashboard.php"> 
						 <img alt="image" src="assets/admin/images/logo/logolms.png" class="header-logo" />
                     </a>
                  </div>
                  <ul class="sidebar-menu">
                     <li class="dropdown ">
                        <a href="dashboard.php" class="nav-link">
							<i data-feather="monitor"></i>
							<span>Dashboard</span>
						</a>
                     </li>

					<?php if($slider=='1'){  ?>
                     <li class="dropdown">
                        <a href="slider.php" class="menu-toggle nav-link">
							<i data-feather="briefcase"></i>
							<span>Slider</span>
						</a>
                     </li>
					<?php }?>

					<?php if($resources=='1'){  ?>
                     <li class="dropdown">
                        <a href="resources.php" class="menu-toggle nav-link">
							<i data-feather="command"></i>
							<span>Resources</span>
						</a>
                     </li>

                     <?php }?>
                     <?php if($course=='1'){  ?>

                     <li class="dropdown">
                        <a href="course.php" class="menu-toggle nav-link">
							<i data-feather="award"></i>
							<span>Courses</span>
						</a>
                     </li>

                     <?php }?>
                     <?php if($summit=='1'){  ?>  
                     <li class="dropdown">
                        <a href="summit.php" class="menu-toggle nav-link">
							<i data-feather="copy"></i>
							<span>Summit</span>
						</a>
                     </li>

                     <?php }?>   
                     <?php if($blogs=='1'){  ?>  
                     <li class="dropdown">
                        <a href="blog.php" class="menu-toggle nav-link">
							<i data-feather="shopping-bag"></i>
							<span>Blogs</span>
						</a>
                     </li>
                     <?php }?>   
                     <?php if($faculty=='1'){  ?>  
                     <li class="dropdown">
                        <a href="faculty.php" class="menu-toggle nav-link">
							<i data-feather="layout"></i>
							<span>Faculty</span>
						 </a>
                     </li>
                     
                
                     <?php }?>   
                     <?php if($msg=='1'){  ?>  
                     <li class="dropdown">
                        <a href="discussion.php" class="menu-toggle nav-link">
							<i data-feather="pie-chart"></i>
							<span>Group Discussions</span>
						</a>
                     </li>
                     
                     <?php }?>   
                  
                     
                     <?php if($aemail=='admin@lms.com'){?>
                        <li class="dropdown">
                        <a href="ecert.php" class="menu-toggle nav-link">
							<i data-feather="feather"></i>
							<span>e-Certificate</span>
						</a>
                     </li>
                     <li class="dropdown">
                        <a href="payment.php" class="menu-toggle nav-link">
							<i data-feather="shopping-cart"></i>
							<span>Payment</span>
						</a>
                     </li>
					 <li class="dropdown">
						 <a href="users.php" class="menu-toggle nav-link">
                     		<i data-feather="user"></i>
                     		<span>User</span>
                     	 </a>
                      </li>
					       <li class="dropdown">
                        <a href="access_control.php" class="menu-toggle nav-link">
							<i data-feather="grid"></i>
							<span>Access Control</span>
						</a>
                     </li>
					  		 <li class="dropdown">
						 <a href="request.php" class="menu-toggle nav-link">
                     		<i data-feather="user-plus"></i>
                     		<span>User Requests</span>
                     	 </a>
                      </li>
                      <?php } ?>
                  </ul>
               </aside>
            </div>