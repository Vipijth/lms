<?php
session_start();
if($_SESSION["adminemail"]==null){


    header('Location: error.php?errors=Please Log In');
}
include ("connection.php");
include ("header_1.php");



if(isset($_POST["Delete"])) {
    $cartid = $_POST["oid"];
    $sql = "delete from users  WHERE id='$cartid'";
    $conn->query($sql);
}


if(isset($_POST["Deletefac"])) {
    $cartid = $_POST["oid"];
	  $omail = $_POST["omail"];
    $sql = "delete from users  WHERE id='$cartid'";
    $conn->query($sql);
	   $sqls = "delete from faculty  WHERE email like '$omail'";
    $conn->query($sqls);
}
?>
    <style>
        textarea:focus{outline :none; border:none;}

    </style>

    <script>


        function pay(){
            if( document.getElementById("category").value=="free"){
                document.getElementById("amount").style.display="none";
                document.getElementById("am").value="0";
            }

            if( document.getElementById("category").value=="paid"){
                document.getElementById("amount").style.display="flex";
                document.getElementById("am").value="";
            }


        }
        function keyword(){
            document.getElementById("key").style.display="flex";
        }
        function fileValidation() {

            var fileInput =
                document.getElementById('image-upload');

            var filePath = fileInput.value;

            // Allowing file type
            var allowedExtensions =
                /(\.jpg|\.jpeg|\.png|\.gif)$/i;

            if (!allowedExtensions.exec(filePath)) {
                alert('Invalid file type');
                fileInput.value = '';
                return false;
            }
            else
            {

                // Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById(
                            'image-preview').style.backgroundImage  =
                            'url('+ e.target.result
                            + ') ';
                    };

                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }


    </script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script>
