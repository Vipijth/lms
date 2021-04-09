<?php
include ("header.php");
include ("connection.php");

$userid=$_SESSION['userid'];
$orderid=$_SESSION['summitorder'];
$amount=$_SESSION['summitamount'];

$rcsql= "SELECT * FROM summitusers where userid='$userid'";
$rcresult = $conn->query($rcsql);
if ($rcresult->num_rows <1) {
    header('Location:summithome.php');

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
    
        


             <div class="col-lg-4 col-md-4" style="  color:white;font-family:segoe ui semibold;   background-image: radial-gradient(#555FFF, #0C5267 );margin:13px;height:400px;box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
">
<div style="height:50px;font-size:20px;padding:10px;width:100%;position:absolute;left:0;right:0;top:0;border-bottom:2px solid white">
<center>


Paid Plan  <li class="fa fa-star"></li>
</center>
</div>

<div style="padding:10px 10px;width:100%;position:absolute;left:0;right:0;top:70px;">  
<i class="fa fa-hand-point-right"></i> Order ID : <?php echo $orderid ;?>  <br>  <br> 

<i class="fa fa-hand-point-right"></i> Total Amount : &#8377; <?php echo $amount ;?>  <br> <br> 


</div>
<form method="POST" name="customerData" action="summitccavRequestHandler.php">
<input type="text" name="tid" id="tid"  /></td>
    <input type="hidden" name="merchant_id" value="285977"/>
<input type="text" name="order_id" value="<?php echo $orderid ?>"/>
<input type="text" name="amount" value="<?php echo $amount ?>"/>
<input type="text" name="currency" value="INR" />
     <input type="hidden" name="redirect_url" value="https://meet.chrysaellect.com/summitccavResponseHandler.php"/>

            <input type="hidden" name="cancel_url" value="https://meet.chrysaellect.com/summitccavResponseHandler.php"/>
<input type="text" name="language" value="EN"/>
<input type="text" name="ids" value="1">
<button  style="width:100%;border:none;font-family:segoe ui semibold; font-size:20px; position:absolute; left:0;right:0; bottom:0; height:50px;padding:10px 10px; background:white">
Pay Now
</button>

</form>
             </div>


             
    </div>


</div>




<?php include('footer.php'); ?>