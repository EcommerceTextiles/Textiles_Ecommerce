<?php
session_start();
	include("connection.php");
if(!empty($_POST["success"])) 
{
	echo $_POST['cat_name'];
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) 
	{
		if(empty($_POST[$key]))
		{
		$error_message = "All Fields are required";
		echo $error_message;
		}
	}
	if(!preg_match("/^[0-9]{0-3}$/",$_POST['quantity']))
		$error_message="quantity should to numeric";
	
	if(!preg_match("/^[0-9]{0-3}$/",$_POST['price']))
		$error_message="price should to numeric";
	if(!preg_match("/^[A-Z]{a-z}$/",$_POST['price']))
		$error_message="numeric values not allowed";
	else
	{
		//echo $_POST['cat_name'];
		echo $_POST['quantity'];
		echo $_POST['price'];
	}
		
	
}
$id=$_GET['id'];
$query="select * from category where subcategory_id='$id'";
$sql=mysqli_query($con,$query);
$row=mysqli_fetch_array($sql);
  $imgname=$row['image'];
  $subcat=$row['subcat_name'];
  $prices=$row['sell_price'];
  $catdesc=$row['category_desc'];
    $qty=$row['quantity'];
	
		
 ?>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
 <script src="js/jquery.js"></script>
 <script src="js/bootstrap.min.js"></script>
</head>
<body>
<center>
  <div class="container-fluid">
    <div class="col-md-2"> </div>
 <form method="post" action="">
   <br>
    <br>
    <br>
  <table style="width:90%" align="right">
    <tr>
      
    </tr>
    <tr>
      <th rowspan="9"><div><img id="logo" src="<?=$imgname ?>" height="170" width="170" alt=""></img></div></th>
      <th colspan="2"></th>
      <td></td>
    <tr>
      <td><h4>category name</h4>
      <input id="name" name="cat_name" placeholder="username" type="text" value="<?php echo $subcat; ?>"></td>
    </tr>
    <tr>
      <td><hr></td>
    </tr>
    <tr>
      <td><h4>Price</h4>
	  <input id="name" name="price" placeholder="username" type="text" value="<?php echo $prices; ?>"></td>
	  
    </tr>
    <tr>
      <td><h4>Quantity<h4><input id="name" name="quantity" placeholder="username" type="text" value="<?php echo $qty; ?>"></td>
    </tr>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td><hr></td>
    </tr>
    <tr>
    <td>
		
      <center><input type="submit" class="btn btn-primary" name="success" value="Edit" class="btnRegister"><center></td>
    </tr>
    <tr>
      <td></td>
    </tr>
  </table>
</form>
<div class="col-md-2"><br></div>
</div>
</center>
<?php
		if(isset($_POST['success']))
		{
				$subcat1=$_POST['cat_name'];
				$price1=$_POST['price'];
				$qty1=$_POST['quantity'];
				$qry1="update category set subcat_name='$subcat1' where subcategory_id='$id'";
				$sql=mysqli_query($con,$qry1);
				$qry2="update category set sell_price='$price1' where subcategory_id='$id'";
				$sql=mysqli_query($con,$qry2);
				$qry3="update category set quantity='$qty1' where subcategory_id='$id'";
				$sql=mysqli_query($con,$qry3);
				header("location:admin_boot1.php");
		}
		?>
		
<footer class="text-center" id="footer">| <a href="#">Contact us</a> | <a href="#">Address</a> | &copy; Copyright 2017-2019 Textiles |</footer>

</body>
</html>
