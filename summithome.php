<?php
include ("header.php");
include ("connection.php");

$userid=$_SESSION['userid'];


$rcsql= "SELECT * FROM summitusers where userid='$userid'";
$rcresult = $conn->query($rcsql);
if ($rcresult->num_rows > 0) {
    header('Location:summit.php');

}

$amount='';
$sqlu = "SELECT * FROM summit_info ";
$resultu = $conn->query($sqlu);
if ($resultu->num_rows > 0) {
           while($row = $resultu->fetch_assoc()) {
$amount=$row['amount'];
           }}

if(isset($_POST['paid'] )){
    $userid=$_SESSION['userid'];
    $useremail=$_SESSION['useremail'];
    $username=$_SESSION['username'];
    $dates=date('d/m/Y');
    $type='free';
    $status='0';
    $order='summitorder'.uniqid().$userid;
    $_SESSION['summitamount']=$amount;
    $_SESSION['summitorder']=$order;
$sqls ='insert into summitusers(username,useremail,userid,date,type,amount,status,orderid) values ("'.$username.'","'.$useremail.'","'.$userid.'","'.$dates.'","'.$type .'","'.$amount .'","'.$status .'","'.$order .'")';
    
if($conn->query($sqls)==true){

    header('Location:summitpay.php');
}
else{
    echo "Error: " . $sqls . "<br>" . $conn->error; 
}

}


if(isset($_POST['free'] )){
    $userid=$_SESSION['userid'];
    $useremail=$_SESSION['useremail'];
    $username=$_SESSION['username'];
    $dates=date('d/m/Y');
    $type='free';
$sql ='insert into summitusers(username,useremail,userid,date,type) values ("'.$username.'","'.$useremail.'","'.$userid.'","'.$dates.'","'.$type .'")';
    
if($conn->query($sql)==true){


$notification="Chrysaellect MEET Summit Free Plan Enrolled Successfully";
$ntype="summit";

    $sqln='insert into user_notification (userid,type,notification,dates)values  ("'.$userid.'","'.$ntype.'","'.$notification.'","'.$dates.'")';
    if($conn->query($sqln)==true){

    }else{
        echo "Error: " . $sqln . "<br>" . $conn->error; 
    }


   header('Location:summit.php');
}
else{
    echo "Error: " . $sql . "<br>" . $conn->error; 
}

}



?>


<div class="container-fluid" style="padding-top:120px">

    <div class="row justify-content-center" >



    <!--<div class="col-lg-10" style="font-family:segoe ui semibold; font-size:18px;color:#707070;text-align:justify">
  

    <big>About Crysaellect MEET Summit</big>
    <br>  <hr/>
    Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have
     scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book.
    

     <br>  <br>
    </div>-->
    
            <div class="col-lg-3 col-md-4" style=" color:white;font-family:segoe ui semibold;  background-image: radial-gradient(#33AFFF, #0C5267 );margin:13px;height:400px;box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
">

<div style="height:50px;font-size:20px;padding:10px;width:100%;position:absolute;left:0;right:0;top:0;border-bottom:2px solid white">
<center>
Free Plan
</center>
</div>

<div style="padding:10px 10px;width:100%;position:absolute;left:0;right:0;top:70px;">  


<i class="fa fa-hand-point-right"></i> Free Access .</li>  <br>  <br> 

<i class="fa fa-hand-point-right"></i> Access Only 7 Days Videos .</li>  <br> <br> 

</div>

<form action="" method="post"> 
<button name="free" style="width:100%;border:none;font-family:segoe ui semibold; font-size:20px; position:absolute; left:0;right:0; bottom:0; height:50px;padding:10px 10px; background:white">
 Free Plan
</button>
</form>


             </div>



             <div class="col-lg-3 col-md-4" style="  color:white;font-family:segoe ui semibold;   background-image: radial-gradient(#555FFF, #0C5267 );margin:13px;height:400px;box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
">
<div style="height:50px;font-size:20px;padding:10px;width:100%;position:absolute;left:0;right:0;top:0;border-bottom:2px solid white">
<center>


Paid Plan  <li class="fa fa-star"></li>
</center>
</div>

<div style="padding:10px 10px;width:100%;position:absolute;left:0;right:0;top:70px;">  
<i class="fa fa-hand-point-right"></i> Paid Plan .</li>  <br>  <br> 
<i class="fa fa-hand-point-right"></i> Access All Videos .</li>  <br>  <br> 


</div>
<form action="" method="post"> 
<button name="paid" style="width:100%;border:none;font-family:segoe ui semibold; font-size:20px; position:absolute; left:0;right:0; bottom:0; height:50px;padding:10px 10px; background:white">
 Paid Plan
</button>

</form>
             </div>


             
    </div>


</div>




<?php include('footer.php'); ?>