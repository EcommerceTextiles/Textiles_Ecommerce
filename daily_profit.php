
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
     <form name="frmdropdown" method="post" action="daily_profit.php" style="style.css">
     <center>
            <h2 align="center">Daily Report of sells</h2>
	
    <br><br>
  
	<table border :1px solid class="table" >
	<thead class="thead_inverse"><tr align="center">
     <th><b>Product Name</b></th>     <th><b>Category Name</b>   <th><b>Subcategory Name</b></th>    <th><b>Quantity</b></th>    <th><b>Total</b></th> <th><b>Profit</b></th>
	</tr> </thead>
	<tbody>


 <?php
  //if($_SERVER['REQUEST_METHOD'] == "POST")
  //{	$s=0;
         
          		$d1="select day(now())";
				$n1=mysqli_query($con,$d1);
				$r1=mysqli_fetch_row($n1);
             $res=mysqli_query($con,"Select product_name,category_name,subcat_name,sum(c.quantity),sum(c.total_price),sell_price,cost_price from product p,main_category mc,category cg,cart_backup c,order_details o where c.subcategory_id=cg.subcategory_id and c.product_id=cg.product_id and c.category_id=cg.category_id and o.cart_id=c.cart_id and c.product_id=p.product_id and c.category_id=mc.category_id and  day(shipped_date)='".$r1[0]."' group by c.subcategory_id");
             /*$res=mysqli_query($connection,"Select sum(c.quantiy) from product p,main_category mc,category cg,cart c,order_details o  
			 where c.subcategory_id=cg.subcategory_id and c.product_id=cg.product_id and c.category_id=cg.category_id and o.cart_id=c.cart_id and c.product_id=p.product_id and c.category_id=mc.category_id and  day(shipped_date)='".$r1[0]."' 
			 group by c.subcategory_id");
			*/
         while($r=mysqli_fetch_object($res))
         {		//echo $r[0];
                 echo "<tr>";
                 echo "<td align='center'>$r->product_id</td>";
                 echo "<td width='200'>$r->product_name</td>";
				 echo "<td width='200'>$r->subcat_name</td>";
                 /*echo "<td alig='center' width='40'> $r[3]</td>";
                 echo "<td align='center' width='200'>$r[4]</td>";				 
				 $s=( ($r[5]*$r[3])-($r[6]*$r[3]));
				 echo "<td align='center' width='200'>$s</td>";
                 echo "</tr>";
				 $s=$s+$r[4];*/
                 
           
				
        }
    //}
	
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