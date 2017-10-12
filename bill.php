<?php
include("connection.php");
$id_c=$_GET['id'];
$total='';
//to fetch the customer details
$res=mysqli_query($con,"select * from customer where email='$id_c'");
$r=mysqli_fetch_object($res);
//to fetch the cart details
$result=mysqli_query($con,"select * from cart where customer_id='$r->customer_id'");
while($result1 = mysqli_fetch_object($result))
{	
	$analy="call ins_analysis('$result1->category_id','$result1->subcategory_id')";
	$st=mysqli_query($con,$analy);
	$total+=$result1->total_price;
}
if(isset($_POST['submit']))
{
	if(!isset($error_message))
	{		
		if(empty($_POST['email']))
			$error_message="number required";
		if(!preg_match("/^[0-9]{10}$/",$_POST['number']))
			$error_message = "Invalid number";
	}
	if(empty($_POST['address']))
		$error_message="Address Required";
	
		if(empty($_POST['city']))
				$error_message="city and state required";

	if(!isset($error_message)) {
		$email=$_POST["email"];
		$address=$_POST['address'];
		echo $address;
		$city_state=$_POST['city'];
		//get the current date
		 $order_date= date("Y/m/d");
    //echo $order_date->format('Y-m-d');
		
		// start procedure to get the shipped_date
		$sql1='call get_ship_date(@ship)';
		$stmt1=mysqli_query($con,$sql1);
		$sql2='select @ship as ship_d';
		$stmt2=mysqli_query($con,$sql2);
		$row=mysqli_fetch_array($stmt2);
		//end procedure to get the shipped_date
		
		if($row)
			$row=$row['ship_d'];
		//insert the record in tabel order_details
	
		$result=mysqli_query($con,"insert into order_details(customer_id,address,city_state,order_date,shipped_date,total) values('$r->customer_id','$address','$city_state','$order_date','$row','$total')");
		$cust=sprintf($r->customer_id);
		echo $cust;
		$cat="call backup_cart('$cust')";
		$st=mysqli_query($con,$cat);
		$analy="call ins_analysis('$result->category_id','$result->subcategory_id')";
		$st=mysqli_query($con,$analy);
		header("location:order_place.php");


$to=$r->email;
$subject = "Confirmation of order";
$message = "Your order is placed successfully...!" ;
$headers="From:dbmstextiles@gmail.com  ";
if(mail($to,$subject,$message,$headers))
{
	// echo "successfully send mail" ;

}
else
{
	echo " email not sent" ;
}
	
}
		
		
	
}
	
	
	




?>
<html>
<head>
  <title>Bill</title>
  
  <style>
  
  .demoInputBox {
	padding: 10px 40px;
	border: #a9a9a9 1px solid;
	border-radius: 4px;
	margin-left: 200px;
	height:40px;
	width:300px;
	font-size:15pt;
	
	}


button {
    background-color: #8585AD;
    color: black;
    padding: 14px 20px;
    margin-left: 10px 0;
    border: none;
    cursor: pointer;
    width-left: 20%;
	width:20%;
	float:center;
	
}
a:link, a:visited {
    background-color: #8585AD;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
}


a:hover, a:active {
    background-color: #8585AD;
}

.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

.label_box
{
	width=20%
	font-size:30pt;
	font-family:raleway
	
}


<!--/* Add padding to container elements */-->
.container {
    padding: 16px;
}

<!-- Clear floats */--->
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

<!-- Change styles for cancel button and signup button on extra small screens */-->
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
        width: 100%;
    }
}
.billingform
  {
	  align:center;
  }
</style>

 
  
 
</head>

<body>

		
		
	
  <p><br /></p>
  <p><br /></p>
  <p><br /></p>
  
  
  <div class="container" align="center">
	
    		<form action="" method="post"  align="center"   accept-charset="utf-8" style="border:1px solid #ccc">
    			
				<div class="form-group">
    					
						<label class="label_box"><b>Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b></label>
    				
						<input name="name" type="text" value="<?php echo $r->c_name;?>" class="demoInputBox"><br><br>
    							
						<label class="label_box"><b>Mobile No&nbsp&nbsp&nbsp&nbsp&nbsp</b>
						</label>
						<input name="number" type="number" value="<?php echo $r->number;?>" class="demoInputBox"><br><br>
    				
						<label class="label_box"><b>Billing E-Mail</b></label>
    					<input name="email" type="text" value="<?php echo $r->email;?>" class="demoInputBox"><br><br>
    					<label class="label_box"><b>Street Address</b></label>
    				
						<input name="address"  type="text" value="" class="demoInputBox"><br><br>
    				
    					<label class="label_box"><b>CityCode&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b></label>
						<select class="demoInputBox" name="city">
						
						<option>Mumbai-Maharashtra</option> 
						<option>Chennai-Tamil Nadu</option>
						<option>Delhi</option>
						<option>Kolkatta west-Bengal</option>
                        <option>Pune-Maharashtra</option>
                        <option>Hyderaba-Andhra Pradesh</option>
						<option>Panaji-Goa</option>
						<option>Ahmedabad-Gujarat</option>
						<option>Surat-Gujarat</option>
						<option>Bengaluru/Bangalore</option>
						<option>Aurangabad-Maharashtra</option>
						<option>Kolhapur-Maharashtra</option>
						<option>Nasik-Maharashtra</option>
						<option>Solapur-Maharashtra</option>
						<option>Chennai-karnatak</option>
						<option>Other</option>
						</select><br><br>
    			
					</div>
     
	             	<label class="label_box" style="font-size:40pt"><b>Final total&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b></label>
    		    	<!--<input name="bill" type="number" value="<?php echo $total;?>" class="demoInputBox"><br><br>		-->
					<label class="label_box" style="font-size:40pt"><b><?php echo $total;?></b></label>
					<div class="clearfix">
    				<button type="submit" class="submit" name="submit"  style="margin-left:250px" align="center"><b>Confirm Order</b></a></button>
					
					</div>
					</form>
			
</div>
  
</body>
</html>