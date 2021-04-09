<?php
session_start();
ob_start();
unset($_SESSION['adminemail']); 
header("Location: index.php");
?>
