<?php
include("header.php");
include ("connection.php");
$aid=$_SESSION['userid'];

if(isset($_POST["delete"])) {
    $id = $_POST["id"];
    $sql = "delete from blogs  WHERE id='$id'";
    $conn->query($sql);
	    echo " <script>alert(' Deleted Successfully '); </script> " ;
       // header('Location: login.php');

echo "
     <script>
         setTimeout(function(){
            window.location.href = 'dashblog.php';
         }, 200);
      </script>";
}
?>
<script>

    function titles(){
        var topic=document.getElementById("input1").value;
        document.getElementById("topics").innerHTML=topic;
    }
    function about(){
        var topic=document.getElementById("input2").value;
        document.getElementById("about1").innerHTML=topic.substr(0, 350);
        document.getElementById("about2").innerHTML=topic.substr(351, 700);
        document.getElementById("d1").value=topic.substr(0, 1500);
        document.getElementById("d2").value=topic.substr(1500, 3000);
    }


    function a1(){
        var topic=document.getElementById("authors").value;
        document.getElementById("ath1").innerHTML=topic;

    }

    function a2(){
        var topic=document.getElementById("authors1").value;
        document.getElementById("ath2").innerHTML=topic;

    }
    function fileValidation1() {

        var fileInput =
            document.getElementById('coverImage');

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
                        'cover').innerHTML =
                        '<center><img src="' + e.target.result
                        + '"  style="height:185px;width:100%;border-radius:10px;"/></center';
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    }




    function fileValidation2() {

        var fileInput =
            document.getElementById('Image1');

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
                        'img1').innerHTML =
                        '<center><img src="' + e.target.result
                        + '"  style="height:150px;width:100%;border-radius:10px;"/></center';
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    }







    function fileValidation3() {

        var fileInput =
            document.getElementById('Image2');

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
                        'img2').innerHTML =
                        '<center><img src="' + e.target.result
                        + '"  style="height:150px;width:100%;border-radius:10px;"/></center';
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    }




    function reset(){


        document.getElementById('f1').reset();

    }





    function fileValidation4() {

        var fileInput =
            document.getElementById('authorImage');

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
                        'aut').innerHTML =
                        '<center><img src="' + e.target.result
                        + '"  style="height:150px;width:150px;border-radius:60%;"/></center';
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    }


</script>

<style>

	textarea,                                                                                                                                                                                                                                                                                                                                                                                                                                       input:focus{border:none;outline:none;}

</style>
<link rel="stylesheet" href="assets/user/css/user.css">


