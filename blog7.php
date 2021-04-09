<?php
include("header.php");
include ("connection.php");
$bzid = $_POST['blogId'];
$bview = $_POST['view'];
$cview=$bview+1;
$sql = "UPDATE blogs SET view='$cview' WHERE id='$bzid'";

if ($conn->query($sql) === TRUE) {

} else {
    echo "Error updating record: " . $conn->error;
}
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
    <style>

html *{
    color:white !important;
}

    </style>
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
                        <div class="col-md-3 col-lg-3 ">
                            <form action="blog7.php" method="post">
                                <button class="but1"  style="overflow: hidden;color:#0A62A3  !important">
                                    <input type="hidden" value="<?php echo $bid ;?>" name="blogId">
                                    <input type="hidden" value="<?php echo $row['view'] ;?>" name="view">
                                    <?php echo $btitle ; ?>
                                </button>
                            </form>
                        </div>

                    <?php } }?>

            </div>

        </div>

    </div>


    <br>



    <br>

    <?php
    $blogsqlcc= "SELECT * FROM blogs where id ='$bzid'";
    $blogresultcc = $conn->query($blogsqlcc);
    if ($blogresultcc->num_rows > 0) {

        while($row = $blogresultcc->fetch_assoc()) {
            $ctitle=$row['title'];
            $cabout=$row['about1'];
            $cabout2=$row['about2'];
            $ccover=$row['cover'];

            $cid=$row['id'];
            $cview=$row['view'];
            ?>
            <div class="row justify-content-md-center" >

                <div class="col-lg-8 col-md-8 " style="height: auto" >
                    <div class="row justify-content-md-center " style=" padding:40px;background: linear-gradient(180deg, #3A5968 0%,#65A8E3 100%);margin:10px;height:auto;">

                        <div class="col-md-10" style="border-radius: 10px;height:330px">
                            <div class="col" id="ribbon" style="width:60px">
                                <img src="assets/user/images/eye.png" style="width:50%;height: 50%;position: absolute;top:6px;left:2px;" >
                                <p style="position: absolute;right:11%;font-size: 10px;top:27%">
                                    <?php echo $cview ?>
                                </p>
                            </div>
                            <img src="admin/uploads/Blogs/<?php echo $ctitle; ?>/images/<?php echo $ccover; ?> " style="width:102%;height:100%;border-radius: 10px;">

                        </div>

                        <div class="col-md-12" style="padding:20px;height:auto;font-family:Segoe UI regular;font-size:22px;color:white !important;text-align:justify">
                            <center>
                             <big>  <?php echo $ctitle ?> </big>
                                <br style="line-height: .8">
                                <br></center>
                                <small>  <small>
                           
                                   <?php echo $cabout ?> 
                                    </small></small>

                        </div>
                        <br>
                        <div class="col-md-8 col-lg-5" style="border-radius: 10px;height:280px;margin:10px">
                            <img src="admin/uploads/Blogs/<?php echo $ctitle; ?>/images/<?php echo $row['image1']; ?> " style="width:102%;height:100%;border-radius: 10px;">


                        </div>

                        <div class="col-md-8 col-lg-5" style="border-radius: 10px;height:280px;margin:10px">
                            <img src="admin/uploads/Blogs/<?php echo $ctitle; ?>/images/<?php echo $row['image2']; ?> " style="width:102%;height:100%;border-radius: 10px;">


                        </div>

                        <div class="col-md-12" style="text-align:justify;padding:20px;height:auto;font-family:Segoe UI regular;font-size:22px;color:white !important" >

                            
                            <small>   <small>
                             
                                    <?php echo $cabout2 ?>
                                </small></small>

                        </div>
                        <div class="row flex-row-reverse " style="width:100%">  


       <div class="col-md-6 col-lg-3 " style="text-align:left;height:180px;padding:20px 20px;font-family:Segoe UI semibold;font-size:18px;color:white;">
          

                            <img src="admin/uploads/Blogs/<?php echo $ctitle; ?>/images/<?php echo $row['authorimage'];; ?> " style="bottom:20%;width:150px;height:150px;border-radius: 50%;position: absolute;right:10px">

                        </div>
                        <div class="col-md-6  " style="text-align:right;height:auto;padding:0px 20px;font-family:Segoe UI semibold;font-size:16px;color:white;">
                             
                              
                                <?php echo $row['author'] ?>
                                     <br>

                                <small>
                                    <?php echo $row['authordetails'] ?>
                                </small> 
<br>

                        </div><div class="col-md-3" "><br></div>
                 
                        </div>
                    </div>

                    <br>

                </div>


                <div class="col-md-3 col-lg-2 "  id="seltop" style="margin:10px;height:320px;border-radius: 20px">
<div style="text-align:right;padding:10px;color:white;font-family:segoe ui semibold;font-size:22px;height:150px;width:100%;border-right:5px solid #3E6BFF;position: absolute;right: 0px">
<?php echo $ctitle ?>
</div>
                </div>

            </div>


        <?php } }?>
</div>





<?php
include ("footer.php");
?>