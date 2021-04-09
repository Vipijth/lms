<?php
include ("header.php");
include ("connection.php");

$userid=$_SESSION['userid'];
$orderid=$_SESSION['summitorder'];
$amount=$_SESSION['summitamount'];

$sql="delete from summitusers where orderid = '$orderid'";
if($conn->query($sql)==true){


}

else{
    echo "Error: " . $sqls . "<br>" . $conn->error; 

}


$rcsql= "SELECT * FROM summitusers where userid='$userid'";
$rcresult = $conn->query($rcsql);
if ($rcresult->num_rows <1) {
    //header('Location:summithome.php');

}

?>


<style>
input{display:none}
</style>

<div class="container-fluid" style="padding-top:120px">

    <div class="row justify-content-center" >



    <!--<div class="col-lg-10" style="font-family:segoe ui semibold; font-size:18px;color:#707070;text-align:justify">
  

    <big>About Crysaellect MEET Summit</big>
    <br>  <hr/>
    Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have
     scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.
    

     <br>  <br>
    </div>-->
    
        

<center>
<br>  <br>
<big><big><big>
 Payement Failed .  <li class="fa fa-check"></li> </big> <br> <br> <A href="summithome.php">
 
 
 Click Here To Go Back</a>

</big></big>
</center>


             
    </div>


</div>




<?php include('footer.php'); ?>