<?php
session_start();
ob_start();
include('connection.php');
    $uname = $_GET['id'];
    
 
$sql = "delete from user_token where username = '$uname'";

if ($conn->query($sql) === TRUE) {

    unset($_COOKIE['useremail']); 
    setcookie('useremail', null, -1, '/'); 


    // Destroy session
    session_destroy();
unset($_SESSION['useremail']);
unset($_SESSION['userid']);
header("Location: index.php");
} 
    
?>
