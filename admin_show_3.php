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


<div id="form2" style="margin-left:60px;margin-top:30px;">
	<form method="post">
	
	<left><input class="btn btn-primary" type="submit"  value="Show Blankets" name="show" ></left>
	<table border :1px solid class="table" >
	<thead class="thead_inverse"><tr align="center">
	<th><b>Category ID</b></th><th><b>Category Name</b></th><th><b>Category Description</b></th><th><b>Sell price</b></th><th><b>Cost price</b></th><th><b>Quantity</b></th><th><b>EDIT</b></th>;
	</tr> </thead>
	<tbody>
	
	

<?php 
	require "connection.php";


	if(isset($_POST['show']))
	{
	$query = 
	$result = mysqli_query($con,"select subcategory_id ,subcat_name,category_desc,sell_price,cost_price,quantity from category where product_id=3 ");
while($product = mysqli_fetch_object($result)){?>
<tr>
	<td> <?php echo $product->subcategory_id; ?></td>
	<td> <?php echo $product->subcat_name; ?></td>
	<td> <?php echo $product->category_desc;?></td>
	<td> <?php echo $product->sell_price; ?></td>
	<td> <?php echo $product->cost_price; ?></td>
	<td> <?php echo $product->quantity; ?></td>
	<td><a href="show.php?id=<?php echo $product->subcategory_id;?>">Edit</a></td>
</tr>
	<?php }  }?>	
	</tbody>
  </table>
 </center>
</form>
</div>
 </div>
  </div>
</body>
</html>