<?php
require 'connection.php';
$id_1=$_GET['id'];
$res=mysqli_query($con,"delete from cart where category_id='$id_1'");
if($res)
{
	echo ("success");
	header("location:index2.php");
}
?>
