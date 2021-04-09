<?php
session_start();
if($_SESSION["adminemail"]==null){


    header('Location: error.php?errors=Please Log In');
}
include ("connection.php");
include ("header_1.php");

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


        function change(){
            var x=document.getElementById('ctype').value;

            if(x=='course'){
                document.getElementById("check").checked = true;
                document.getElementById("dur").style.display='flex';
                document.getElementById("cbox").style.display='flex';
            }
            else{
                document.getElementById("check").checked = false;
                document.getElementById("dur").style.display='none';
                document.getElementById("cbox").style.display='none';
            }
        }

    </script>


    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="row ">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card l-bg-green">
                        <div class="card-statistic-3">
                            <div class="align-items-center justify-content-between">
                                <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                        <div class="card-content">
                                            <h5 class="font-15">Certificates Created</h5>
                                            <h2 class="mb-3 font-18">

                                                <?php   $checksql3= "SELECT * FROM ecert where status='1'"  ;
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
                    <div class="card l-bg-orange">
                        <div class="card-statistic-3">
                            <div class="align-items-center justify-content-between">
                                <div class="row ">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                        <div class="card-content">
                                            <h5 class="font-15">Certificates Requested</h5>
                                            <h2 class="mb-3 font-18">

                                                <?php   $checksql3= "SELECT * FROM ecert where status='0'"  ;
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
                                            <th>Student Email</th>
                                            <th>Course Name</th>
                                            <th>Course Hours</th>

                                            <th>Actions</th>
                                        </tr>

                                        <?php
                                        $sql = "SELECT * FROM ecert";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                $status=$row['status'];
                                                $ct=$row['certificate'];
                                                ?>
                                                <tr>
                                                    <td class="p-0 text-center">
                                                        <div class="custom-checkbox custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                            <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $row["email"]?></td>


                                                    <td><?php echo $row["course"]?></td>

                                                    <td><?php echo $row["hours"]?></td>


<?php if($status=='0'){?>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="certid" value="<?php echo $row['id'] ?>">
                                                            <input type="hidden" name="email" value="<?php echo $row['email'] ?>">
                                                            <input type="hidden" name="csid" value="<?php echo $row['courseid'] ?>">
                                                            <input type="hidden" name="hours" value="<?php echo $row['hours'] ?>">
                                                            <input type="hidden" name="course" value="<?php echo $row['course'] ?>">
                                                            <input type="hidden" name="sid" value="<?php echo $row['studid'] ?>">
                                                        <button class="btn btn-cyan btn-action mr-1" name="generate" data-toggle="tooltip" title="Generate">
                                                            <i data-feather="award"></i>&nbsp;&nbsp;Generate
                                                        </button>
                                                        </form>

                                                    </td>

                                                    <?php }else { ?>
    <td>
<a href="assets/admin/certificate/<?php echo $ct ?>" target="_blank">
            <button class="btn btn-cyan btn-action mr-1" name="generate" data-toggle="tooltip" title="Generate">
                <i data-feather="award"></i>&nbsp;&nbsp;Awarded
            </button>
</a>

    </td>

                                                    <?php } ?>
                                                </tr>

                                            <?php } }?>
                                    </table>

                        </div>
                    </div>

                </div>
            </div>
    </div>

    </div>
    </div>
    </section>
    </div>

<?php
include ("footer_2.php");
?>