<?php
include ('header.php');
// Store a string into the variable which
// need to be Encrypted
$simple_string = "Welcome to GeeksforGeeks\n";

// Display the original string
echo "Original String: " . $simple_string;

// Store the cipher method
$ciphering = "AES-128-CTR";

// Use OpenSSl Encryption method
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;

// Non-NULL Initialization Vector for encryption
$encryption_iv = '1234567891011121';

// Store the encryption key
$encryption_key = "GeeksforGeeks";

// Use openssl_encrypt() function to encrypt the data
$encryption = openssl_encrypt($simple_string, $ciphering,
    $encryption_key, $options, $encryption_iv);

// Display the encrypted string
echo "Encrypted String: " . $encryption . "\n";

// Non-NULL Initialization Vector for decryption
$decryption_iv = '1234567891011121';

// Store the decryption key
$decryption_key = "GeeksforGeeks";

// Use openssl_decrypt() function to decrypt the data
$decryption=openssl_decrypt ($encryption, $ciphering,
    $decryption_key, $options, $decryption_iv);

// Display the decrypted string
echo "Decrypted String: <br><br><br><br><br><br><br><br><br><br><br><br><br>" . $decryption;


$cartid=$_SESSION['cartid'];
$am=$_SESSION['am'];
$orderid=$_SESSION['orderid'];
$userid=$_SESSION['userid'];
$useremail=$_SESSION['useremail'];
$cat=$_SESSION['cat'];
$stat='1';
$d=date("Y/m/d");
$sub=$_SESSION['sub'];

foreach($cartid as $x => $val) {
    if($val!=null){
        $sql = 'INSERT INTO oc (courseid,useremail,amount,orderid,tansdate,status,category,userid,sub) VALUES 
        ("'.$val.'","'.$useremail.'","'.$am.'","'.$orderid.'","'.$d.'","'.$stat.'","'.$cat[$x].'","'.$userid.'","'.$sub[$x].'")';

        if ($conn->query($sql) === TRUE) {
            echo 'sss'.$cat[$x];
            //
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>
