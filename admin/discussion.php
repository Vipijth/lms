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
                                            <h5 class="font-15">Total Discussions</h5>
                                            <h2 class="mb-3 font-18">
<?php
        $slidersql= "SELECT  * FROM discussion";
        $sliderresult = $conn->query($slidersql);
    echo $sliderresult->num_rows; ?>

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
         

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Group Discussions</h4>
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
                                            <th>Course Name</th>
                                            <th>Created Date</th>
                                            <th>Title</th>

                                            <th>Actions</th>
                                        </tr>
<?php
        $slidersql= "SELECT  * FROM discussion";
        $sliderresult = $conn->query($slidersql);
        if ($sliderresult->num_rows > 0) {

            while($row = $sliderresult->fetch_assoc()) { ?>
                                 
                                                <tr>
                                                    <td class="p-0 text-center">
                                                        <div class="custom-checkbox custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                            <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td>
													
													<?php echo $row['course'] ?>
													
													</td>


                                                    <td>	<?php echo $row['startdate'] ?></td>

                                                    <td><?php echo $row['title'] ?></td>


                     <td>
                                                        <form action="discussion_form.php" method="post">
                                                          <input type="hidden" value="<?php echo $row['id']?> " name="disid">
															 <input type="hidden" value="<?php echo $row['topic']?> " name="topic">
															 <input type="hidden" value="<?php echo $row['username']?> " name="uname">
															 <input type="hidden" value="<?php echo $row['courseid']?> " name="subid">
                                                        <button class="btn btn-primary btn-action mr-1" name="generate" data-toggle="tooltip" title="Join Discussion">
                                                            <i class="fas fa-comment-alt"></i>&nbsp;&nbsp;Join
                                                        </button>
                                                        </form>

                                                    </td>

                                                    

                                                </tr>
<?php }} ?>
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