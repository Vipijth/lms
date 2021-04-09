
<?php
include("header.php");
include ("connection.php");
$orderid=$_SESSION['orderid'];

    $cartid = $_SESSION['cartid'];
    $am = $_SESSION['am'];

    $userid = $_SESSION['userid'];

    $useremail = $_SESSION['useremail'];
    $cat = $_SESSION['cat'];
$caid = $_SESSION['carid'];
    $stat = '1';
    $d = date("d/m/Y");
    $sub = $_SESSION['sub'];
//if( $_SESSION['pay']=='1') {
    foreach ($cartid as $x => $val) {
        if ($val != null) {


               // $_SESSION['pay'] = '';

                $sqls = "UPDATE cart SET cartstatus='0' WHERE id='$caid[$x]'";
                $conn->query($sqls);
                //
            }
        }
   // }

?>


<div class="row " style="height:100px;">

</div>
<div class="row justify-content-md-center ">

    <div class="col-md-7" style="background:#eee;height:auto"  >

        <font style="color:red; font-size:45px; font-family:Segoe UI semibold">
            &nbsp;&nbsp;Shopping Cart

        </font>
        <br><br style="line-height:.8">

        <hr/ style="  border-top: 1px solid #afafaf;">
        <div class="row justify-content-md-center ">
            <table style="height:auto; width:100% ;">
                <tr  style="border-bottom:2px solid #afafaf">
                    <td style="width:10%;height:40px;">

                    </td>

                    <td style="width:25%;height:40px;">
                        <font style="color:green; font-size:20px; font-family:Segoe UI semibold">
                            &nbsp;&nbsp;Course/ Module
                    </td>

                    <td style="width:35%;height:40px;">
                        <font style="color:green; font-size:20px; font-family:Segoe UI semibold">
                            &nbsp;&nbsp;Product Name
                        </font>
                    </td>

                    <td style="width:20%;height:40px;">
                        <font style="color:green; font-size:20px; font-family:Segoe UI semibold">
                          Order Id
                        </font>
                    </td>

                    <td style="width:10%;height:40px;">

                    </td>

                </tr>
                <?php foreach($cartid as $x => $val) {
                    if($val!=null){ ?>
                <tr>


                    <td style="width:10%;height:40px;">


                    </td>
                    <td style="width:25%;height:40px;">
                        <font style="color:#707070; font-size:18px;font-family:Segoe UI semibold">
<?php echo $cat[$x]?>
                        </font>


                    </td>
                    <td style="width:35%;height:40px;">
                        <font style="color:#707070; font-size:18px;font-family:Segoe UI semibold; text-transform:capitalize">
                            <?php echo $sub[$x]?>
                        </font>
                    </td>
                    <td style="width:20%;height:40px;">
                        <font style="color:#707070; font-size:18px;font-family:Segoe UI semibold; text-transform:capitalize">
                            <?php echo $orderid?>
                        </font>
                    </td>
                    <td style="width:10%;height:40px;">
                        <center>


                        </center>
                    </td>

                </tr>
                <?php }} ?>

            </table>


        </div>
    </div>



    <div class="col-md-4" style="background:#eee;height:auto"  >

        <br><br> <br><br>
        <div class="row justify-content-md-center ">
            <div class="col-md-9" style="height:auto;background:white;border-radius:20px;box-shadow:2px 2px 2px 3px #afafaf;padding-right:16px"  >

                <font style="color:#707070; font-size:25px;font-family:Segoe UI semibold">

                    <br style="line-height:.8">
                    <span style="color:green;font-size: 22px">

                    <i class="fa fa-check-circle"></i>
                    PAYMENT SUCCESS FULL

                    </span>
                    <br style="line-height:.8">
                <!--  <span style="color:red;font-size: 22px">

                    <i class="fa fa-times-circle"></i>
                   PAYMENT FAILED

                    </span>-->
                    <br style="line-height:.8">
                    Product Order ID
                    <center>
                        <hr/ style="  border-top: 1px solid #afafaf;width:92%">
                    </center>
                    <small><small>

                            <?php echo $orderid?>
                        </small></small>

                    <br style="line-height:.3">

                    Total Amount

                    <center>
                        <hr/ style="  border-top: 1px solid #afafaf;width:92%">
                    </center>

                    <small><small>

                            &#8377;      <?php echo $am?>
                        </small></small>
                    <br style="line-height:.7">

                    <br style="line-height:.2">

<a href="dashboard.php">
    Go to Dashboard </a>

            </div></div>
        <br><br>
        </div>
    </div></div>









<?php
include ("footer.php");

?>

