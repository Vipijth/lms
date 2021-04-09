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


    </script>


    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="row ">
          
    
      
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Order Details</h4>
                        </div>
                        <div class="card-body p-0">
                            <form method="post">
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
                                            <th>Item Name</th>
                                            <th>Category</th>
                                            <th>Amount</th>
                                            <th>Order ID</th>
                                            <th>Date</th>
                                        </tr>

                                        <?php
                                        $sql = "SELECT * FROM oc where status ='1'";
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
                                                    <td><?php echo $row["useremail"]?></td>


                                                    <td><?php echo $row["sub"]?></td>

                                                    <td><?php echo $row["category"]?></td>


                                                    <td><?php echo $row["amount"]?></td>

                                             
                                                    <td><?php echo $row["orderid"]?></td>


                                                    <td><?php echo $row["tansdate"]?></td>


                                                </tr>

                                            <?php } }?>
                                    </table>
                            </form>
                        </div>
                    </div>

                </div>
     






            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Summit Order Details</h4>
                        </div>
                        <div class="card-body p-0">
                            <form method="post">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr>
                                            <th class="text-center">
                                                <div class="custom-checkbox custom-checkbox-table custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>Student Name</th>
                                       
                                            <th>Amount</th>
                                            <th>Order ID</th>
                                            <th>Date</th>
                                        </tr>

                                        <?php
                                        $sql = "SELECT * FROM summitusers where type='paid' and status ='1'";
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
                                                    <td><?php echo $row["username"]?></td>


                                                  


                                                    <td><?php echo $row["amount"]?></td>

                                             
                                                    <td><?php echo $row["orderid"]?></td>


                                                    <td><?php echo $row["date"]?></td>


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

<?php
include ("footer_2.php");
?>