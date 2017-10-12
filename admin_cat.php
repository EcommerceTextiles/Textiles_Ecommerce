<?php
include_once("connection.php");
try
{	
	
	if(isset($_POST['save']))
	{
		$prod=$_POST['product'];
		$category=$_POST['category'];
		$cat_desc=$_POST['cat_desc'];
		$sell_p=$_POST['sell_price'];
		$cost_p=$_POST['cost_price'];
		$quantity=$_POST['qty'];
		$select_option=$_POST['product'];
		$que=mysqli_query($con,"select * from product where product_name='$select_option' ");

		$ftch=mysqli_fetch_array($que);
		$pid=$ftch[0];
		$cid=$_POST['category'];
		// call procedure to increment category id	
		$sql1='call inc_cat_id(@cid)';
		$stmt1=mysqli_query($connection,$sql1);
		$sql2='select @cid as cat_id';
		$stmt2=mysqli_query($connection,$sql2);
		$row=mysqli_fetch_array($stmt2);
		if($row)
		{	$row=$row['cat_id'];		}

		if(getimagesize($_FILES['img_file']['tmp_name'])==FALSE)
		{
			echo "Please select image.";
		}
		else
		{
			$img_file=addslashes($_FILES['img_file']['tmp_name']);
			$name=addslashes($_FILES['img_file']['name']);
			$img_file=file_get_contents($img_file);
			$img_file=base64_encode($img_file);	
		}
		$query="insert into category(subcategory_id,product_id,category_id,subcat_name,category_desc,sell_price,cost_price,quantity,image) values('$row','$pid','$cid','$category','$cat_desc','$sell_p','$cost_p','$quantity','$name')";
		$result=mysqli_query($con,$query);
	}
}
catch(Exception $e)
{
	echo $e->getMessage();
    echo 'Sorry, could not upload file';
}

?>


<html>
<head>
 
 <link rel="stylesheet" href="css/bootstrap.min.css"/>
 <script src="js/jquery.js"></script>
 <script src="js/bootstrap.min.js"></script>

</head>

<body>

<nav class="navbar navbar-default navbar-static-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				Textile
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">			
			
			<ul class="nav navbar-nav navbar-right">
				<li><a href="admin_login.php" target="_blank">Admin Login</a></li>
				<li><a href="index1.php" target="_blank">Log Out</a></li>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<div class="container-fluid main-container">
		<div class="col-md-2 sidebar">
			<ul class="nav nav-pills nav-stacked">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="admin_cat.php">Add Category</a></li>
				<li><a href="admin_product.php">Add Product</a></li>
				<li><a href="r.php">Monthly Sells Report</a></li>
				<li><a href="year_profit.php">Annual Report of sells</a></li>
				<li><a href="daily_profit.php">Daily Report of sells</a></li>
			</ul>
			<ul class="nav nav-pills nav-stacked">
			    <li class="active"><a href="#">Products</a></li>
				<li><a href="admin_show_1.php">Towel</a></li>
				<li><a href="admin_show_2.php">Bedsheets</a></li>
				<li><a href="admin_show_3.php">Blankets</a></li>
				<li><a href="admin_show_4.php">Carpet</a></li>
			</ul>
		</div>
	<div class="col-md-10 content">
            <div class="panel panel-default">

                	<div id="form1" style="margin-left:60px;margin-top:30px;">
<form method="post"  name="f" enctype="multipart/form-data" >
Product : 
<select id="combo1" visibility="hidden" name="product" >
	<option value="towels" id="1">Towel</option>
	<option value="bedsheets" id="2">Bedsheet</option>
	<option value="blankets" id="3">Blanket</option>
	<option value="carpets" id=""4">Carpets</option>
</select><br><br>
Category : 
<?php
			$get1=mysqli_query($con,"SELECT * FROM main_category");
$option = '';
 while($row = mysqli_fetch_assoc($get1))
{
  $option .= '<option value = "'.$row['category_id'].'" name="'.$row['category_id'].'">'.$row['category_name'].'</option>';
}
?>
<select name="category"">
<?php echo $option; ?>
</select>
	<br><br>	
Category name : <input type="text" id="category_name" name="category"><br><br>

Category Description : <input type="text" name="cat_desc" id="category_desc"><br><br>

Sell Price : <input type="text" name="sell_price" id="sell_price"><br><br>

Cost Price : <input tyep="text" name="cost_price" id="cost_price"><br><br>

Quantity : <input type="text" name="qty" id="qty"><br><br>

<input type="file" name="img_file" id="img_file" />
<br><br><br><br>

<input class="btn btn-primary" type="submit"  value="Save" name="save" >
</form>
</div>
</div>
</div>
	<footer class="pull-left footer">
		<p class="col-md-12">
				<hr class="divider">
	Copyright &COPY; 2015 <a href="http://www.Textiles.com">Textiles</a>
			</p>
	</footer>
	</div>


</body>
<html>