<div class="container-fluid" style="padding-top: 160px">


    <div class="row justify-content-md-center"  >
        <div class="col-md-6"  >

            <div class="row justify-content-md-center" >

                <div class="col-md-10" id="skillstab">

                </div>
            </div>
        </div>

        <div class="col-md-6" >
            <div class="row justify-content-md-center" >

                <div class="col-md-10" id="blogtab" style="  box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22); height:auto !important">
                    <br>
                    <center>
                        <form action="#t">
                            <button href="a" id="writeblog" style="height:40px;width:100%;letter-spacing: 5">
                                &nbsp;	Write a New Blog !
                            </button>
                        </form>
                        <br>


  <?php $rcsqls3= "SELECT * FROM blogs where authorid like $aid ";
                                                $rcresultss3 = $conn->query($rcsqls3);
                                                if ($rcresultss3->num_rows > 0) {
                                             
                                                while($row = $rcresultss3->fetch_assoc()) { ?>

                                    <div id="writeblog" style="background: #0A62A3;height:50px;padding:10px 10px;width:100%;font-size: 12px">
									<?php echo $row['title'] ?>

                                        <div style="float:right"> 
                                            <form method="post" action="">

                                                <input type="hidden" name="id"  value="<?php echo $row['id'] ?>">
                                                &nbsp;	
												<button   onclick="return confirm('Delete This Blog?');" style="color: white;background:none;border:none;" name="delete">
                                                    Delete
                                                    </button>
                                            </form>
                                        </div>  
										<?php if($row['publish']=='1'){ ?>
										
										<div style="float:right"> 
                                            <form method="post" action="blog7.php">

                                                <input type="hidden" name="blogId" value="<?php echo $row['id'] ?>">
												<input type="hidden" name="view" value="<?php echo $row['view'] ?>">
                                                &nbsp;	
												<button   onclick="return confirm('Delete This Blog?');" style="color: white;background:none;border:none;">
                                                    View
                                                    </button>
                                            </form>
                                        </div>
										<?php } else {  ?>	
											<div style="float:right"> 
                                           
												<button   disabled style="color: white;background:none;border:none;">
                                                    Not Published
                                                    </button>
                                            
                                        </div>
										
										<?php }   ?>
                                    </div><br>
<?php  }} ?> 
                                    <br>



                        <br>

                    </center>



                </div>
            </div>
        </div>

    </div>

    <!--blog topPanel end-->

    <br>

    <section id="t">
        <!--blog Detail Panel Begin-->

        <div class="row justify-content-md-center" >
            <div class="col-md-1"  ></div>
            <div class="col-md-4"  >
                <button id="newblog" style="height:40px;font-size:17px">
                    New Blog


                </button>
                <br><br><br>
                <form  method="post" enctype="multipart/form-data" id="f1" action="create_blog.php">
                    <font style="color: #707070;font-size: 15px;font-family:Segoe UI semibold;letter-spacing: 1.8">
                        Add Title</font>

                    <br><br>
                    <input type="text" id="input1" name="title" style="background:#fafafa;	box-shadow: 0 14px 18px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);border-radius:15px;"  required onChange="titles()" placeholder="Enter Title Here.." maxlength="40">

                    <br><br>
                    <font style="color: #707070;font-size: 15px;font-family:Segoe UI semibold;letter-spacing: 1.8">
                        Add Images </font><br><br>
                    <div class="col-sm-4 col-md-6">
                        <div class="custom-file" style="z-index:0">
                            <input type="file"   class="custom-file-input" name="coverImage" required id="coverImage" accept="image/*"  onchange="return fileValidation1()"  >
                            <label class="custom-file-label" for="customFile">Cover Image</label>
                        </div>
                    </div>
                    <br>

                    <div class="col-sm-4 col-md-6">
                        <div class="custom-file" style="z-index:0">
                            <input type="file"    class="custom-file-input"  name="Image1" required id="Image1" accept="image/*"  onchange="return fileValidation2()"  >
                            <label class="custom-file-label" for="customFile">Image 1</label>
                        </div>
                    </div>


                    <br>

                    <div class="col-sm-4 col-md-6" style="z-index:0">
                        <div class="custom-file">
                            <input type="file"   class="custom-file-input" name="Image2" required id="Image2" accept="image/*"  onchange="return fileValidation3()" >
                            <label class="custom-file-label" for="customFile">Image 2</label>
                        </div>
                    </div>







                    <br><br>
                    <font style="color: #707070;font-size: 15px;font-family:Segoe UI semibold;letter-spacing: 1.8">
                        Add Text</font>
                    <br><br>
                    <textarea id="input2" style="	box-shadow: 0 14px 18px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);resize: none;padding: 20px 20px" required onChange="about()" maxlength="3000" placeholder="Enter Text Here.." name="about"></textarea>
                    <br>
                    <br><br>

                    <div style="width: 90%;float:left;">
                        <font style="color: #707070;font-size: 15px;font-family:Segoe UI semibold;letter-spacing: 1.8">
                            Blogger Image</font>
                        <br>
                        <br>
                        <div class="col-sm-4 col-md-6">
                            <div class="custom-file"  style="z-index:0">
                                <input type="file"    class="custom-file-input" name="authorImage" required id="authorImage" accept="image/*"  onchange="return fileValidation4()" >
                                <label class="custom-file-label" for="customFile">Image 2</label>
                            </div>
                        </div>


                        <input type="hidden" name="des1" id="d1">
                        <input type="hidden" name="des2" id="d2">
						
						
						
						
                    </div><br><br>
                    <div style="width: 90%;float:left;"><br><br>
                        <font style="color: #707070;font-size: 15px;font-family:Segoe UI semibold;letter-spacing: 1.8">
                            Blogger Name & Desciption
                        </font>
                        <br>
                        <br>
                        <input type="hidden" value="<?php echo $aid ?>" name="aid">
                        <input type="text" style="	box-shadow: 0 14px 18px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22); width: 100%;border-radius:15px;" maxlength="40"   name="author" required id="authors" onchange="a1()" placeholder="Enter Your Name" ><br><br>
                        <textarea placeholder="Enter About You" style="	box-shadow: 0 14px 18px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);width:100%;height:100px;resize: none;border-radius: 15px;padding:20px 20px  " maxlength="100" name="authordesc" required id="authors1" onchange="a2()" ></textarea>
		
                        <br>
                        <br>
                        <div style="width: 30%;float:left;">

                            <button id="uploadbut" style="height:40px"  >
                                Save
                            </button>

                        </div>
                        <div style="width: 60%;float:right;">
                            <center>
                                <button id="uploadbut" type="reset" style="height:40px" >
                                	Clear all
                                </button>
                            </center>
                </form>
            </div>
            <br>	<br>
        </div>

