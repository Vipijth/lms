<?php
include("header.php");
include ("connection.php");
$orderid=$_SESSION['orderid'];

$cartid = $_SESSION['cartid'];
$am = $_SESSION['am'];

$userid = $_SESSION['userid'];
$useremail = $_SESSION['useremail'];
$cat = $_SESSION['cat'];
$stat = '0';
$d = date("d/m/Y");
$sub = $_SESSION['sub'];
$last_id='';
$sql = 'INSERT INTO pc (prodid) VALUES 
        ("' . $orderid . '")';

if ($conn->query($sql) === TRUE) {

    // $_SESSION['pay'] = '';
    $last_id = $conn->insert_id;

    //
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$orderid='order'.$orderid.$last_id;
$_SESSION['orderid']=$orderid;
foreach ($cartid as $x => $val) {
    if ($val != null) {
        $sql = 'INSERT INTO oc (courseid,useremail,amount,orderid,tansdate,status,userid,sub,category) VALUES 
        ("' . $val . '","' . $useremail . '","' . $am . '","' . $orderid . '","' . $d . '","' . $stat . '","' . $userid . '","' . $sub[$x] . '","' . $cat[$x] . '")';

        if ($conn->query($sql) === TRUE) {

            // $_SESSION['pay'] = '';


            //
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    // }
}
?>


<div class="row " style="height:100px;">

</div>
<div class="row justify-content-md-center ">

    <div class="col-md-7" style="background:#eee;height:auto"  >

        <font style="color:#0A62A3; font-size:45px; font-family:Segoe UI semibold">
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
  <div class="col-md-9" style="height:auto;background:white;border-radius:20px;padding-right:16px;  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);"  >
      <form method="POST" name="customerData" action="ccavRequestHandler.php">

		<font style="color:#000; font-size:25px;font-family:Segoe UI semibold">
			<br style="line-height:.8">

				Product Order ID
					<center>
						<hr/ style="  border-top: 1px solid #afafaf;width:92%">
					</center>
						<small><small>

                                <?php echo $orderid ?>
						</small></small>

					<br style="line-height:.3">

							Total Amount

								<center>
										<hr/ style="  border-top: 1px solid #afafaf;width:92%">
								</center>

							<small><small>

								&#8377; <?php echo $am ?>
						</small></small>
							<br style="line-height:.7">
						<!--Apply Coupon

								<center>
									<hr/ style="  border-top: 1px solid #afafaf;width:92%">
								</center>
								<input type="text" style="height:30px;box-shadow:2px 2px 2px 2px #afafaf;text-align:center; width:40%;font-size:12px; border-radius:20px;color:#afafaf" placeholder="Add Coupon Code">
									&nbsp;&nbsp;
										<button style="height:30px;text-align:center; width:30%; font-size:18px;border-radius:20px;color:#fff; background:orange;border:none">

												APPLY
											</button>
											<br style="line-height:.2">-->

												Grand Total

													<center>
																<hr/ style=" border-top: 1px solid #afafaf;width:92%">
														</center>
																<small><small>

                                                                        &#8377; <?php echo $am ?>
																	</small></small>
            <br><br>
            <input type="hidden" name="tid" id="tid"  />

            <input type="hidden" name="merchant_id" value="285977"/>

            <input type="hidden" name="order_id" value="<?php echo $orderid ?>"/>

            <input type="hidden" name="amount" value="<?php echo $am ?>"/>

            <input type="hidden" name="currency" value="INR" />
            <input type="hidden" name="redirect_url" value="https://meet.chrysaellect.com/ccavResponseHandler.php"/>

            <input type="hidden" name="cancel_url" value="https://meet.chrysaellect.com/ccavResponseHandler.php"/>

            <input type="hidden" name="language" value="EN"/>




<center>
            <button style="border:none;height:50px; width:80%; font-size:24px;color:#fff; background:#0A62A3" onclick="return confirm('Do you want to purchase?');" >
Pay Now
</button>
</center>
        </form>
<br>
</div>





</div>

        </div>
        <br><br>
    </div>
</div></div>









<?php
include ("footer.php");

?>

