<?php
require "connection.php";
//to get the ordered record
$re=mysqli_query($con,"SELECT * FROM order_details order  BY order_id DESC LIMIT 1");
$res=mysqli_fetch_array($re);	 
?>

<html>
<head>
     <title>confirmation</title>
     <link href="order_style.css" rel="stylesheet" type="text/css">   
	 <link rel="stylesheet" href="css/bootstrap.min.css"/>
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
</head>
<body> 
     <div id="main">
        <div id="main2">
	    <h2 align="center">Order Confirmation</h2>
  
  <br />
  <h3> <b>Thank you for shopping with with us.You ordered is placed successfull!!</b></h3>
  <br />
  <!--<h5 align="right"><b>Total before Tax:</b></h5><br>-->
  <h4 align="left" ><b>Delivery date :<?php echo $res['shipped_date'];?></b></h4>
  <!--<h5 align="right"><b>Estimated Tax:<b></h5>-->
  <br />
  <b><h3 align="right"><b>Total Cost:<?php echo $res['total'];?></b></h3></b>
  <button style="margin-left:250px" class="btn btn-class"><a href="index2.php">Continue Shopping</a></button>
   </div> 
</div>   
</body>
</html> 