<?php
include("connection.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
  <style>
		a{

   position:fixed;
   right:10px;
   top:5px;
}
  </style>
</head>
<body>
<form action="third.php" method="get">
<br><br>
<center>	<h1>	Shipping Status	</h1>	</center>
<a href="delivery_boy_login.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>
<div class="container">
<form action="third.php" method="get">
  <table class="table">
    <thead>
      <tr>
        
		<th>	Order ID		</th>
		<th>	Address			</th>
		<th>	Status		</th>
      </tr>
    </thead>
    <tbody>
      <?php
try
{
	$uname=$_POST["username"];
	$sql1="select delivery_boy_id,s2.order_id,address from shipper s1,shipping s2,order_details o1 where s1.shipper_id=s2.shipper_id and o1.order_id=s2.order_id and delivery_boy_id='$uname' ";
	$query1=mysqli_query($con,$sql1);
	if($query1==false)
		echo "select not worked.";
	while($ftch=mysqli_fetch_array($query1))
	{
	?>
	<tr>
		
		<td> <?php echo $ftch[1] ?> </td>
		<td> <?php echo $ftch[2] ?> </td>
    
    <td> <input type="radio" name="color" id="color" value="<?php echo $ftch[1] ?>"> </td>
	<tr>
<?php } 
}
catch(Exception $e)
{
	echo $e->getMessage();
}	

	?>

    </tbody>
  </table>
  <br><br>
    <center><input class="btn btn-success" type="submit"  name="done" value="DONE">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<button class="btn btn-primary"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
	
	</center>
	</form>
	
</div>
</body>
</html>