</div>
<div class="col-md-1"  ></div>
<div class="col-md-6"  >
    <div class="row justify-content-md-center" >

        <table style="width:90%; height:850px;  background-image: linear-gradient(#62C6EB, #7BF94E);">
            <tr>
                <td>
                    <div class="row justify-content-md-center" >
                        <table style="width:85%; height:750px;  background-image: linear-gradient(#3A5968, #65A8E3);" align="center">
                            <tr>
                                <td>


                                    <div class="row justify-content-md-center" >
                                        <table style="width:85%; height:180px;  background:#fff;border-radius: 10px;" align="center" id="cover">
                                            <tr>
                                                <td>

                                                </td>
                                            </tr></table></div>
                                    <div class="row justify-content-md-center" >
                                        <center>
                                            <p style="color:white; text-align:justify;font-size:25px" id="topics">

                                                Topic
                                            </p> </center>
                                    </div>

                                    <BR>
                                    <div class="row justify-content-md-center" >
                                        <center>
                                            <p style="color:white; text-align:center;font-size:11px;width: 90%;" id="about1">
                                                nrelated to the problem, the normal practice is by the way to start attribute	nrelated to the problem, the normal practice is by the way to start attribute name with a lowercase, like you do with normal variable names.
                                            </p> </center>
                                    </div>
                                    <br>



                                    <div class="row justify-content-md-center" >
                                        <table style="width:45%; height:150px; border-radius: 10px;" align="center">
                                            <tr>
                                                <td>
                                                    <table style="width:85%; height:150px;  background:#fff;border-radius: 10px;" id="img1" align="center">
                                                        <tr>
                                                            <td>


                                                            </td>
                                                        </tr></table>

                                                </td>
                                            </tr></table>
                                        <table style="width:45%; height:150px; border-radius: 10px;" align="center">
                                            <tr>
                                                <td>

                                                    <table style="width:85%; height:150px;  background:#fff;border-radius: 10px;" id="img2" align="center">
                                                        <tr>
                                                            <td>


                                                            </td>
                                                        </tr></table>
                                                </td>
                                            </tr></table>

                                    </div>
                                    <BR>
                                    <div class="row justify-content-md-center" >
                                        <center>
                                            <p style="color:white; text-align:center;font-size:11px;width: 90%;" id="about2">
                                                nrelated to the problem, the normal practice is by the way to start attribute	nrelated to the problem, the normal practice is by the way to start attribute name with a lowercase, like you do with normal variable names.
                                            </p> </center>
                                    </div>
                                    <br>



                                    <div class="row justify-content-md-center" >
                                        <table style="width:45%; height:150px; border-radius: 10px;" align="center">
                                            <tr>
                                                <td>


                                                </td>
                                            </tr></table>
                                        <table style="width:55%; height:150px; border-radius: 10px;" align="center">
                                            <tr>
                                                <td>
                                                    <table style="width:35%; height:150px;  border-radius: 10px;" align="left">
                                                        <tr>
                                                            <td>
                                                                <p style="color:white" id="ath1">
                                                                    <big> <b>author </b>  </big>
                                                                </p>
                                                                <br>
                                                                <p style="color:white;text-align: justify;font-size:12px;width:100px;" id="ath2">
                                                                    <small>	<small>

                                                                            Description  About the Author
                                                                        </small></small>
                                                                </p>

                                                            </td>
                                                        </tr></table>
                                                    <table style="width:150px; height:150px;  background:#fff;border-radius: 10px;border-radius: 60%;" align="left" id="aut">
                                                        <tr>
                                                            <td>


                                                            </td>
                                                        </tr></table>
                                                </td>
                                            </tr></table>

                                    </div>
                                </td>
                            </tr></table>

                    </div>
                </td>
            </tr></table>


    </div>	</div>
</div>

<!--blog Detail Panel End-->
</div>






</div>
	  <script src="admin/assets/admin/js/page/light-gallery.js"></script>
	  <link rel="stylesheet" href="admin/assets/admin/bundles/summernote/summernote-bs4.css">
<?php
include("footer.php");


?>