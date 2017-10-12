<?php 
session_start();
unset($_SESSION['success']);  
session_destroy();  
header('location: index1.php');
?>
