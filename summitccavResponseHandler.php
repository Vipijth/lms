<?php include('Crypto.php')?>
<?php include('connection.php')?>
<?php

	error_reporting(0);
	
	$workingKey='74AC69C954B44B83FB0D6003EDA02044';	
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

	if($order_status="Success")
	{
 
        $sql ="update summitusers set status='1' , type='paid' where orderid like '$order_id'";
    
        if($conn->query($sql)==true){
     
            header('Location:summitsuc.php');
        }
        else{    echo $order_id;
            echo "Error: " . $sql . "<br>" . $conn->error; 
            header('Location:summitfail.php'); 
        }

       
	}
	else if($order_status="Aborted")
	{
        header('Location:summitfail.php');
	}
	else if($order_status="Failure")
	{
        header('Location:summitfail.php');
	}
	else
	{
        header('Location:summitfail.php');
	
	}

	echo "<br><br>";

	echo "<table cellspacing=4 cellpadding=4>";
	for($i = 0; $i < 1; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
	    	echo '<tr><td>'.$information[0].'</td><td>'.urldecode($information[1]).'</td></tr>';
	}

	echo "</table><br>";
	echo "</center>";
?>
