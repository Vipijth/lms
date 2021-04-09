<?php

	include ("connection.php");
	include ("header.php");
if (isset($_POST['submit'])) {

    $title = $_POST['title'];
    $category = $_POST['category'];
    $az= $_POST['az'];
    $hc= $_POST['hc'];
    $coupon= $_POST['coupon'];

    if($hc!='home1' && $hc!='home1'){
        $az='image';

    }
    if($category!='home' ){
        $az='image';
        $hc=$category;
    }

    $sqlc = "DELETE FROM slider WHERE category='$hc'";

    if ($conn->query($sqlc) === TRUE) {

    } else {
        echo "Error deleting record: " . $conn->error;
    }



    $rand=rand(10000,90000);
    $target_dir = "uploads/slider/".$rand;
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imagename=$rand.basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (!file_exists('uploads/slider')) {
        mkdir('uploads/slider', 0777, true);
    }

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }


    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";

    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

            $sql = 'INSERT INTO slider (slider,category, type, coupen,title ) VALUES 
   ("'.$imagename.'","'.$hc.'","'.$az.'","'.$coupon.'","'.$title.'")';

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Successfully Added');

                           </script>";

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


}
?>
    <script>

        function pay(){

            if( document.getElementById("category").value=="home"){
                document.getElementById("homec").style.display="flex";
                document.getElementById("b1").style.display="none";
                document.getElementById("b2").style.display="flex";

            }
            else{
                document.getElementById("homec").style.display="none";
                document.getElementById("b1").style.display="flex";
                document.getElementById("b2").style.display="none";
                document.getElementById("hc").value="";
                document.getElementById("customFile").value="";
            }


        }




        function fileValidation() {

            var fileInput =
                document.getElementById('customFile');

            var filePath = fileInput.value;

            // Allowing file type

            if(document.getElementById("category").value=="home" && document.getElementById("hc").value=="home1"  ){
                var allowedExtensions =
                    /(\.jpg|\.jpeg|\.png|\.gif|\.avi|\.mp4|\.mpeg|\.mov|\.flv|\.wmv|\.gif)$/i;
            }
            else{
                var allowedExtensions =
                    /(\.jpg|\.jpeg|\.png)$/i;

            }
            if (!allowedExtensions.exec(filePath)) {
                alert('Invalid file type');
                fileInput.value = '';
                return false;
            }

            document.getElementById('l1').innerHTML=fileInput.value;
            var ex=filePath.split('.').pop();
            if(ex=="jpg" || ex =="png"){
                document.getElementById('az').value="image";
            }

            if(ex=="mp4" || ex =="avi" || ex =="flv" || ex =="mpeg"){
                document.getElementById('az').value="video";
            }
        }

    </script>

			<!-- Main Content -->
            <div class="main-content">
               <section class="section">
				   <div class="section-body">
                     <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Slider</h4>
                              </div>
                              <div class="card-body">
								  <div class="bootstrap snippet">
                      			  <section id="portfolio" class="gray-bg padding-top-bottom">
									  <div class="categories">
										  <ul>
											<li class="active">
											  <a href="#" data-filter="*">All Categories</a>
											</li>
											<li>
											  <a href="#" data-filter=".home1,.home2,.home3,.home4,.home5">Home</a>
											</li>
											<li>
											  <a href="#" data-filter=".resources">Resources</a>
											</li>
											<li>
											  <a href="#" data-filter=".courses">Courses</a>
											</li>
											<li>
											  <a href="#" data-filter=".summit">Summit</a>
											</li>
											<li>
											  <a href="#" data-filter=".blogs">Blog</a>
											</li>
											<li>
											  <a href="#" data-filter=".faculty">Faculty</a>
											</li>  
										 </ul>
									 </div>
									<div class="projects-container scrollimation in">
									  <div class="row">

									  <?php
									  $sql = "SELECT * FROM slider";
									  $result = $conn->query($sql);
									  if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) {
									  ?>
										<article class="col-md-4 col-sm-6 portfolio-item <?php echo $row['category'] ?>">
										  <div class="portfolio-thumb in">

											<a href="#" class="main-link">
                                                <?php if($row['type']=='image' ){?>
                                                    <img class="img-responsive img-center" src="uploads/slider/<?php echo $row['slider'] ?>" alt="" style="height:220px">
                                                <?php } ?>
                                                <?php if($row['type']=='video' ){?>
                                                    <video autoplay muted loop   style="width:100%;">
                                                        <source src="uploads/slider/<?php echo $row['slider'] ; ?>" type="video/mp4">
                                                    </video>
                                                <?php } ?>

											  <span class="project-title"><?php echo $row['category'] ?></span>
											  <span class="overlay-mask"></span>
											</a>
											<a class="enlarge cboxElement" href="#" title="Bills Project">
												<i class="fa fa-expand fa-fw"></i>
											</a>
										
										  </div>
										</article>
										<?php }} ?>
								
									  </div>
									</div>
								  </section>
								</div>
                              </div>
                           </div>
                        </div>
                     </div>
					 <div class="row">
                        <div class="col-12">
                           <div class="card">
                              <div class="card-header">
                                 <h4>Upload</h4>
                              </div>	 <form  method="post"  enctype="multipart/form-data">
                              <div class="card-body">
                                 <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                    <div class="col-sm-12 col-md-7">
                                       <input type="text" name="title"  class="form-control">
                                    </div>
                                 </div>

                                 <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                    <div class="col-sm-12 col-md-7">
                                       <select class="form-control selectric" id="category" name="category" required onchange="pay()" >

                                          <option value="home">Home</option>
                                          <option value="resources">Resources</option>
										  <option value="courses">Courses</option>
                                          <option value="summit">Summit</option>
										  <option value="blogs">Blogs</option>
                                          <option value="faculty">Faculty</option>
                                       </select>
                                    </div>
                                 </div>
<input type="hidden" id="az" name="az">

                                  <div class="form-group row mb-4" required id="homec">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Slider</label>
                                        <div class="col-sm-12 col-md-7">
                                           <select class="form-control selectric" name="hc" id="hc">

                                              <option value="home1">slider1</option>
                                              <option value="home2">slider2</option>
    										  <option value="home3">slider3</option>
                                              <option value="home4">slider4</option>
    										  <option value="home5">slider5</option>

                                           </select>
                                        </div>
                                     </div>

								 <div class="form-group row mb-4">
									 <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add</label>
									 <div class="col-sm-12 col-md-7">
										 <div class="custom-file">
											<input type="file" name="image" required  onchange="return fileValidation()" class="custom-file-input" id="customFile">
											<label class="custom-file-label form-control" for="customFile" id="l1">Choose file</label>
										 </div>
									 </div>
								 </div>

								 <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Coupon</label>
                                    <div class="col-sm-12 col-md-7">
                                       <input type="text" name="coupon" value=" "  class="form-control">
                                    </div>
                                 </div>
                               
                                 <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                    
                                       <button class="btn btn-primary" name="submit" formaction="" id="b2">ADD</button>
                                    </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
            </div>

<?php
	include ("footer_1.php");
?>