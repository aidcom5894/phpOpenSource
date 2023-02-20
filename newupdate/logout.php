<?php 

session_start();
unset($_SESSION['username']);
session_destroy();
echo "<script>alert('You have been logged out')</script>";
header("location:login.php");

?>