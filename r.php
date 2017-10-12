
<?php
      include "connection.php";  // including configuration file
?>
 
<html>
<head>

 <style>
 .tabel thead th{
	 backgorund-color:black;
 }
	 </style>
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
     <form name="frmdropdown" method="post" action="r.php" style="style.css">
     <center>
            <h2 align="center">Monthly Report of sells</h2>
         
            <strong> Select month : </strong> 
            <select name="empName"> 
               <option value=""> -----------ALL----------- </option> 

	
	
	<option value="1">JAN-FEB</option>
	<option value="2">FEB-MARCH</option>
	<option value="3">MARCH-APRIL</option>
	<option value="4">APRIL-MAY</option>
	<option value="5">MAY-JUNE</option>
	<option value="6">JUNE-JULY</option>
	<option value="7">JULY-AUGUST</option>
	<option value="8">AUGUST-SEPTEMBER</option>
	<option value="9">SEPTEMBER-OCTOBER</option>
	<option value="10">october-NOVEMBER</option>
	<option value="11">NOVEMBER-DECEMBER</option>
	<option value="12">DECEMBER-JANUARY</option>

	</select>
	<input type="submit" name="find" value="find"/> 
    <br><br>
  
	<table border :1px solid class="table" >
	<thead class="thead_inverse"><tr align="center">
     <th><b>p_id</b></th>    <th><b>p_name</b></th>     <th><b>category_name</b>       <th><b>Quantity</b></th>    <th><b>Total</b></th> <th><b>Profit</b></th>
	</tr> </thead>
	<tbody>


 <?php
  if($_SERVER['REQUEST_METHOD'] == "POST")
  {	$s=0;
         $des=$_POST["empName"]; 
         if($des=="")  // if ALL is selected in Dropdown box
         { 
             $res=mysqli_query($con,"Select * from order_details");
         }
         else
         { 
             $res=mysqli_query($con,"Select p.product_id,o.category_id,c.quantity, from product p,cart_backup c,order_details o,category cg  where cg.product_id=c.product_id and p.product_id=c.product_id and c.customer_id=o.customer_id and  month(shipped_date)='".$des."'");
         }
  
         
         while($r=mysqli_fetch_object($res))
         {
			 
                
                 
           
				
        }
		
    }
	
?>
</tbody>
  </table>
 </center>
</form>
</div>
 </div>
  </div>
</body>
</html>