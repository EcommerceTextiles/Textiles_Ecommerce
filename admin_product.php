<?php

include("connection.php");
try
{	
	if(isset($_POST['add']))
	{
		$main_prod=$_POST['p'];
		$query="insert into product(product_name) values('$main_prod')";
		$result=mysqli_query($con,$query);
		if($result)
		{
			echo "data stored.";
		}
		else
		{
			echo "data not stored.";
		}
		
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
				<li><a href="admin_login.php" target="_blank">Log Out</a></li>
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
				
			</ul>
		</div>
	<div class="col-md-10 content">
            <div class="panel panel-default">


<div id="form2" style="margin-left:60px;margin-top:30px;">
	<form method="post">
	Enter Product Name : <input type="text" name="p" id="p" width=50px><br>
	<br>
	<left><input class="btn btn-primary" type="submit"  value="Add" name="add" ></left>
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