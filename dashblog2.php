<?php
@ob_start();
session_start();
include("header.php");
include ("connection.php");
$aid=$_SESSION['userid'];
echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
echo $aid.'ssssssssssss';
?>