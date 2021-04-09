<?php
include('Crypto.php');
include('connection.php');

?>

<?php

error_reporting(0);

$workingKey='A76F1720C22115A78DAD5C7F1BA4E898';		//Working Key should be provided here.
$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
$order_status="";
$decryptValues=explode('&', $rcvdString);
$dataSize=sizeof($decryptValues);
echo "<center>";

for($i = 0; $i < $dataSize; $i++)
{
    $information=explode('=',$decryptValues[$i]);
    if($i==0)	$order_id=$information[1];
    if($i==3)	$order_status=$information[1];
}

if($order_status==="Success")
{

    $sql = "UPDATE oc SET status='1' where orderid='$order_id'";

    if ($conn->query($sql) === TRUE) {
        header('Location:cartsuc2.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }



}
else if($order_status==="Aborted")
{
    echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
    header('Location:carterror2.php');
}
else if($order_status==="Failure")
{
    header('Location:carterror2.php');	echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
}
else
{
    header('Location:carterror2.php');	echo "<br>Security Error. Illegal access detected";

}

echo "<br><br>";

echo "<table cellspacing=4 cellpadding=4>";
for($i = 0; $i < $dataSize; $i++)
{
    $information=explode('=',$decryptValues[$i]);
    echo '<tr><td>'.$information[0].'</td><td>'.urldecode($information[1]).'</td></tr>';
}

echo "</table><br>";
echo "</center>";
?>
