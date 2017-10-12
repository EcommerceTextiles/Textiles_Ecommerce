
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
				<li><a href="monthly_profit.php">Monthly Sells Report</a></li>
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
     <form name="frmdropdown" method="post" action="monthly_profit.php" style="style.css">
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
	<option value="10" name="10">october-NOVEMBER</option>
	<option value="11">NOVEMBER-DECEMBER</option>
	<option value="12">DECEMBER-JANUARY</option>

	</select>
	<input type="submit" name="find" value="find"/> 
    <br><br>
  
	<table border :1px solid class="table" >
	<thead class="thead_inverse"><tr align="center">
    <th><b>Product Name</b></th>     <th><b>Category Name</b></th>       <th><b>Subcategory Name<b></th> <th><b>Quantity</b></th>    <th><b>Total</b></th> <th><b>Profit</b></th>
	</tr> </thead>
	<tbody>


 <?php
  if($_SERVER['REQUEST_METHOD'] == "POST")
  {	$s=0;
			$tax=10/100;
         $des=$_POST["empName"]; 
         if($des=="")  // if ALL is selected in Dropdown box
         { 
             $res=mysqli_query($con,"Select * from order_details");
         }
         else
         { 	$res=mysqli_query($con,"SELECT p.product_name,mc.category_name,cg.subcat_name,sell_price,cost_price,sum(c.quantity),sum(total_price) 
FROM cart_backup c,product p,main_category mc,category cg
where c.product_id=p.product_id and c.category_id=mc.category_id and c.subcategory_id=cg.subcategory_id and month(shipped_date)='".$des."'
group by c.subcategory_id");
             //$res=mysqli_query($connection,"Select p.product_id,product_name,category_name,subcat_name,sell_price,cost_price,sum(c.quantity),sum(c.total_price) from product p,main_category mc,category cg ,cart_backup c where c.product_id=cg.product_id and c.product_id=mc.product_id and c.category_id=mc.category_id and c.subcategory_id=cg.subcategory_id and month(c.shipped_date)='".$des."' group by c.subcategory_id");
         
		 }
  
         if($res=="FALSE")
			echo "fails";
         while($r=mysqli_fetch_row($res))
         {
                 echo "<tr>";
                 echo "<td align='center'>$r[0]</td>";
                 echo "<td width='200'>$r[1]</td>";
				 echo "<td width='200'>$r[2]</td>";
                 echo "<td alig='center' width='40'> $r[5]</td>";
                 echo "<td align='center' width='200'>$r[6]</td>";
				 $s=( (($r[3])*$r[5])-(($r[4]+$tax)*$r[5]));
				 echo "<td align='center' width='200'>$s</td>";
                 echo "</tr>";
				 $s=$s+$r[4];
                 
           
				
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