$(document).ready(function() {
    $('#examples').DataTable();
} );
</script><script>
$(document).ready(function() {
    $('#examplez').DataTable();
} );
</script>
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="row ">
            
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card l-bg-orange">
                        <div class="card-statistic-3">
                            <div class="align-items-center justify-content-between">
                                <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                        <div class="card-content">
                                            <h5 class="font-15">Verified Users</h5>
                                            <h2 class="mb-3 font-18">
											
											    <?php
                                $sql = "SELECT * FROM users where usertype='teacher' and verified='1'";
                                $result = $conn->query($sql);
                                echo $result->num_rows; ?>
											
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
                    <div class="card l-bg-purple">
                        <div class="card-statistic-3">
                            <div class="align-items-center justify-content-between">
                                <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                        <div class="card-content">
                                            <h5 class="font-15">Verified Meet Faculty </h5>
                                            <h2 class="mb-3 font-18">    <?php
                                $sql = "SELECT * FROM users where usertype='faculty' and verified='1'";
                                $result = $conn->query($sql);
                                echo $result->num_rows; ?></h2>
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
                    <div class="card l-bg-cyan">
                        <div class="card-statistic-3">
                            <div class="align-items-center justify-content-between">
                                <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                        <div class="card-content">
                                            <h5 class="font-15"> Verfied Schools</h5>
                                            <h2 class="mb-3 font-18">    <?php
                                $sql = "SELECT * FROM users where usertype='school' and verified='1'";
                                $result = $conn->query($sql);
                                echo $result->num_rows; ?></h2>
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
                            <h2>Users</h2><br>
                        </div>
                        <div class="card-body p-0">
                            <form method="post">
                                <div class="table-responsive" >


                                    <table class="table table-striped" id="example" style="width:109% !important" >
                                             <thead>
											 <tr>
                                            <th class="text-center">
                                                <div class="custom-checkbox custom-checkbox-table custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>Name</th>
                                        
                                            <th>Email</th>
											    <th>Last Name</th>
                                            <th>Mobile</th>
                                            <th>Verified</th>
											<th>Delete</th>

                                        </tr>
									</thead>
                                        <?php
                                        $sql = "SELECT * FROM users where usertype='teacher'";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td class="p-0 text-center">
                                                        <div class="custom-checkbox custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                            <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $row["firstname"]?></td>


                                                    <td><?php echo $row["email"]?></td>

                                                    <td><?php echo $row["lastname"]?></td>


                                                    <td><?php echo $row["mob"]?></td>

                                                    <td><?php if($row['verified']=='1'){
                                                        echo 'Yes';
                                                        }
                                                        else{
                                                            echo 'No';
                                                        }

                                                        ?></td>

         <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="oid" value="<?php echo $row['id'] ?>">
                                                         
                                                            
                                                        <button class="btn btn-danger btn-action mr-1" name="Delete" data-toggle="tooltip" title="Delete"  onclick="return confirm('Do you want to delete?');" >
                                                            Delete&nbsp;&nbsp;<i data-feather="trash-2"></i>
                                                        </button>
                                                        </form>

                                                    </td>
                                                </tr>

                                            <?php } }?>
                                    </table>
                            </form>
                        </div>
                    </div>

                </div>
            </div>









    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Faculty</h2><br>
                </div>
                <div class="card-body p-0">
                    <form method="post">
                        <div class="table-responsive" style="overflow:hidden">
                            <table class="table table-striped"  id="examples" style="width:121% !important;">
                              
						          <thead>
											 <tr>
                                            <th class="text-center">
                                                <div class="custom-checkbox custom-checkbox-table custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>Name</th>
                                       
                                            <th>Email</th>
											     <th>Last Name</th>
                                            <th>Mobile</th>
                                            <th>Verified</th>
											<th>Delete</th>

                                        </tr>
									</thead>

                                <?php
                                $sql = "SELECT * FROM users where usertype='faculty'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td class="p-0 text-center">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                    <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td><?php echo $row["firstname"]?></td>


                                            <td><?php echo $row["email"]?></td>

                                            <td><?php echo $row["lastname"]?></td>


                                            <td><?php echo $row["mob"]?></td>

                                            <td><?php if($row['verified']=='1'){
                                                    echo 'Yes';
                                                }
                                                else{
                                                    echo 'No';
                                                }

                                                ?></td>

         <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="oid" value="<?php echo $row['id'] ?>">
                                                         <input type="hidden" name="omail" value="<?php echo $row['email'] ?>">
                                                            
                                                        <button class="btn btn-danger btn-action mr-1" name="Deletefac" data-toggle="tooltip" title="Delete"  onclick="return confirm('Do you want to delete?');" >
                                                            Delete&nbsp;&nbsp;<i data-feather="trash-2"></i>
                                                        </button>
                                                        </form>

                                                    </td>
                                        </tr>

                                    <?php } }?>
                            </table>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Schools</h2><br>
                </div>
                <div class="card-body p-0">
                    <form method="post">
                        <div class="table-responsive">
                       <table class="table table-striped"  id="examplez" style="width:111% !important;">
                              
						          <thead>
											 <tr>
                                            <th class="text-center">
                                                <div class="custom-checkbox custom-checkbox-table custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>Name</th>
                                       
                                            <th>Email</th>
											     <th>Last Name</th>
                                            <th>Mobile</th>
                                            <th>Verified</th>
											<th>Delete</th>

                                        </tr>
									</thead>

                                <?php
                                $sql = "SELECT * FROM users where usertype='school'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td class="p-0 text-center">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                    <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td><?php echo $row["firstname"]?></td>


                                            <td><?php echo $row["email"]?></td>

                                            <td><?php echo $row["lastname"]?></td>


                                            <td><?php echo $row["mob"]?></td>

                                            <td><?php if($row['verified']=='1'){
                                                    echo 'Yes';
                                                }
                                                else{
                                                    echo 'No';
                                                }

                                                ?></td>
         <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="oid" value="<?php echo $row['id'] ?>">
                                                         
                                                            
                                                        <button class="btn btn-danger btn-action mr-1" name="Delete" data-toggle="tooltip" title="Delete"  onclick="return confirm('Do you want to delete?');" >
                                                            Delete&nbsp;&nbsp;<i data-feather="trash-2"></i>
                                                        </button>
                                                        </form>

                                                    </td>

                                        </tr>

                                    <?php } }?>
                            </table>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
    </section>
    </div>


			<footer class="main-footer">
               <div class="footer-left">
                  <a href="5thdt.com">Crafted by 5TH Dimension Technologies</a>
               </div>
               <div class="footer-right">
               </div>
            </footer>
         </div>
      </div>
      <!-- General JS Scripts -->

      <!-- JS Libraies -->
	    <script src="assets/admin/js/app.min.js"></script>
     
      <script src="assets/admin/bundles/lightgallery/dist/js/lightgallery-all.js"></script>
      <script src="assets/admin/js/page/light-gallery.js"></script>
	  <script src="assets/admin/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
	  <script src="assets/admin/bundles/summernote/summernote-bs4.js"></script>
	  <script src="assets/admin/bundles/dropzonejs/min/dropzone.min.js"></script>
	  <script src="assets/admin/js/page/multiple-upload.js"></script>
	  <script src="assets/admin/js/page/widget-data.js"></script> 
      <!-- Page Specific JS File -->
      <script src="assets/admin/js/page/index.js"></script>
      <!-- Template JS File -->
      <script src="assets/admin/js/scripts.js"></script>
      <!-- Custom JS File -->
	  <script src="assets/admin/js/custom.js"></script>
	  //<script src="assets/admin/js/resourceval.js"></script>
	  <script src="assets/admin/bundles/jquery-selectric/jquery.selectric.min.js"></script>
   </body>
   
</html>
?>