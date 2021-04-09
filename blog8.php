<?php
include("header.php");
include ("connection.php");
$bbid = $_POST['bid'];
?>

    <div class="container-fluid">
        <div class="row">

            <?php
            $slidersql= "SELECT * FROM slider";
            $sliderresult = $conn->query($slidersql);
            if ($sliderresult->num_rows > 0) {

                while($row = $sliderresult->fetch_assoc()) {
                    $image=$row['slider'];
                    $title=$row['coupen'];
                    $cat=$row['category'];
                    if($cat=='blogs' ){
                        ?>
                        <div class="col-md-12"  id="coursebg" style="background-image:url('admin/uploads/slider/<?php echo $image; ?>' )">



                        </div>
                    <?php }} } ?>
        </div>

        <br>

        <div class="row justify-content-md-center">
            <br>
            <div class="col-md-10" style="background:#fff;"  >

                <div class="row ">

                    <div class="col-md-3 col-lg-2 ">
                        <button class="but"  readonly>
                            Top Topics</button>
                    </div>
                    <?php
                    $blogsqlc= "SELECT * FROM blogs where publish='1' order by view desc limit 3";
                    $blogresultc = $conn->query($blogsqlc);
                    if ($blogresultc->num_rows > 0) {

                        while($row = $blogresultc->fetch_assoc()) {
                            $btitle=$row['title'];
                            $bid=$row['id'];?>
                            <div class="col-md-3 col-lg-3 " >
                                <form action="blog8.php" method="post">
                                    <button class="but1"  style="overflow: hidden">
                                        <input type="hidden" value="<?php echo $bid ;?>" name="bid">
                                        <?php echo $btitle ; ?>
                                    </button>
                                </form>
                            </div>

                        <?php } }?>

                </div>

            </div>

        </div>


        <br>

        <?php
        $blogsqlcc= "SELECT * FROM blogs where id ='$bbid'";
        $blogresultcc = $conn->query($blogsqlcc);
        if ($blogresultcc->num_rows > 0) {

            while($row = $blogresultcc->fetch_assoc()) {
                $ctitle=$row['title'];
                $cabout=$row['about1'];
                $ccover=$row['cover'];
                $cid=$row['id'];
                $cview=$row['view'];
                ?>
                <div class="row justify-content-md-center">

                    <div class="col-lg-8 col-md-8 " style="height: auto" >
                        <div class="row " style="background: #455A64;margin:10px;height:auto;padding-bottom: 15px;padding-left: 15px;padding-top: 15px;padding-right: 0px">
                            <div class="col-lg-4 col-md-4"  style="height:280px;margin: 10px">
                                <img src="admin/uploads/Blogs/<?php echo $ctitle; ?>/images/<?php echo $ccover; ?> " style="width:100%;height:95%">
                            </div>

                            <div class="col-lg-7 col-md-6 "style="padding:10px 30px;height:auto;background: #0A62A3;margin: 10px;font-family: Segoe UI semibold;font-size:18px;color:white">
                            <br>
                                <?php echo $ctitle ; ?>
                                <br>
                                <small>    <small>       <?php
                                   $abc=strip_tags($cabout);

                                   echo substr("$abc",0,210).'...'    ?>...</small></small>
                                <form action="blog7.php" method="post">
                                    <input type="hidden" value="<?php echo $cid ?>" name="blogId">
                                    <input type="hidden" value="<?php echo $cview ?>" name="view">

                                    <button style="border:none;padding:6px 15px;color:#455A64;background:#fff;bottom:5%;right:2%;position:absolute" > <small>Read More</small> </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2 " style="margin:10px;height:320px;border-radius: 20px" id="seltop">
                        <div style="text-align:right;padding:10px;color:white;font-family:segoe ui semibold;font-size:26px;height:150px;width:100%;border-right:5px solid #3E6BFF;position: absolute;right: 0px">
                            TOP
                            <br>
                            <big> PICKS </big>
                        </div>
                    </div>
                </div>

                </div>


            <?php } }?>

        <div class="row justify-content-md-center" style="background:#fff">
            <div class="col-md-12">
                <br>	 <br>
                <div class="row justify-content-md-start" style="background:#fff">
                    <?php
                    $blogsql= "SELECT * FROM blogs where publish='1' order by id desc";
                    $blogresult = $conn->query($blogsql);
                    if ($blogresult->num_rows > 0) {

                        while($row = $blogresult->fetch_assoc()) {
                            $image=$row['image1'];
                            $title=$row['title'];
                            $id=$row['id'];
                            $view=$row['view'];
                            $about=$row['about1'];
                            $view=$row['view'];


                            ?>

                     
                            <div class="col-md-4 col-sm-3 col-lg-3" id="group" style="margin: 5px">
                                <div class="col-md-12"  id="group1">
                                    <img src="admin/uploads/Blogs/<?php echo $title; ?>/images/<?php echo $image?>" style="width:100%;position:absolute;left:-2px;height:220px;">
                                    <div class="col" id="ribbon" style="width:60px">
                                        <img src="assets/user/images/eye.png" style="width:50%;height: 50%;position: absolute;top:6px;left:2px" >
                                        <p style="position: absolute;right:10%;font-size: 10px;top:27%">
                                            <?php echo $view ?>
                                        </p>
                                        
                                    </div>
                                </div>
                                <div class="col-md-10" id="group2" style="padding-top: 10px">
                                    <center>
                                       <font color="white" style="font-size: 18px; font-family: segoe ui semibold"><?php echo $title ?></font><br style="line-height:.6">
                                 <p color="white" style="line-height:1.2;font-family: segoe ui regular;font-size: 13px;color:white"> 
                                 
                                 
                                 
                          <?php
                                   $ab=strip_tags($about);

                                   echo substr("$ab",0,100).'...'    ?>
                                 
                                 
                                 </p> <br><br>
                                        <br style="line-height:1">    <br style="line-height:1">
                                        <form action="blog7.php" method="post">
                                            <input type="hidden" value="<?php echo $id ?>" name="blogId">
                                            <input type="hidden" value="<?php echo $view ?>" name="view">
                                            <button style="border:none;color:#85E961;background:none;bottom:10%;left:38%;position:absolute" > <small>Read More</small> </button>

                                        </form>


                                    </center>
                                    <br>
                                </div>
                            </div>

                        <?php }}?>

                </div>
            </div>
        </div>
        </section>
    </div>

    </div>





<?php
include ("footer.php");
?>