<?php
include("connection.php");
include 'include/newhead.php';
$id=$_GET['id'];
echo $id;
$query="select * from category where subcategory_id='$id'";
$sql=mysqli_query($con,$query);
$row=mysqli_fetch_array($sql);
  $imgname=$row['image'];
  $subcat=$row['subcat_name'];
  $prices=$row['sell_price'];
  $catdesc=$row['category_desc'];
    $qty=$row['quantity'];
$query1=" select category_name from category, main_category where main_category.category_id=category.category_id and subcategory_id='$id';";
$sql1=mysqli_query($con,$query1);
$row=mysqli_fetch_array($sql1);
  $catname=$row['category_name'];

























 ?>
