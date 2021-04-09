<?php
	include ("header.php");

?>
			<!-- Main Content -->
            <div class="main-content">
               <section class="section">
                  <div class="row ">
                     <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                           <div class="card-statistic-4">
                              <div class="align-items-center justify-content-between">
                                 <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                       <div class="card-content">
                                          <h5 class="font-15">Total Courses</h5>
                                          <h2 class="mb-3 font-18">
                                           <?php   $checksql3= "SELECT * FROM course"  ;
                                              $checkresult3 = $conn->query($checksql3);
                                       echo  $checkresult3->num_rows;

                                                  ?>


                                          </h2>
                                       </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                       <div class="banner-img">
                                          <img src="assets/admin/images/banner/1.png" alt="">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                           <div class="card-statistic-4">
                              <div class="align-items-center justify-content-between">
                                 <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                       <div class="card-content">
                                          <h5 class="font-15">Total Resources</h5>
                                          <h2 class="mb-3 font-18">

                                              <?php   $checksql3= "SELECT * FROM resources"  ;
                                              $checkresult3 = $conn->query($checksql3);
                                              echo  $checkresult3->num_rows;

                                              ?>


                                          </h2>
                                       </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                       <div class="banner-img">
                                          <img src="assets/admin/images/banner/2.png" alt="">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                           <div class="card-statistic-4">
                              <div class="align-items-center justify-content-between">
                                 <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                       <div class="card-content">
                                          <h5 class="font-15">Certified Courses</h5>
                                          <h2 class="mb-3 font-18">
                                                   <?php   $checksql3= "SELECT * FROM course where type='course' and certified='1'"  ;
                                              $checkresult3 = $conn->query($checksql3);
                                              echo  $checkresult3->num_rows;

                                              ?>
                                              
                                              </h2>
                                       </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                       <div class="banner-img">
                                          <img src="assets/admin/images/banner/3.png" alt="">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="card">
                           <div class="card-statistic-4">
                              <div class="align-items-center justify-content-between">
                                 <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                       <div class="card-content">
                                          <h5 class="font-15">e-Certificates</h5>
                                          <h2 class="mb-3 font-18">     <?php   $checksql3= "SELECT * FROM ecert where status='1'"  ;
                                              $checkresult3 = $conn->query($checksql3);
                                              echo  $checkresult3->num_rows;

                                              ?></h2>
                                       </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                       <div class="banner-img">
                                          <img src="assets/admin/images/banner/4.png" alt="">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  
                  <div class="row">
                     <div class="col-12">
                        <div class="card">
                           <div class="card-header">
                              <h4>Courses</h4>
                           </div>
                           <div class="card-body p-0">
                              <div class="table-responsive">
                                 <table class="table table-striped">
                                    <tr>
                                       <th class="text-center">
                                          <div class="custom-checkbox custom-checkbox-table custom-control">
                                             <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                             <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                          </div>
                                       </th>
                                       <th>Name</th>
                                       <th>Members</th>

                                       <th>Start Date</th>
                                       <th>End Date</th>
                                       <th>Type</th>
                                    </tr>

<?php
$coursesql = "SELECT * FROM course";
$courseresult = $conn->query($coursesql);
if ($courseresult->num_rows > 0) {
    // output data of each row
    while($row = $courseresult->fetch_assoc()) {
        ?>


                                    <tr>
                                       <td class="p-0 text-center">
                                          <div class="custom-checkbox custom-control">
                                             <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                             <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                          </div>
                                       </td>
                                       <td><?php echo $row["name"]?></td>
                                       <td class="text-truncate">
                                          0
                                       </td>

                                       <td><?php echo $row["startdate"]?></td>
                                       <td><?php echo $row["enddate"]?></td>
                                        <?php if($row["category"]=='free'){ ?>
                                       <td>
                                          <div class="badge badge-success">Free</div>
                                       </td>
                                          <?php  }  ?>
                                        <?php if($row["category"]=='paid'){ ?>
                                            <td>
                                                <div class="badge badge-danger">paid</div>
                                            </td>
                                        <?php  }  ?>
                                    </tr>
                            
                              
                               <?php }} ?>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6 col-lg-12 col-xl-6">
                        <div class="card">
                           <div class="card-header">
                              <h4>Resources</h4>
                           </div>
                           <div class="card-body">
                              <div class="table-responsive">
                                 <table class="table table-hover mb-0">
                                    <thead>
                                       <tr>
                                          <th>#</th>
                                          <th>Name</th>
										  <th>Type</th>

                                          <th>Amount(all in INR)</th>
                                       </tr>
                                    </thead>
                                    <tbody>
<?php
$resourcesqls = "SELECT * FROM resources";
$resourceresults = $conn->query($resourcesqls);
if ($resourceresults->num_rows > 0) {
    // output data of each row
    while($row = $resourceresults->fetch_assoc()) {
        ?>
                                       <tr>
                                          <td></td>
                                          <td><?php echo $row["name"]?></td>
                                           <?php if($row["category"]=='free'){ ?>
                                               <td>
                                                   <div class="badge badge-success">Free</div>
                                               </td>
                                           <?php  }  ?>
                                           <?php if($row["category"]=='paid'){ ?>
                                               <td>
                                                   <div class="badge badge-danger">paid</div>
                                               </td>
                                           <?php  }  ?>

                                          <td><?php echo $row["amount"]?></td>
                                       </tr>
                              
                                     <?php }} ?>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
					 <div class="col-md-6 col-lg-12 col-xl-6">
                        <div class="card">
                           <div class="card-header">
                              <h4>Payments History</h4>
                           </div>
                           <div class="card-body">
                              <div class="table-responsive">
                                 <table class="table table-hover mb-0">
                                    <thead>
                                       <tr>
                                          <th>#</th>
                                          <th>Course Name</th>
                                          <th>Date</th>
                                          <th>categoryd</th>
                                          <th>Amount(all in INR)</th>
                                       </tr>
                                    </thead>
                                    <tbody>

<?php
$resourcesqls = "SELECT * FROM oc where status= '1'";
$resourceresults = $conn->query($resourcesqls);
if ($resourceresults->num_rows > 0) {
    // output data of each row
    while($row = $resourceresults->fetch_assoc()) {
        ?>
                                       <tr>
                                          <td></td>
                                          <td><?php echo $row["sub"]?></td>
                                           <td><?php echo $row["tansdate"]?></td>
                                        <td><?php echo $row["category"]?></td>
                                          <td><?php echo $row["amount"]?></td>
                                       </tr>
                              
                                     <?php }} ?>

                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
            </div>
<?php
	include ("footer.php");
?>