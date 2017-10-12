<?php
$con=mysqli_connect('localhost','root','','final_ecommerce');
if(mysqli_connect_errno()){
  echo 'Database connection failed due to following errors:'.mysqli_connect_error();
  die();
}?>
